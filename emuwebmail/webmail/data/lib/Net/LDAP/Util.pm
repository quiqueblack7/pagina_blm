# Copyright (c) 1999-2000 Graham Barr <gbarr@pobox.com>. All rights reserved.
# This program is free software; you can redistribute it and/or
# modify it under the same terms as Perl itself.

package Net::LDAP::Util;

=head1 NAME

Net::LDAP::Util - Utility functions

=head1 SYNOPSIS

  use Net::LDAP::Util qw(ldap_error_text
                         ldap_error_name
                         ldap_error_desc
                        );

  $mesg = $ldap->search( .... );

  die "Error ",ldap_error_name($mesg->code) if $mesg->code;

=head1 DESCRIPTION

B<Net::LDAP::Util> is a collection of utility functions for use with
the L<Net::LDAP|Net::LDAP> modules.

=head1 FUNCTIONS

=over 4

=cut

use vars qw($VERSION);
require Exporter;
@ISA = qw(Exporter);
@EXPORT_OK = qw(
  ldap_error_name
  ldap_error_text
  ldap_error_desc
);
$VERSION = "0.04";

=item ldap_error_name ( NUM )

Returns the name corresponding with the error number passed in. If the
error is not known the a string in the form C<"LDAP error code %d(0x%02X)">
is returned.

=cut

my @err2name;

sub ldap_error_name {
  my $code = 0+ shift;
  require Net::LDAP::Constant;

  unless (@err2name) {
    local *FH;

    if (open(FH,$INC{'Net/LDAP/Constant.pm'})) {
      while(<FH>) {
        ($err2name[hex($2)] = $1) if /^sub\s+(LDAP_\S+)\s+\(\)\s+\{\s+0x([0-9a-fA-f]{2})\s+\}/;
      }
      close(FH);
    }
  }
  $err2name[$code] || sprintf("LDAP error code %d(0x%02X)",$code,$code);
}

=item ldap_error_text ( NUM )

Returns the text from the POD description for the given error. If the
error code given is unknown then C<undef> is returned.

=cut

sub ldap_error_text {
  my $name = ldap_error_name(shift);
  my $text;
  if($name =~ /^LDAP_/) {
    my $pod = $INC{'Net/LDAP/Constant.pm'};
    substr($pod,-3) = ".pod";
    local *F;
    open(F,$pod) or return;
    local $/ = "";
    local $_;
    my $len = length($name);
    my $indent = 0;
    while(<F>) {
      if(substr($_,0,11) eq "=item LDAP_") {
        last if defined $text;
	$text = "" if /^=item $name\b/;
      }
      elsif(defined $text && /^=(\S+)/) {
        $indent = 1 if $1 eq "over";
        $indent = 0 if $1 eq "back";
	$text .= " * " if $1 eq "item";
      }
      elsif(defined $text) {
        if($indent) {
          s/\n(?=.)/\n   /sog;
	}
        $text .= $_;
      }
    }
    close(F);
    $text =~ s/\n+\Z/\n/ if defined $text;
  }
  $text;
}

=item ldap_error_desc ( NUM )

Returns a short text description of the error.

=cut

