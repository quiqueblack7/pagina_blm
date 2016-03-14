# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Internet.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Mail::Internet;

#line 632 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Internet.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Mail/Internet/send.al)"
sub send;

use Mail::Mailer;
use strict;

 sub send 
{
    my ($src, $type, @args) = @_;

    my $hdr = $src->head->dup;

    _prephdr($hdr);

    my $headers = $hdr->header_hashref;

    # Actually send it
    my $mailer = Mail::Mailer->new($type, @args);
    $mailer->open($headers);
    $src->print_body($mailer);
    $mailer->close();
}

# end of Mail::Internet::send
1;
