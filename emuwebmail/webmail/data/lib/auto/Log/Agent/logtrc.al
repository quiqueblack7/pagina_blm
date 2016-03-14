# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent;

#line 351 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/logtrc.al)"
#
# logtrc		-- frozen
#
# Trace the message if trace level is set high enough.
# Trace level must either be a single digit or "priority" or "priority:digit".
#
sub logtrc {
	my $id = shift;
	my ($prio, $level) = priority_level($id);
	return if $level > $Trace;
	my $ptag = prio_tag($prio, $level) if defined $Priorities;
	my $str = tag_format_args($Caller, $ptag, $Tags, \@_);
	&log_default unless defined $Driver;
	$Driver->logwrite('output', $prio, $level, $str);
}

# end of Log::Agent::logtrc
1;
