
package Convert::ASN1;

# $Id: //depot/asn/lib/Convert/ASN1.pm#10 $

use 5.004;
use strict;
use vars qw($VERSION @ISA @EXPORT_OK %EXPORT_TAGS @opParts @opName $AUTOLOAD);
use Exporter;

BEGIN {
  @ISA = qw(Exporter);
  $VERSION = '0.07';

  %EXPORT_TAGS = (
    io    => [qw(asn_recv asn_send asn_read asn_write asn_get asn_ready)],

    debug => [qw(asn_dump asn_hexdump)],

    const => [qw(ASN_BOOLEAN     ASN_INTEGER      ASN_BIT_STR      ASN_OCTET_STR
		 ASN_NULL        ASN_OBJECT_ID    ASN_REAL         ASN_ENUMERATED
		 ASN_SEQUENCE    ASN_SET          ASN_PRINT_STR    ASN_IA5_STR
		 ASN_UTC_TIME    ASN_GENERAL_TIME
		 ASN_UNIVERSAL   ASN_APPLICATION  ASN_CONTEXT      ASN_PRIVATE
		 ASN_PRIMITIVE   ASN_CONSTRUCTOR  ASN_LONG_LEN     ASN_EXTENSION_ID ASN_BIT)],

    tag   => [qw(asn_tag asn_decode_tag asn_encode_tag asn_decode_length asn_encode_length)]
  );

  @EXPORT_OK = map { @$_ } values %EXPORT_TAGS;
  $EXPORT_TAGS{all} = \@EXPORT_OK;

  @opParts = qw(
    cTAG cTYPE cVAR cLOOP cOPT cCHILD
  );

  @opName = qw(
    opUNKNOWN opBOOLEAN opINTEGER opBITSTR opSTRING opNULL opOBJID opREAL
    opSEQUENCE opSET opUTIME opGTIME opUTF8 opANY opCHOICE
  );

  foreach my $l (\@opParts, \@opName) {
    my $i = 0;
    foreach my $name (@$l) {
      my $j = $i++;
      no strict 'refs';
      *{__PACKAGE__ . '::' . $name} = sub () { $j }
    }
  }

  # Workaround for a bug in perl-5.6.0
  $1 || $2 || $3 || $4 || $5 || $6 || $7 || $8 || 0;
}

sub _internal_syms {
  my $pkg = caller;
  no strict 'refs';
  for my $sub (@opParts,@opName,'dump_op') {
    *{$pkg . '::' . $sub} = \&{__PACKAGE__ . '::' . $sub};
  }
}

sub ASN_BOOLEAN 	() { 0x01 }
sub ASN_INTEGER 	() { 0x02 }
sub ASN_BIT_STR 	() { 0x03 }
sub ASN_OCTET_STR 	() { 0x04 }
sub ASN_NULL 		() { 0x05 }
sub ASN_OBJECT_ID 	() { 0x06 }
sub ASN_REAL 		() { 0x09 }
sub ASN_ENUMERATED	() { 0x0A }
sub ASN_SEQUENCE 	() { 0x10 }
sub ASN_SET 		() { 0x11 }
sub ASN_PRINT_STR	() { 0x13 }
sub ASN_IA5_STR		() { 0x16 }
sub ASN_UTC_TIME	() { 0x17 }
sub ASN_GENERAL_TIME	() { 0x18 }

sub ASN_UNIVERSAL 	() { 0x00 }
sub ASN_APPLICATION 	() { 0x40 }
sub ASN_CONTEXT 	() { 0x80 }
sub ASN_PRIVATE		() { 0xC0 }

sub ASN_PRIMITIVE	() { 0x00 }
sub ASN_CONSTRUCTOR	() { 0x20 }

sub ASN_LONG_LEN	() { 0x80 }
sub ASN_EXTENSION_ID	() { 0x1F }
sub ASN_BIT 		() { 0x80 }


sub new {
  my $pkg = shift;
  my $self = bless {}, $pkg;

  $self->configure(@_);
  $self;
}


sub configure {
  my $self = shift;
  my %opt = @_;
  
  for my $type (qw(encode decode)) {
    if (exists $opt{$type}) {
      while(my($what,$value) = each %{$opt{$type}}) {
	$self->{options}{"${$type}_${what}"} = $value;
      }
    }
  }
}



sub find {
  my $self = shift;
  my $what = shift;
  return unless exists $self->{tree}{$what};
  my %new = %$self;
  $new{script} = $new{tree}->{$what};
  bless \%new, ref($self);
}


sub prepare {
  my $self = shift;
  my $asn  = shift;

  $self = $self->new unless ref($self);

  my $tree = Convert::ASN1::parser::parse($asn);

  unless ($tree) {
    $self->{error} = $@;
    return;
  }

  $self->{tree} = _pack_struct($tree);
  $self->{script} = (values %$tree)[0];
  $self;
}

