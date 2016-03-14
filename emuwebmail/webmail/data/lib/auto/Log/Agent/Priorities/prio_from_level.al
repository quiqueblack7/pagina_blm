# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent/Priorities.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent::Priorities;

#line 81 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent/Priorities.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/Priorities/prio_from_level.al)"
#
# prio_from_level
#
# Given a level, compute suitable priority.
#
sub prio_from_level {
	my ($level) = @_;
	return 'none' if $level < 0;
	return 'debug' if $level >= @basic_prio;
	return $basic_prio[$level];
}

# end of Log::Agent::Priorities::prio_from_level
1;
