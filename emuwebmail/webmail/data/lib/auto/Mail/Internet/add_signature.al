# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Internet.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Mail::Internet;

#line 483 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Internet.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Mail/Internet/add_signature.al)"
sub add_signature
{
 my $me = shift;
 carp "add_signature depriciated, use ->sign" if $^W;
 $me->sign(File => shift || "$ENV{HOME}/.signature");
}

# end of Mail::Internet::add_signature
1;
