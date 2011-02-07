#!/usr/bin/perl
#
# This script reads the news.txt file and
# either outputs the last 3 news items or
# if view=all is specified as a GET argument
# all news items are displayed
#



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
# function to output top of page
#
sub pageTop{
    $title=@_[0];

    print <<EOF;
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>$title</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link rel=stylesheet type="text/css" href="style/spacemonkey.css">
</head>
<body bgcolor="ffffff" text="022a62" link="98135b" vlink="565656" alink="98135b">
<a href="http://event-horizon.kicks-ass.net/uni/spacemonkeys/"><img src="style/spacemonkey-logo.png" width="401" height="117" alt="SpaceMonkeys" border="0"></a>
<p>
<div class="maintext">
<h1><a name="news"><img src="../../news.png" width="99" height="26" alt="News"></a></h1>
EOF
}

#
# funtion to print the bottom of the page
#
sub pageBot{
    print <<EOF;
<hr>
<div class="footer">
<a href="http://validator.w3.org"><img src="style/w3c-html.png" width="88"
height="31" alt="W3C HTML 4.01" border=0></a>
<a href="http://jigsaw.w3.org/css-validator"><img src="style/w3c-css.png"
width="88" height="31" alt="W3C CSS" border=0></a>
 (c) 2002 SpaceMonkeys
</div>
</div>
</body>
</html>
EOF
}


sub pageForm{
    ($name,$text)=@_;

    $form = <<EOF;
Adding news to our website's entry page couldn't be easier! Just pick your name from the list, type the news in the box below and hit "Preview!".
<p>
Your may use HTML code in your posts. Infact, if you want to create a forced line break you will need to! (Just use a &lt;P&gt; or &lt;BR&gt;!)
<p>
&nbsp;
<p>
<form method="post" action="news_add.pl">
Choose your username: <select name="user">
<option value="btm">btm</option>
<option value="cirrus">cirrus</option>
<option value="cypher">cypher</option>
<option value="gargon">gargon</option>
<option value="potnoodle">potnoodle</option>
<option value="teknojunky">teknojunky</option>
</select>
<p>
News:<br>
<textarea cols="70" rows="5" name="news">$text</textarea>
<p>
<input type="submit" value="Preview!" name="action">
</form>
EOF

    $form =~ s/\"$name\">/\"$name\" selected>/;
    print $form;
}

sub pagePreview{
    ($name, $text, $day, $string)=@_;
    
    # make an unescaped copy of the text
    $utext = $text;
    $utext =~ s/\%22/\"/g;

    print <<EOF;
This is what your news item will look like if you choose to submit it. If you want to make any changes click the "Lemme fix that" button, otherwise if you're happy press the "I'll have that!" button.
<p>
<div class="box">
<u>$day</u> (by $name)
<p>
$utext
</div>
<p>
<form method="post" action="news_add.pl">
<input type="hidden" name="entry" value="$string">
<input type="hidden" name="user" value="$name">
<input type="hidden" name="news" value="$text">
<input type="submit" value="Lemme fix that" name="action">
<input type="submit" value="I'll have that!" name="action">
</form>
EOF
}

#
# Print header...
#
print "Content-type: text/html\n\n";


#
# get the GET stuff :P
#

%in;

read(STDIN, $input, $ENV{'CONTENT_LENGTH'});

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
# Figure out what to do
#
$status = $in{"action"};


if ($status eq "Lemme fix that"){
    # output the form with previously entered text
    $user = $in{"user"};
    $news = $in{"news"};
    # text might have escaped quotes in it
    $news =~ s/\%22/\"/g;


    &pageTop("the SpaceMonkeys' news correcting page");

    &pageForm($user,$news);

    &pageBot;

}
elsif ($status eq "Preview!"){
    # generate a preview
    &pageTop("the SpaceMonkeys' news previewing page");

    $date = time();
    $user = $in{"user"};
    $news = $in{"news"};
    # news may not contain ¬ symbols!
    $news =~ s/¬//g;
    # must escape quotes so they don't mess up the html
    $news =~ s/\"/\%22/g;

    # make a frmatted copy of the date
    @gmt_out = gmtime($date);
    @months = ("January","February","March","April","May","June","July","August",
	       "September","October","November","December");
    $year = $gmt_out[5] + 1900;
    $dstring = $gmt_out[3].". ".$months[$gmt_out[4]]." ".$year;

    # prepare entry for news.txt
    $entry = $date."¬¬".$user."¬¬".$news;
    $entry =~ s/\n/ /g;
    $entry =~ s/\r//g;

    &pagePreview($user,$news,$dstring,$entry);

    &pageBot;

}
elsif ($status eq "I'll have that!"){
    # write news to disk
    # and inform user

    &pageTop("the SpaceMonkeys' news added page");

    $entry = $in{"entry"}."\n";
    # escaped quotes must be unescaped again!
    $entry =~ s/\%22/\"/g;

    #
    # Read in news
    #
    open FILE, "../../news.txt" || &errPrint("Could not open news file for reading!");
    @lines = <FILE>;
    close FILE;

    @all=($entry,@lines);

    open FILE, ">../../news.txt" || &errPrint("Could not open news file for writing");
    
    foreach $line (@all){
	print FILE $line;
    }

    close FILE;

    print "Your news item was successfully added!\n<p>\n<a href=\"../../\">Click here</a> to see your post on the front page!<p>Or <a href=\"../\">click here</a> to return to the internal resources page";

    &pageBot;

    
}
else{
    # no POST data!
    # just display a blank form
    &pageTop("the SpaceMonkeys' news adding page");

    &pageForm("","");

    &pageBot;
}

