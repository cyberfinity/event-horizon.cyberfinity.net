#!/usr/bin/perl

#
# Render the Guestbook for the oblock site!
#

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
	return 0;
    }

    # Get key/val pairs
    @in=split(/[&;]/,$in);

    for ($i=0; $i < @in; $i++){
	# let +es become spaces
	$in[$i]=~s/\+/ /g;
	# split into key and val
	($key,$val)=split(/=/,$in[$i],2);
	# convert hex to letters'n'numbers
	$key=~s/%(..)/pack("c",hex($1))/ge;
	$key=~s/%(..)/pack("c",hex($1))/ge;

	# fill the hash using \0 to seperate multiple values with the same key
	$input{$key}.="\0" if (defined($input{$key}));
	$input{$key}.=$val;
    }
    return 1;
}

###############################################
#
# now we can do our actual processing...
#

# take output from time and make it look pretty!
sub formatDate{
    local($time)=@_[0];
    local(@time)=localtime($time);
    local($day,$month,$year,$output);
    $day=("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")[$time[6]];
    $month=("January","February","March","April","May","June","July","August","September","October","November","December")[$time[4]];
    $year=$time[5]+1900;
    $output="$day, $time[3]\. $month $year at $time[2]:$time[1]";

    return $output
}

# take a line from the entries file and make it ready for inclusion
# in the finished page
sub renderEntry{
    local(@entry)=split(/\¬\|/,@_[0]);
    local($output,$name);
    $name=$entry[0];
    if($entry[1]){
	$name="<a href=\"mailto:".$entry[1]."\">$name</a>";
    }
    $output="<img src=tesco_head_home.gif width=110 height=75><br>\n";
    $output.="<span class=heading>".$name."</span> made this entry on ".&formatDate($entry[3])."\n";
    $output.="<p>$entry[2]</p>";
    return $output;
}

# figure out, which entries need displaying and render them
sub renderBody{
    # get entries...
    open(FILE,"entries.txt") or &errorPage("There are no entries in Guestbook yet!");
    local(@entries,$line,$rev,$page_len,$page_num);
    # how many entries per page?
    $page_len=5;

    # read in the entries
    foreach $line (<FILE>){
	chop($line);
	$entries[@entries]=$line;
    }
    close(FILE);    
    # figure out which way to output
    if (&getInput){
	if(defined($input{"rev"})){
	    # reverse the order
	    $rev=1;
	    # otherwise this will stay 0
	}
	if($input{"order"} eq "alpha"){
	    # order alpahbetically by name
	    local(%named,$name,$data);
	    foreach $line (@entries){
		($name,$data)=split(/\¬\|/,$line,2);
		# put together data from same names
		if (defined($named{$name})){
		    $named{$name}.="\0\~\0";
		}
		$named{$name}.=$data;
	    }
	    # clear entries array
	    @entries=();
	    # fill it up with elements alphabetically ordered
	    foreach $name (sort(keys(%named))){
		foreach $line (split(/\0\~\0/,$named{$name})){
		    $entries[@entries]=$name."\¬\|".$line;
		}
	    }
	}
	if(defined($input{"page"})){
	    # which page should we display?
	    $page=$input{$page};
	}
	else{
	    # default
	    $page=1;
	}
    }
    else{
	# nothing was set, so we use the defaults
	$rev=0;
	$page=1;
    }


    # how many pages will there be?
    local($tmp)=$#entries/$page_len;
    if ($tmp == 0){
	# it splits up evenly...
	$page_num=$tmp;
    }
    else{
	# it doesn't, so we need to add a page for the rest
	$page_num=int($tmp)+1;
    }
    # is the requested page in that range?
    if (($page > $page_num)||($page < 1)){
	# default to page 1
	$page=1;
    }

    # variables we need from now on...
    local($output,$first);

    $output.="<div class=centre><span class=heading>Guestbook (Page $page/$page_num)</span></div><p>&nbsp;";






    # print them!
    $first=1;
    if ($rev){
	foreach $line (reverse(@entries)){
	    $output.=&renderEntry($line)."\n";
	}
    }
    else{
	foreach $line (@entries){
	    $output.=&renderEntry($line)."\n";
	}
    }
    return $output;

}


# Time to make the page...

$body=&renderBody;

###############################################
# output finished page
print "Content-type: text/html\n\n";
print $header.$body.$footer;
