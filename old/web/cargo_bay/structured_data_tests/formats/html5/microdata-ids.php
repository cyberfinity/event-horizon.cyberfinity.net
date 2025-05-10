<?php

require_once('../../inc/Page.php');
require_once('../../inc/SDTSiteNav.php');

$page = new Page('HTML5 page with microdata (using item IDs)', SDTSiteNav::getSiteNav() );

$page->renderHeader( SDTSiteNav::NAV_FORMATS, true );

?>
			<p>This page is part of a <a href="../">suite of test pages</a> designed to find out how well various structured data formats are supported by major search engines.</p>
	
			<h2>Technical details</h2>
			<p>This page has contains items marked up with structured data using the <a href="http://www.w3.org/html/wg/drafts/microdata/master/">HTML5 microdata</a> syntax and the <a href="http://schema.org/">schema.org</a> vocabulary. The code on this page is <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fevent-horizon.cyberfinity.net%2Fcargo_bay%2Fstructured_data_tests%2Fformats%2Fhtml5%2Fmicrodata-ids.html">valid HTML5</a> and the microdata has been <a href="http://www.google.com/webmasters/tools/richsnippets?q=http%3A%2F%2Fevent-horizon.cyberfinity.net%2Fcargo_bay%2Fstructured_data_tests%2Fformats%2Fhtml5%2Fmicrodata-ids.html">checked using Google's Structured Data Testing Tool</a>.</p>
			<p>The <a href="http://www.w3.org/html/wg/drafts/microdata/master/#items">microdata spec</a> states that a global identifier via the <code>itemid</code> attribute <q cite="http://www.w3.org/html/wg/drafts/microdata/master/#items">must not be specified on elements [...] whose itemtype attribute specifies a vocabulary that does not support global identifiers</q>. Unfortunately, the current schema.org documentation <a href="http://www.w3.org/2011/webschema/track/issues/6">does not make it clear whether items can or should use global identifiers</a>. However, on a <a href="https://groups.google.com/forum/#!msg/schemaorg-discussion/YhF2cNGHVZ4/MmLVghR_MfMJ">schema.org discussion group</a> a Google employee has stated that they <q cite="https://groups.google.com/forum/#!msg/schemaorg-discussion/YhF2cNGHVZ4/MmLVghR_MfMJ">strongly encourage the use of itemids</q>. Therefore, as an experiment, two versions of this page have been created. This one, which uses <code>itemid</code> attributes with URIs as global identifiers, and an <a href="microdata.html">alternative microdata test page</a> that does not use <code>itemid</code> attributes.</p>
			<p>Note that the URIs used to identify the items on this page are the same URIs used to identify the corresponding RDF resources on the <a href="rdfa.html">RDFa test page</a>. Interestingly, when used on this page, the <a href="http://www.w3.org/2012/pyMicrodata/">W3's Microdata to RDF Distiller</a> appears to use the <code>itemid</code> URIs as the corresponding resource IDs in the distilled RDF.</p>
	
	
			<h2>Data</h2>
			<p>The following sections have been marked up with structured data that search engines and other tools should be able to extract:</p>
			
			<div itemscope itemtype="http://schema.org/Organization" itemid="http://meatspace.cyberfinity.net/uri/cyberfinity">
				<h3 itemprop="name">Cyberfinity</h3>
				<img itemprop="logo" src="<?php print SDTSiteNav::SITE_ROOT; ?>/cyberfinity-logo.png" alt="Cyberfinity logo" />
				<p itemprop="description"><a itemprop="url" href="http://www.cyberfinity.net/">Cyberfinity</a> is a collection of websites produced and maintained by <span itemprop="member" itemscope itemtype="http://schema.org/Person" itemid="http://meatspace.twiddles.com/uri/james_nash"><a itemprop="url" href="https://cirrus.twiddles.com/"><span itemprop="name">James Nash</span></a></span> and his friends.</p>
			</div>
			
			<div itemscope itemtype="http://schema.org/Person" itemid="http://meatspace.cyberfinity.net/uri/burpman">
				<h3 itemprop="name">Burpman</h3>
				<img itemprop="image" src="<?php print SDTSiteNav::SITE_ROOT; ?>/burpman.jpg" alt="Picture of the Burpman" />
				<p itemprop="description"><span itemprop="givenName">Burpman</span> <span itemprop="familyName">Burp</span> is a fictional character from the <span itemprop="affiliation" itemscope itemtype="http://schema.org/Organization"><a itemprop="url" href="http://burpmancorp.cyberfinity.net/"><span itemprop="name">BCP</span></a></span> universe. He's an alien from the planet Burpland. His best friend is a character called <span itemprop="knows" itemscope itemtype="http://schema.org/Person" itemid="http://meatspace.cyberfinity.net/uri/splogintop"><span itemprop="name">Splogintop</span></span>.</p>
			</div>
<?php

$page->renderFooter();

?>