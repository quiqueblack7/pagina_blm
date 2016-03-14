# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent/Priorities.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent::Priorities;

#line 93 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent/Priorities.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/Priorities/level_from_prio.al)"
#
# level_from_prio
#
# Given a syslog priority, compute suitable level.
#
sub level_from_prio {
	my ($prio) = @_;
	return -1 if lc($prio) eq 'none';		# none & notice would look alike
	my $canonical = lc(substr($prio, 0, 2));
	return 10 unless exists $basic_level{$canonical};
	return $basic_level{$canonical} || -1;
}

# end of Log::Agent::Priorities::level_from_prio
1;
