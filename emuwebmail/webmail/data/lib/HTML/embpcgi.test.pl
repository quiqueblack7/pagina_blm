#!/usr/bin/perl 
###################################################################################
#
#   Embperl - Copyright (c) 1997-1999 Gerald Richter / ECOS
#
#   You may distribute under the terms of either the GNU General Public
#   License or the Artistic License, as specified in the Perl README file.
#   For use with Apache httpd and mod_perl, see also Apache copyright.
#
#   THIS PACKAGE IS PROVIDED "AS IS" AND WITHOUT ANY EXPRESS OR
#   IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE IMPLIED
#   WARRANTIES OF MERCHANTIBILITY AND FITNESS FOR A PARTICULAR PURPOSE.
#
###################################################################################



BEGIN 
    {
    use ExtUtils::testlib ;
    eval { require Apache::Session; } if ($ENV{EMBPERL_SESSION_CLASSES}) ;	
    $@ = '' ;
    }	


use HTML::Embperl;



$^W = 1;


my $rc = HTML::Embperl::runcgi ;

if ($rc)
    {
    $time = localtime ;

    print <<EOT;
Status: $rc
Content-Type: text/html

<HTML><HEAD><TITLE>Embperl Error</TITLE></HEAD>
<BODY bgcolor=\"#FFFFFF\">
<H1>embpcgi Server Error: $rc</H1>
Please contact the server administrator, $ENV{SERVER_ADMIN} and inform them of the time the error occurred, and anything you might have done that may have caused the error.<P><P>
$ENV{SERVER_SOFTWARE} HTML::Embperl $HTML::Embperl::VERSION [$time]<P>
</BODY></HTML>

EOT
    }



