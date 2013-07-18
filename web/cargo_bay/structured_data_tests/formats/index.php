<?php

require_once('../inc/Page.php');
require_once('../inc/SDTSiteNav.php');

$page = new Page('Format Tests', SDTSiteNav::getSiteNav() );

$page->renderHeader( SDTSiteNav::NAV_FORMATS, false );

?>
			<p>There are a variety of ways of expressing structured data in Web documents. Several <a href="http://www.cyberfinity.net/">Cyberfinity web pages</a> are using <a href="http://www.w3.org/TR/rdfa-in-html/">HTML5+RDFa</a> to do this. <a href="https://support.google.com/webmasters/answer/2650907">Google</a> and <a href="http://www.bing.com/webmaster/help/marking-up-your-site-with-structured-data-3a93e731">Bing</a> say they support RDFa. Unfortunately, at the time of writing (<time datetime="2013-07-12">12. July 2013</time>), both the <a href="https://www.google.com/webmasters/tools/">Google</a> and <a href="http://www.bing.com/toolbox/webmaster">Bing</a> web master tools are reporting that they cannot find structured data in those Cyberfinity pages.</p>
			<p>In order to get to the bottom of why this might be, this site has been set up. Structured data is published here in a variety of formats. They will then be inspected via search engine's respective webmaster tools to determine what, if anything, they are able to extract. The results will be published here later.</p>
			<h2>Test pages</h2>
			<p>The following test pages contain some structured data (using the <a href="http://schema.org/">schema.org</a> vocabulary) in a variety of formats:</p>
			<ul>
				<li><a href="html5/rdfa.html">HTML5+RDFa page</a></li>
				<li><a href="html5/microdata.html">HTML5 page with microdata</a></li>
				<li><a href="xhtml/rdfa.html">XHTML+RDFa page (served as <code>text/html</code>)</a></li>
				<li><a href="xhtml/rdfa-xml.html">XHTML+RDFa page (served as <code>application/xhtml+xml</code>)</a></li>
			</ul>
<?php

$page->renderFooter();

?>