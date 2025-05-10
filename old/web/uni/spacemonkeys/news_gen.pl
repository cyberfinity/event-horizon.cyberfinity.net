#!/usr/bin/perl
#
# This script reads the news.txt file and
# either outputs the last 3 news items or
# if view=all is specified as a GET argument
# all news items are displayed
#


# set how many news items we want on the front page
$front = 3;

# set how many items to be displayed on one old news page
$following = 5;

#
# function to produce blue box
#
sub blueBox{
    $text = @_[0];
    print "<div class=\"box\">\n";
    print $text;
    print "</div>\n";
}

#
# function to make an error in a blue box
#
sub errPrint{
    $err = @_[0];

    $output .= "The following error occured while generating the news:\n<p>\n";
    $output .= $err."\n<p>Sorry about that!\n";

    &blueBox($output);

    die;

}


#
# Print header...
#
print "Content-type: text/html\n\n";


#
# get the GET stuff :P
#

%in;

$input = $ENV{'QUERY_STRING'};

#print $input."\n\n";

@in = split (/[&;]/,$input);

foreach $i (0 .. $#in){
    # convert + to space
    $in[$i] =~ s/\+/ /g;
    
    # split key and value
    ($key, $val) = split(/=/,$in[$i],2); # splits on first =
    
    # convert %XX from hex to alphanumeric
    $key =~ s/%(..)/pack("c",hex($1))/ge;
    $val =~ s/%(..)/pack("c",hex($1))/ge;
    
    # make hash
    $in{$key}= $val;
}



#
# Read in news
#

open FILE, "news.txt" || &errPrint("Could not open news file!");

@lines = <FILE>;

close FILE;

#
# Process it
#
if ( @lines == 0 ){
    # no news!
    &blueBox("Sorry, there doesn't seem to be any news yet!\n");
}
else{
    # there is some news

    if ( scalar(keys(%in)) > 0){
	# display remaining news

	# with which news item should we begin
	$start_index = $in{"start"};

	# and before which one should we end
	$limit = $start_index + $following;

	# assume we have more than we can fit on this page
	$next = 1;

	# are we doing a full page or less?
	if (@lines <= $limit){
	    $limit = @lines;
	    $next = 0;
	}
	
	for ($i = $start_index; $i < $limit; $i++){
	    # extract values of this news entry
	    ($date, $author, $news) = split("¬¬", $lines[$i]);
	    # make nice date string:
	    @gmt_out = gmtime($date);
	    @months = ("January","February","March","April","May","June","July","August",
		       "September","October","November","December");
	    $year = $gmt_out[5] + 1900;
	    $dstring = $gmt_out[3].". ".$months[$gmt_out[4]]." ".$year;

	    &blueBox("<u>$dstring</u> (by $author)\n<p>\n$news");    

	    if ($i < ($limit - 1)){
		# add <P>s between boxes
		print "<p>\n";
	    }
	}

	# add link if there are more news items...
	if ($next){
	    print "<p>\n<a href=\"old_news.shtml?start=$limit\">Even older news...</a>\n<p>\n";
	}
		
    }
    else{
	# show only last 3
	
	# do we have at least 3?
	$j = $front;
	if (@lines < $front){
	    $j = @lines;
	}

	for ($i = 0; $i < $j; $i++){
	    # extract values of this news entry
	    ($date, $author, $news) = split("¬¬", $lines[$i]);
	    # make nice date string:
	    @gmt_out = gmtime($date);
	    @months = ("January","February","March","April","May","June","July","August",
		       "September","October","November","December");
	    $year = $gmt_out[5] + 1900;
	    $dstring = $gmt_out[3].". ".$months[$gmt_out[4]]." ".$year;

	    &blueBox("<u>$dstring</u> (by $author)\n<p>\n$news");

	    if ($i < ($j - 1)){
		# add <P>s between boxes
		print "<p>\n";
	    }


	}

	# add link if there are more news items...
	if (@lines >= $front){
	    print "<p>\n<a href=\"old_news.shtml?start=$front\">Older news...</a>\n<p>\n";
	}

    }

}
