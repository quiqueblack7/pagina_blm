# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Storable.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Storable;

#line 317 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Storable.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Storable/fd_retrieve.al)"
#
# fd_retrieve
#
# Same as retrieve, but perform from an already opened file descriptor instead.
#
sub fd_retrieve {
	my ($file) = @_;
	my $fd = fileno($file);
	logcroak "not a valid file descriptor" unless defined $fd;
	my $self;
	my $da = $@;							# Could be from exception handler
	eval { $self = pretrieve($file) };		# Call C routine
	logcroak $@ if $@ =~ s/\.?\n$/,/;
	$@ = $da;
	return $self;
}

# end of Storable::fd_retrieve
1;
