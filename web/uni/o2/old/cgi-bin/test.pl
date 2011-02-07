#!/usr/bin/perl

#
# This program will output an HTML page using
# the file header.htm to begin with, then it will
# include its own stuff and finish the page using
# footer.htm
#

# get header...
open(FILE,"header.htm") or die "Couldn't read header file!";
$header=join("",<FILE>);
close(FILE);

# get footer...
open(FILE,"footer.htm") or die "Couldn't read footer file!";
$footer=join("",<FILE>);
close(FILE);

# provide neat error messages
sub errorPage{
    local($error)=@_[0];
    print "Content-type: text/html\n\n".$header."Sorry, but your request could not be handled due to the following error:<p><i>\n".$error."\n</i><p>Best thing to do is to hit your browser's 'BACK' button and try again!".$footer;

    die $error;
}

#######################################################
# CGI subroutine...

# Input:
# store it all in here...
%input;

sub getInput{
    # mostly nicked from Steven E. Brenner's cgi-lib.pl
    # for more info see:
    # http://www.bio.cam.ac.uk/web/form.html
    # http://www.seas.upenn.edu/~mengwong/forms/

    local($in,@in,$i,$key,$val);
    
    # was GET used?
    if ($ENV{"REQUEST_METHOD"} eq "GET"){
	$in=$ENV{"QUERY_STRING"};
    }
    # ..or was it POST
    elsif ($ENV{"REQUEST_METHOD"} eq "POST"){
	read(STDIN,$in,$ENV{"CONTENT_LENGTH"});
    }
    # ..or was nothing sent at all
    else{
	return false;
    }

    # Get key/val pairs
    @in=split(/[&;]/,$in);

    for ($i=0; $i < @in; $i++){
	# let +es become spaces
	$in[$i]=~s/\+/ /g;
	# split into key and val
	($key,$val)=split("=",$in[$i],2);
	# convert hex to letters'n'numbers
	$key=~s/%(..)/pack("c",hex($1))/ge;
	$key=~s/%(..)/pack("c",hex($1))/ge;

	# fill the hash using \0 to seperate multiple values with the same key
	$in{$key}.="\0" if (defined($In{$key}));
	$in{$key}.=$val;
    }
    return true;
}

###############################################
#
# now we can do our actual processing...
#

# take output from time and make it look pretty!
sub formatDate{
    local($time)=@_[0];
    local(@time)=localtime($time);
    $day=("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")[$time[6]];
    $month=("January","February","March","April","May","June","July","August","September","October","November","December")[$time[4]];
    $year=$time[5]+1900;
    $output="$day, $time[3]\. $month at $time[2]:$time[1]";

    return $output
}


# what do we want to add?

$body="Yo yo yo! It is now ".&formatDate(time)."<p>\n";





###############################################
# output finished page
print "Content-type: text/html\n\n";
print $header.$body.$footer;