# In XS the will convert the tree between perl and C structs

sub _pack_struct { $_[0] }
sub _unpack_struct { $_[0] }

##
## Encoding
##

sub encode {
  my $self  = shift;
  my $stash = @_ == 1 ? shift : { @_ };
  my $buf = '';
  local $SIG{__DIE__};
  eval { _encode($self->{options}, $self->{script}, $stash, $buf) }
    or do { $self->{error} = $@; undef }
}



# Encode tag value for encoding.
# We assume that the tag has been correclty generated with asn_tag()

sub asn_encode_tag {
  $_[0] >> 8
    ? $_[0] & 0x8000
      ? $_[0] & 0x800000
	? pack("V",$_[0])
	: substr(pack("V",$_[0]),0,3)
      : pack("v", $_[0])
    : chr($_[0]);
}


# Encode a length. If < 0x80 then encode as a byte. Otherwise encode
# 0x80 | num_bytes followed by the bytes for the number. top end
# bytes of all zeros are not encoded

sub asn_encode_length {

  if($_[0] >> 7) {
    my $lenlen = &num_length;

    return pack("Ca*", $lenlen | 0x80,  substr(pack("N",$_[0]), -$lenlen));
  }

  return pack("C", $_[0]);
}


##
## Decoding
##

sub decode {
  my $self  = shift;
  my $stash = {};

  local $SIG{__DIE__};
  eval { _decode($self->{options}, $self->{script}, $stash, 0, length $_[0], $_[0]); $stash }
  or do {
    $self->{'error'} = $@;
    undef;
  };
}


sub asn_decode_length {
  return unless length $_[0];

  my $len = ord substr($_[0],0,1);

  if($len & 0x80) {
    $len &= 0x7f;

    return if $len >= length $_[0];

    return (1+$len, unpack("N", "\0" x (4 - $len) . substr($_[0],1,$len)));
  }
  return (1, $len);
}


sub asn_decode_tag {
  return unless length $_[0];

  my $tag = ord $_[0];
  my $n = 1;

  if(($tag & 0x1f) == 0x1f) {
    my $b;
    do {
      return if $n >= length $_[0];
      $b = ord substr($_[0],$n,1);
      $tag |= $b << (8 * $n++);
    } while($b & 0x80);
  }
  ($n, $tag);
}


##
## Utilities
##

# How many bytes are needed to encode a number 

sub num_length {
  $_[0] >> 8
    ? $_[0] >> 16
      ? $_[0] >> 24
	? 4
	: 3
      : 2
    : 1
}

# Given a class and a tag, calculate an integer which when encoded
# will become the tag. This means that the class bits are always
# in the bottom byte, so are the tag bits if tag < 30. Otherwise
# the tag is in the upper 3 bytes. The upper bytes are encoded
# with bit8 representing that there is another byte. This
# means the max tag we can do is 0x1fffff

sub asn_tag {
  my($class,$value) = @_;

  die sprintf "Bad tag class 0x%x",$class
    if $class & ~0xe0;

  unless ($value & ~0x1f or $value == 0x1f) {
    return (($class & 0xe0) | $value);
  }

  die sprintf "Tag value 0x%08x too big\n",$value
    if $value & 0xffe00000;

  $class = ($class | 0x1f) & 0xff;

  my @t = ($value & 0x7f);
  unshift @t, (0x80 | ($value & 0x7f)) while $value >>= 7;
  unpack("V",pack("C4",$class,@t,0,0));
}


BEGIN {
  # When we have XS &_encode will be defined by the XS code
  # so will all the subs in these required packages 
  unless (defined &_encode) {
    require Convert::ASN1::_decode;
    require Convert::ASN1::_encode;
    require Convert::ASN1::IO;
  }

  require Convert::ASN1::parser;
}

sub AUTOLOAD {
  require Convert::ASN1::Debug if $AUTOLOAD =~ /dump/;
  goto &{$AUTOLOAD} if defined &{$AUTOLOAD};
  require Carp;
  my $pkg = ref($_[0]) || ($_[0] =~ /^[\w\d]+(?:::[\w\d]+)*$/)[0];
  if ($pkg and UNIVERSAL::isa($pkg, __PACKAGE__)) { # guess it was a method call
    $AUTOLOAD =~ s/.*:://;
    Carp::croak(sprintf q{Can't locate object method "%s" via package "%s"},$AUTOLOAD,$pkg);
  }
  else {
    Carp::croak(sprintf q{Undefined subroutine &%s called}, $AUTOLOAD);
  }
}

sub DESTROY {}

sub error { $_[0]->{error} }
1;
