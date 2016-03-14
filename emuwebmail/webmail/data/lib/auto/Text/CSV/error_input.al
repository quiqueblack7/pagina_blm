# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Text::CSV;

#line 75 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Text/CSV/error_input.al)"
################################################################################
# error_input
#
#    object method returning the first invalid argument to the most recent
#    combine() or parse().  there are no side-effects.
################################################################################
sub error_input {
  my $self = shift;
  return $self->{'_ERROR_INPUT'};
}

# end of Text::CSV::error_input
1;
