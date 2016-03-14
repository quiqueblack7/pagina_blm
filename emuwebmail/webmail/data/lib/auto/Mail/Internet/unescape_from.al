# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Internet.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Mail::Internet;

#line 721 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Internet.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Mail/Internet/unescape_from.al)"
sub unescape_from
{
 my $me = shift;

 my $body = $me->body;
 local $_;

 scalar grep { s/\A>(>*From) /$1 /o } @$body;
}

1; # keep require happy





1;
# end of Mail::Internet::unescape_from
