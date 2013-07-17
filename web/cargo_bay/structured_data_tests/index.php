<?php

require_once('inc/Page.php');
require_once('inc/SDTSiteNav.php');

$page = new Page('Structured Data Tests', SDTSiteNav::getSiteNav() );

$page->renderHeader( SDTSiteNav::NAV_HOME, false );

?>
			<p>A collection of test pages using structured data with a variety of formats and vocabularies.</p>
<?php

$page->renderFooter();

?>