my @err2desc = (
  "Success",                                             # 0x00 LDAP_SUCCESS
  "Operations error",                                    # 0x01 LDAP_OPERATIONS_ERROR
  "Protocol error",                                      # 0x02 LDAP_PROTOCOL_ERROR
  "Timelimit exceeded",                                  # 0x03 LDAP_TIMELIMIT_EXCEEDED
  "Sizelimit exceeded",                                  # 0x04 LDAP_SIZELIMIT_EXCEEDED
  "Compare false",                                       # 0x05 LDAP_COMPARE_FALSE
  "Compare true",                                        # 0x06 LDAP_COMPARE_TRUE
  "Strong authentication not supported",                 # 0x07 LDAP_STRONG_AUTH_NOT_SUPPORTED
  "Strong authentication required",                      # 0x08 LDAP_STRONG_AUTH_REQUIRED
  "Partial results and referral received",               # 0x09 LDAP_PARTIAL_RESULTS
  "Referral received",                                   # 0x0a LDAP_REFERRAL
  "Admin limit exceeded",                                # 0x0b LDAP_ADMIN_LIMIT_EXCEEDED
  "Critical extension not available",                    # 0x0c LDAP_UNAVAILABLE_CRITICAL_EXT
  "Confidentiality required",                            # 0x0d LDAP_CONFIDENTIALITY_REQUIRED
  "SASL bind in progress",                               # 0x0e LDAP_SASL_BIND_IN_PROGRESS
  undef,
  "No such attribute",                                   # 0x10 LDAP_NO_SUCH_ATTRIBUTE
  "Undefined attribute type",                            # 0x11 LDAP_UNDEFINED_TYPE
  "Inappropriate matching",                              # 0x12 LDAP_INAPPROPRIATE_MATCHING
  "Constraint violation",                                # 0x13 LDAP_CONSTRAINT_VIOLATION
  "Type or value exists",                                # 0x14 LDAP_TYPE_OR_VALUE_EXISTS
  "Invalid syntax",                                      # 0x15 LDAP_INVALID_SYNTAX
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  "No such object",                                      # 0x20 LDAP_NO_SUCH_OBJECT
  "Alias problem",                                       # 0x21 LDAP_ALIAS_PROBLEM
  "Invalid DN syntax",                                   # 0x22 LDAP_INVALID_DN_SYNTAX
  "Object is a leaf",                                    # 0x23 LDAP_IS_LEAF
  "Alias dereferencing problem",                         # 0x24 LDAP_ALIAS_DEREF_PROBLEM
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  "Inappropriate authentication",                        # 0x30 LDAP_INAPPROPRIATE_AUTH
  "Invalid credentials",                                 # 0x31 LDAP_INVALID_CREDENTIALS
  "Insufficient access",                                 # 0x32 LDAP_INSUFFICIENT_ACCESS
  "DSA is busy",                                         # 0x33 LDAP_BUSY
  "DSA is unavailable",                                  # 0x34 LDAP_UNAVAILABLE
  "DSA is unwilling to perform",                         # 0x35 LDAP_UNWILLING_TO_PERFORM
  "Loop detected",                                       # 0x36 LDAP_LOOP_DETECT
  undef,
  undef,
  undef,
  undef,
  undef,
  "Sort control missing",                                # 0x3C LDAP_SORT_CONTROL_MISSING
  "Index range error",                                   # 0x3D LDAP_INDEX_RANGE_ERROR
  undef,
  undef,
  "Naming violation",                                    # 0x40 LDAP_NAMING_VIOLATION
  "Object class violation",                              # 0x41 LDAP_OBJECT_CLASS_VIOLATION
  "Operation not allowed on nonleaf",                    # 0x42 LDAP_NOT_ALLOWED_ON_NONLEAF
  "Operation not allowed on RDN",                        # 0x43 LDAP_NOT_ALLOWED_ON_RDN
  "Already exists",                                      # 0x44 LDAP_ALREADY_EXISTS
  "Cannot modify object class",                          # 0x45 LDAP_NO_OBJECT_CLASS_MODS
  "Results too large",                                   # 0x46 LDAP_RESULTS_TOO_LARGE
  "Affects multiple servers",                            # 0x47 LDAP_AFFECTS_MULTIPLE_DSAS
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  undef,
  "Unknown error",                                       # 0x50 LDAP_OTHER
  "Can't contact LDAP server",                           # 0x51 LDAP_SERVER_DOWN
  "Local error",                                         # 0x52 LDAP_LOCAL_ERROR
  "Encoding error",                                      # 0x53 LDAP_ENCODING_ERROR
  "Decoding error",                                      # 0x54 LDAP_DECODING_ERROR
  "Timed out",                                           # 0x55 LDAP_TIMEOUT
  "Unknown authentication method",                       # 0x56 LDAP_AUTH_UNKNOWN
  "Bad search filter",                                   # 0x57 LDAP_FILTER_ERROR
  "Canceled",                                            # 0x58 LDAP_USER_CANCELED
  "Bad parameter to an ldap routine",                    # 0x59 LDAP_PARAM_ERROR
  "Out of memory",                                       # 0x5a LDAP_NO_MEMORY
  "Can't connect to the LDAP server",                    # 0x5b LDAP_CONNECT_ERROR
  "Not supported by this version of the LDAP protocol",  # 0x5c LDAP_NOT_SUPPORTED
  "Requested LDAP control not found",                    # 0x5d LDAP_CONTROL_NOT_FOUND
  "No results returned",                                 # 0x5e LDAP_NO_RESULTS_RETURNED
  "More results to return",                              # 0x5f LDAP_MORE_RESULTS_TO_RETURN
  "Client detected loop",                                # 0x60 LDAP_CLIENT_LOOP
  "Referral hop limit exceeded",                         # 0x61 LDAP_REFERRAL_LIMIT_EXCEEDED
);

sub ldap_error_desc {
  my $code = shift;
  $err2desc[$code] || sprintf("LDAP error code %d(0x%02X)",$code,$code);
}

=back

=head1 AUTHOR

Graham Barr <gbarr@pobox.com>

=head1 COPYRIGHT

Copyright (c) 1999-2000 Graham Barr. All rights reserved. This program is
free software; you can redistribute it and/or modify it under the same
terms as Perl itself.

=for html <hr>

I<$Id$>

=cut

1;
