# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent;

#line 255 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/logxcroak.al)"
#
# logxcroak
#
# Same a logcroak, but with a specific additional offset.
#
sub logxcroak {
	my $offset = shift;
	goto &logconfess if $Confess;		# Redirected when -confess
	my $ptag = prio_tag(priority_level(CRIT)) if defined $Priorities;
	my $str = tag_format_args($Caller, $ptag, $Tags, \@_);
	&log_default unless defined $Driver;
	$Driver->logxcroak($offset, $str);
	bug("back from logxcroak in driver $Driver\n");
}

# end of Log::Agent::logxcroak
1;
