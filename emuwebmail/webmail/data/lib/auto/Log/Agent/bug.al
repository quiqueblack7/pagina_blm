# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent;

#line 413 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/bug.al)"
#
# bug
#
# Log bug, and die.
#
sub bug {
	my $ptag = prio_tag(priority_level(EMERG)) if defined $Priorities;
	my $str = tag_format_args($Caller, $ptag, $Tags, \@_);
	logerr("BUG: $str");
	die "${Prefix}: $str\n";
}

# end of Log::Agent::bug
1;
