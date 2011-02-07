#!/usr/bin/perl

# read in files to process

open FILE, "code_files" || die $!;

@lines = <FILE>;

close FILE;

$filez = "";

foreach $line (@lines){
    # remove new-line
    chomp $line;

    $filez .= " ".$line;
}

# http header

print "Content-type: text/html\n\n";

# run javadoc with correct args

$output = `/usr/java/bin/javadoc -private -d ../code_dox/ -stylesheetfile style/code_dox.css -nodeprecatedlist -windowtitle "the SpaceMonkeys' Java Code Documentation" -bottom "<a href=\"../\" target=\"_parent\">Back to SpaceMonkey resources</a>" $filez 2>&1`;

# format output for HTML

$output =~ s/\n/\<br\>\n/g;

# output it!

print $output;



