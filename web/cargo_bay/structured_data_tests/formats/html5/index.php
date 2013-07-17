<?php

require_once('../../inc/Page.php');
require_once('../../inc/SDTSiteNav.php');

$page = new Page('HTML5 Structured Data Test Pages', SDTSiteNav::getSiteNav() );

$page->renderHeader( SDTSiteNav::NAV_FORMATS, true );

?>
			<ul>
				<li><a href="rdfa.html">HTML5+RDFa page</a></li>
				<li><a href="microdata.html">HTML5 page with microdata</a></li>
			</ul>
<?php

$page->renderFooter();

?>