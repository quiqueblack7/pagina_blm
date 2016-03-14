# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Text::CSV;

#line 46 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Text/CSV.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Text/CSV/new.al)"
################################################################################
# new
#
#    class/object method expecting no arguments and returning a reference to a
#    newly created Text::CSV object.
################################################################################
sub new {
  my $proto = shift;
  my $class = ref($proto) || $proto;
  my $self = {};
  $self->{'_STATUS'} = undef;
  $self->{'_ERROR_INPUT'} = undef;
  $self->{'_STRING'} = undef;
  $self->{'_FIELDS'} = undef;
  bless $self, $class;
  return $self;
}

# end of Text::CSV::new
1;
