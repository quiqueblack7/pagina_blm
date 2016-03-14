# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Text::CSV;

#line 98 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Text/CSV/fields.al)"
################################################################################
# fields
#
#    object method returning the result of the most recent parse() or the input
#    to the most recent combine(), whichever is more recent.  there are no
#    side-effects.
################################################################################
sub fields {
  my $self = shift;
  if (ref($self->{'_FIELDS'})) {
    return @{$self->{'_FIELDS'}};
  }
  return undef;
}

# end of Text::CSV::fields
1;
