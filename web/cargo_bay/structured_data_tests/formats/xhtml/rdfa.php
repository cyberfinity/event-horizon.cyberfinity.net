<?php

require_once('../../inc/Page.php');
require_once('../../inc/SDTSiteNav.php');

$page = new Page('XHTML+RDFa page', SDTSiteNav::getSiteNav(), true );

$page->renderHeader( SDTSiteNav::NAV_FORMATS, true );

?>
			<p>This page is part of a <a href="../">suite of test pages</a> designed to find out how well various structured data formats are supported by major search engines.</p>
	
			<h2>Data</h2>
			<p>The following sections have been marked up with structured data that search engines and other tools should be able to extract:</p>
			
			<div resource="http://meatspace.cyberfinity.net/uri/cyberfinity" typeof="schema:Organization">
				<h3 property="schema:name">Cyberfinity</h3>
				<img property="schema:logo" src="<?php print SDTSiteNav::SITE_ROOT; ?>/cyberfinity-logo.png" alt="Cyberfinity logo" />
				<p property="schema:description"><a property="schema:url" href="http://www.cyberfinity.net/">Cyberfinity</a> is a collection of websites produced and maintained by <span property="schema:member" resource="http://meatspace.twiddles.com/uri/james_nash" typeof="schema:Person"><a property="schema:url" href="http://cirrus.twiddles.com/"><span property="schema:name">James Nash</span></a></span> and his friends.</p>
			</div>
			
			<div resource="http://meatspace.cyberfinity.net/uri/burpman" typeof="schema:Person">
				<h3 property="schema:name">Burpman</h3>
				<img property="schema:image" src="<?php print SDTSiteNav::SITE_ROOT; ?>/burpman.jpg" alt="Picture of the Burpman" />
				<p property="schema:description"><span property="schema:givenName">Burpman</span> <span property="schema:familyName">Burp</span> is a fictional character from the <span property="schema:affiliation" resource="http://meatspace.twiddles.com/uri/bcp" typeof="schema:Organization"><a property="schema:url" href="http://burpmancorp.cyberfinity.net/"><span property="schema:name">BCP</span></a></span> universe. He's an alien from the planet Burpland. His best friend is a character called <span property="schema:knows" resource="http://meatspace.cyberfinity.net/uri/splogintop" typeof="schema:Person"><span property="schema:name">Splogintop</span></span>.</p>
			</div>
<?php

$page->renderFooter();

?>