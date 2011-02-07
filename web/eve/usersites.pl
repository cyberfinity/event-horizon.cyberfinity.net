#!/usr/bin/perl

#
# Prints users names
# and makes the name a link if they have a
# public_html/index.html file available
#

chdir "/home/";

opendir HOMEDIR, ".";

@dirs = readdir HOMEDIR;

closedir HOMEDIR;

foreach $dir (sort @dirs){
    if (( -d $dir ) && ( $dir !~ /^\..*/ )){
	# it's a home dir
	if ( -r $dir."/public_html/" ){
	    # public_html dir is readable
	    opendir SITE, $dir."/public_html/";

	    @filez = readdir SITE;

	    closedir SITE;

	    if (( -f $dir."/public_html/index.html") || ( -f $dir."/public_html/index.php")) {
		print "<a href=\"http://event-horizon.kicks-ass.net/\~".$dir."/\">".$dir."</a><p>\n";
		
	    }
	    else{
		print $dir."<p>\n";
	    }

	}
    }
}



