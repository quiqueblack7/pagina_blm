# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Text::CSV;

#line 64 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Text/CSV/status.al)"
################################################################################
# status
#
#    object method returning the success or failure of the most recent combine()
#    or parse().  there are no side-effects.
################################################################################
sub status {
  my $self = shift;
  return $self->{'_STATUS'};
}

# end of Text::CSV::status
1;
