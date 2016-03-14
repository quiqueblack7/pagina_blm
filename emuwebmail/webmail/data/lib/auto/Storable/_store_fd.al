# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Storable.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Storable;

#line 223 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Storable.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Storable/_store_fd.al)"
# Internal store routine on opened file descriptor
sub _store_fd {
	my $xsptr = shift;
	my $self = shift;
	my ($file) = @_;
	logcroak "not a reference" unless ref($self);
	logcroak "too many arguments" unless @_ == 1;	# No @foo in arglist
	my $fd = fileno($file);
	logcroak "not a valid file descriptor" unless defined $fd;
	my $da = $@;				# Don't mess if called from exception handler
	my $ret;
	# Call C routine nstore or pstore, depending on network order
	eval { $ret = &$xsptr($file, $self) };
	logcroak $@ if $@ =~ s/\.?\n$/,/;
	$@ = $da;
	return $ret ? $ret : undef;
}

# end of Storable::_store_fd
1;
