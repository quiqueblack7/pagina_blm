#!/usr/bin/perl

# EMUmail custom file (c) 1999 EMUmail, Inc.

package EMU::Custom;

sub pre_login
{
    package EMU;
    my ($username) = @_;
    my ($user, $host);

    ($user,$host) = split('@', $username) if ($username =~ /@/);

    # do something
}

sub success_login
{
    package EMU;
    my ($username) = @_;
    my ($user, $host);

    ($user,$host) = split('@', $username) if ($username =~ /@/);

    # do something
}

sub first_login
{
    package EMU;
    my ($username) = @_;
    my ($user, $host);

    ($user,$host) = split('@', $username) if ($username =~ /@/);

    # do something
}

sub bad_login
{
    package EMU;
    my ($username) = @_;
    my ($user, $host);

    ($user,$host) = split('@', $username) if ($username =~ /@/);

    # do something
}

sub spam_filter_by_header
{
	package EMU;
	my ($headervalue) = @_;
	
	# if this function returned 0 - it's NOT spam
	# if 1 - it's spam
	
	# return undef means we ignore this function's result
	return undef;
}

1;
