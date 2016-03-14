# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Internet.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Mail::Internet;

#line 524 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Internet.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Mail/Internet/_prephdr.al)"
sub _prephdr {

    use Mail::Util;

    my $hdr = shift;

    $hdr->delete('From '); # Just in case :-)

    # An original message should not have any Received lines

    $hdr->delete('Received');

    $hdr->replace('X-Mailer', "Perl5 Mail::Internet v" . $Mail::Internet::VERSION);

    my $name = eval { local $SIG{__DIE__}; (getpwuid($>))[6] } || $ENV{NAME} || "";

    while($name =~ s/\([^\(\)]*\)//) { 1; }

    if($name =~ /[^\w\s]/) {
	$name =~ s/"/\"/g;
	$name = '"' . $name . '"';
    }

    my $from = sprintf "%s <%s>", $name, Mail::Util::mailaddress();
    $from =~ s/\s{2,}/ /g;

    my $tag;

    foreach $tag (qw(From Sender)) {
	$hdr->add($tag,$from)
	    unless($hdr->get($tag));
    }
}

# end of Mail::Internet::_prephdr
1;
