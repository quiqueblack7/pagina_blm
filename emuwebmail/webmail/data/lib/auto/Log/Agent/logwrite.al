# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent;

#line 395 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/logwrite.al)"
###
### Utilities
###

#
# logwrite		-- not exported by default
#
# Write message to the specified channel, at the given priority.
#
sub logwrite {
	my ($channel, $id) = splice(@_, 0, 2);
	my ($prio, $level) = priority_level($id);
	my $ptag = prio_tag($prio, $level) if defined $Priorities;
	my $str = tag_format_args($Caller, $ptag, $Tags, \@_);
	&log_default unless defined $Driver;
	$Driver->logwrite($channel, $prio, $level, $str);
}

# end of Log::Agent::logwrite
1;
