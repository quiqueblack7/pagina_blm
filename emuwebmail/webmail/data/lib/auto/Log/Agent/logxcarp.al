# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent;

#line 311 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/logxcarp.al)"
#
# logxcarp
#
# Same a logcarp, but with a specific additional offset.
#
sub logxcarp {
	return if $Trace < WARN;
	my $offset = shift;
	my $ptag = prio_tag(priority_level(WARN)) if defined $Priorities;
	my $str = tag_format_args($Caller, $ptag, $Tags, \@_);
	&log_default unless defined $Driver;
	$Driver->logxcarp($offset, $str);
}

# end of Log::Agent::logxcarp
1;
