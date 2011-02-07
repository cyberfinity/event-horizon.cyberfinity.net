#!/usr/bin/perl
#
#
# Script to sort a list of books for my mum

$location =  "./";

$input = "buecherliste.txt";

open FILE, $input;

@lines = <FILE>;

close FILE;

$delimiter=" ¬ ";

@cols=("Nachname","Vorname","Titel","hardback / paperback","Sprache","Anmerkung");

#
# get the GET stuff :P
#

%in;

# default value
$in{"sort"}=0;

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

# column which is used for sorting
$sortby=$in{"sort"};



foreach $line (@lines){
    # ignore comment lines
    unless ( $line=~/^\#/ ){

	chomp $line;

	# move desired element to front

	@cells = split(/$delimiter/, $line);

	$temp = splice @cells, $sortby, 1;

	@cells = ($temp, @cells);

	$line = join($delimiter, @cells);

    }
}

# make html header
print "Content-type: text/html\n\n";


# make table header
print "<table><tr>";

for ($colcount=0; $colcount < @cols; $colcount++){
    print "<th><a href=\"$location?sort=$colcount\">".$cols[$colcount]."</a></th>";
}


print "</tr>\n";

# sort the list and output rows
foreach $line (sort @lines){
    # ignore comment lines
    unless ( $line=~/^\#/ ){
	
	# move front element back to its original position
	    
	@cells = split(/$delimiter/, $line);
	
	$temp = shift @cells;

	splice @cells, $sortby, 1, $temp, $cells[$sortby];


	# output table row

	print "<tr>";
	for ($colcount=0; $colcount < @cols; $colcount++){
	    if ( $colcount < @cells ){
		if ( $colcount == $sortby ){
		    print "<td class=\"blue\">";
		}
		else{
		    print "<td>";
		}
		print $cells[$colcount]."</td>";
	    }
	    else{
		print "<td></td>";
	    }
	}
	print "</tr>\n";

       

    }
}

print "</table>\n";
