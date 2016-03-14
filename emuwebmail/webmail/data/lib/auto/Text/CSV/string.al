# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Text::CSV;

#line 86 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Text/CSV/string.al)"
################################################################################
# string
#
#    object method returning the result of the most recent combine() or the
#    input to the most recent parse(), whichever is more recent.  there are no
#    side-effects.
################################################################################
sub string {
  my $self = shift;
  return $self->{'_STRING'};
}

# end of Text::CSV::string
1;
