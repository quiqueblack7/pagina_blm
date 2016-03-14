# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent;

#line 181 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/inited.al)"
#
# inited
#
# Returns whether Log::Agent was inited.
# NOT exported, must be called as Log::Agent::inited().
#
sub inited {
	return 0 unless defined $Driver;
	return ref $Driver ? 1 : 0;
}

# end of Log::Agent::inited
1;
