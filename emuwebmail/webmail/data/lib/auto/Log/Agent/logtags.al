# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Log::Agent;

#line 383 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Log/Agent.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Log/Agent/logtags.al)"
#
# logtags
#
# Returns info on user-defined logging tags.
# Asking for this creates the underlying taglist object if not already present.
#
sub logtags {
	return $Tags if defined $Tags;
	require Log::Agent::Tag_List;
	return $Tags = Log::Agent::Tag_List->make();
}

# end of Log::Agent::logtags
1;
