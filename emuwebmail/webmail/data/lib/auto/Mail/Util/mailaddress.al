# NOTE: Derived from /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Util.pm.
# Changes made here will be lost when autosplit is run again.
# See AutoSplit.pm.
package Mail::Util;

#line 203 "/srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/Mail/Util.pm (autosplit into /srv/www/vhosts/kvas.sa.plesk.ru/cgi-bin/EmuWebmail-7.0.1/modules/built_modules/auto/Mail/Util/mailaddress.al)"
sub mailaddress {

    ##
    ## Return imediately if already found
    ##

    return $mailaddress
	if(defined $mailaddress);

    ##
    ## Get user name from environment
    ##

    $mailaddress = $ENV{MAILADDRESS};

    unless ($mailaddress || $^O ne 'MacOS') {
	require Mac::InternetConfig;
	Mac::InternetConfig->import();

	$mailaddress = $InternetConfig{kICEmail()};
    }

    $mailaddress ||= $ENV{USER} ||
                     $ENV{LOGNAME} ||
                     eval { (getpwuid($>))[6] } ||
                     "postmaster";

    ##
    ## Add domain if it does not exist
    ##

    $mailaddress .= '@' . maildomain()
	unless($mailaddress =~ /\@/);

    $mailaddress =~ s/(^.*<|>.*$)//g;

    $mailaddress;
}

1;
# end of Mail::Util::mailaddress
