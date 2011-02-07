#!/usr/bin/perl

use DBI;
use CGI;
#
# outputs latest 3 news items
#

$query = new CGI;
print $query->header();


# connect to DB
$db = DBI->connect("DBI:Pg:dbname=ganesha","display",")uY.8tG");

# how many pages in total?
$resultsPerPage = 5;

$result = $db->prepare("SELECT count(*) FROM screenshots;");
$result->execute();

$rows;
$result->bind_columns(\$rows);
$result->fetch();

# how many pages are there in total?
$fract = $rows / $resultsPerPage ;

$pages = int($fract);
if ( ($fract - $pages) > 0 ){
    $pages++;
}


# assume this is the first page
$start = 0;

$page = $query->param('page');
# was a valid page given?
if ( ( $page ) && ($page > 0) && ($page <= $pages) ){

    $start += ( ( $page - 1 ) * $resultsPerPage );

}
else{
    # default to first page
    $page = 1;
}

# no next link on last page
$nextURL;
unless( $page == $pages ){
    $nextURL = "./?page=".($page+1);
}
# previous link on first page points to current news
$prevURL;

if ($page == 2){
    $prevURL = "./";
}
elsif ($page > 2 ){
    $prevURL = "./?page=".($page-1);
}


print <<EOF;
<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Ganesha project screenshots (Page $page of $pages)</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<meta name="description" content="Screenshots of Ganesha - a simple RDF/XML editor." />
<meta name="keywords" content="screenshot, picture, grab, ganesha, gui, interface, appearance, skin, look, rdf, xml" />
<meta name="robots" content="follow, index" />
<link rel="shortcut icon" href="/uni/ganesha/ganesha.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/uni/ganesha/icon16.png" type="image/png" />
EOF
   
if ( $page != $pages ){
     print "<link rel=\"last\" href=\"./?page=".$pages."\" title=\"Last page\" />\n"
}
if ( $page != 1 ){
     print "<link rel=\"first\" href=\"./\" title=\"First page\" />\n"
}

if( $nextURL ){
    print "<link rel=\"next\" href=\"$nextURL\" title=\"Older screenshots (Page ".($page+1).")\" />";
}
if( $prevURL ){
    print "<link rel=\"prev\" href=\"$prevURL\" title=\"More recent screenshots (Page ".($page-1).")\" />";
}

print <<EOF;
<link rel="stylesheet" href="/uni/ganesha/style.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="/uni/ganesha/style-mob.css" type="text/css" media="handheld" />
<script src="/uni/ganesha/fix.js" type="text/javascript"></script>
</head>
<body>
<div class="mob">
<h1>Screenshots</h1>
</div>
<hr class="hide" />
<div class="nav">

<img src="/uni/ganesha/banner.png" width="545" height="80" alt="Ganesha - the RDF/XML editor" id="banner" /><br />
<a href="/uni/ganesha/"><img src="/uni/ganesha/home.gif" width="95" height="26" alt="[Home]" id="home" /></a><br />
<a href="/uni/ganesha/news/"><img src="/uni/ganesha/news.gif" width="95" height="40" alt="[News]" id="news" /></a><br />
EOF

if( $page >= 2 ){
    print "<a href=\"/uni/ganesha/screenshots/\"><img src=\"/uni/ganesha/shots_hi.png\" width=\"95\" height=\"40\" alt=\"[Screenshots]\" id=\"shots\" /></a><br />\n";
}
else{
    print "<img src=\"/uni/ganesha/shots_hi.png\" width=\"95\" height=\"40\" alt=\"[Screenshots]\" id=\"shots\" /><br />\n";
}

print <<EOF;
<a href="/uni/ganesha/docs/"><img src="/uni/ganesha/docs.gif" width="95" height="40" alt="[Docs]" id="docs" /></a><br />
<a href="/uni/ganesha/download/"><img src="/uni/ganesha/get_it.gif" width="95" height="40" alt="[Download]" id="get" /></a>

</div>
<hr class="hide" />
<div class="side" id="logo">
<img src="/uni/ganesha/ganesha_logo.png" width="90" height="130" alt="[Ganesha logo]" />
</div>
<div class="side" id="subsections">
<p>Navigation:</p>
<ul>
EOF

if( $nextURL ){
    print "<li><a href=\"$nextURL\">Next page</a></li>";
}
if( $prevURL ){
    print "<li><a href=\"$prevURL\">Previous page</a></li>";
}

print <<EOF;
</ul>
</div>
<hr class="hide" />
EOF

$result = $db->prepare("SELECT file, title, width, height, description, to_char(date, 'FMDD. FMMonth FMYYYY'), thumb, t_width, t_height  FROM screenshots ORDER BY date DESC LIMIT $resultsPerPage OFFSET $start;");
$result->execute();

local( $file, $title, $width, $height, $description, $date, $thumb, $t_width, $t_height);
$result->bind_columns(\$file, \$title, \$width, \$height, \$description, \$date, \$thumb, \$t_width, \$t_height);



# print each news item!
while( $result->fetch() ){

    print "<div class=\"box\">\n";
    print "<h2>$title</h2>\n";
    print "<p><a href=\"$file\"><img src=\"$thumb\" width=\"$t_width\" height=\"$t_height\" alt=\"View full-size version\" class=\"inleft\" /></a></p>\n";
    print "<p><strong>Size</strong>: $width x $height pixels</p>\n";
    print "<p><strong>Added on</strong>: $date</p>\n"; 
    print "<p><strong>Description</strong>: $description</p>\n";   
    print "</div>";

}

$db->disconnect();

#print footer

print <<EOF;
<div class="footer">
<a href="http://validator.w3.org/check/referer"><img src="/uni/ganesha/w3html.png" width="88" height="31" alt="[Valid XHTML]" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="/uni/ganesha/w3css.png" width="88" height="31" alt="[Valid CSS]" /></a>
<a href="http://creativecommons.org/licenses/by-nc-sa/1.0/"><img src="/uni/ganesha/somerights.png" width="88" height="31" alt="[Some rights reserved]" /></a>
<p>This page is &copy; 2004 <a href="http://cirrus.twiddles.com/">James Nash</a>, <a href="http://creativecommons.org/licenses/by-nc-sa/1.0/">some rights reserved</a>.</p>
</div>
</body>
</html>
EOF
