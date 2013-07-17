<?php

require_once('../../inc/Page.php');
require_once('../../inc/SDTSiteNav.php');

$page = new Page('XHTML Structured Data Test Pages', SDTSiteNav::getSiteNav() );

$page->renderHeader( SDTSiteNav::NAV_FORMATS, true );

?>
			<ul>
				<li><a href="rdfa.html">XHTML+RDFa page (served as <code>text/html</code>)</a></li>
				<li><a href="rdfa-xml.html">XHTML+RDFa page (served as <code>application/xhtml+xml</code>)</a></li>
			</ul>
<?php

$page->renderFooter();

?>

