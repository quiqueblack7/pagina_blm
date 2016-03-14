# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Storable.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Storable;

#line 334 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Storable.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Storable/thaw.al)"
#
# thaw
#
# Recreate objects in memory from an existing frozen image created
# by freeze.  If the frozen image passed is undef, return undef.
#
sub thaw {
	my ($frozen) = @_;
	return undef unless defined $frozen;
	my $self;
	my $da = $@;							# Could be from exception handler
	eval { $self = mretrieve($frozen) };	# Call C routine
	logcroak $@ if $@ =~ s/\.?\n$/,/;
	$@ = $da;
	return $self;
}

1;
# end of Storable::thaw
