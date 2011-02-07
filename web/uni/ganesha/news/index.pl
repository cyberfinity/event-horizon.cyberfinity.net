#!/usr/bin/perl

use DBI;
use CGI;
#
# outputs latest 3 news items
#

$query = new CGI;
print $query->header();

print <<EOF;
<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Latest Ganesha project news</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<meta name="description" content="News about the Ganesha project - a simple to use RDF/XML editor." />
<meta name="keywords" content="news, updates, events, project, progress, rdf, xml, ganesha, w3c, semantic web, dublin core, dc, meta data, resource description framework" />
<meta name="robots" content="follow, index" />
<link rel="shortcut icon" href="/uni/ganesha/ganesha.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/uni/ganesha/icon16.png" type="image/png" />
<link rel="next" href="old/" title="Older news" />
<link rel="stylesheet" href="/uni/ganesha/style.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="/uni/ganesha/style-mob.css" type="text/css" media="handheld" />
<script src="/uni/ganesha/fix.js" type="text/javascript"></script>
</head>
<body>
<div class="mob">
<h1>Latest news</h1>
</div>
<hr class="hide" />
<div class="nav">
<img src="/uni/ganesha/banner.png" width="545" height="80" alt="Ganesha - the RDF/XML editor" id="banner" /><br />
<a href="/uni/ganesha/"><img src="/uni/ganesha/home.gif" width="95" height="26" alt="[Home]" id="home" /></a><br />
<img src="/uni/ganesha/news_hi.png" width="95" height="40" alt="[News]" id="news" /><br />
<a href="/uni/ganesha/screenshots/"><img src="/uni/ganesha/shots.gif" width="95" height="40" alt="[Screenshots]" id="shots" /></a><br />
<a href="/uni/ganesha/docs/"><img src="/uni/ganesha/docs.gif" width="95" height="40" alt="[Docs]" id="docs" /></a><br />
<a href="/uni/ganesha/download/"><img src="/uni/ganesha/get_it.gif" width="95" height="40" alt="[Download]" id="get" /></a>
</div>
<hr class="hide" />
<div class="side" id="logo">
<img src="/uni/ganesha/ganesha_logo.png" width="90" height="130" alt="[Ganesha logo]" />
</div>
<div class="side" id="subsections">
<p>Subsections:</p>
<ul>
<li class="selected">Latest news</li>
<li><a href="old/">Old news</a></li>
</ul>
</div>
<hr class="hide" />
EOF


$db = DBI->connect("DBI:Pg:dbname=ganesha","display",")uY.8tG");

$start = 0;

$resultsPerPage = 3;

$result = $db->prepare("SELECT to_char(time, 'FMDD. FMMonth FMYYYY'), item FROM news ORDER BY time DESC LIMIT $resultsPerPage OFFSET $start;");
$result->execute();

$time;
$item;
$result->bind_columns(\$time, \$item);


$month;
$year;
$day;

# print each news item!
while( $result->fetch() ){

    print "<div class=\"box\">\n";
    print "<h2>".$time."</h2>\n";
    print $item."\n";
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
