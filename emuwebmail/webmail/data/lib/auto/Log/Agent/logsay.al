# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent;

#line 338 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/logsay.al)"
#
# logsay
#
# Log message at the "notice" level.
#
sub logsay {
	return if $Trace < NOTICE;
	my $ptag = prio_tag(priority_level(NOTICE)) if defined $Priorities;
	my $str = tag_format_args($Caller, $ptag, $Tags, \@_);
	&log_default unless defined $Driver;
	$Driver->logsay($str);
}

# end of Log::Agent::logsay
1;
