# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent;

#line 425 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/prio_tag.al)"
#
# prio_tag
#
# Returns Log::Agent::Tag::Priority message that is suitable for tagging
# at this priority/level, if configured to log priorities.
#
# Objects are cached into %prio_cache.
#
sub prio_tag {
	my ($prio, $level) = @_;
	my $ptag = $prio_cache{$prio, $level};
	return $ptag if defined $ptag;

	require Log::Agent::Tag::Priority;

	#
	# Common attributes (formatting, postfixing, etc...) are held in
	# the $Priorities global variable.  We add the priority/level here.
	#

	$ptag = Log::Agent::Tag::Priority->make(
		-priority	=> $prio,
		-level		=> $level,
		@$Priorities
	);

	return $prio_cache{$prio, $level} = $ptag;
}

1;
# end of Log::Agent::prio_tag
