<?php

require_once('../../inc/Page.php');
require_once('../../inc/SDTSiteNav.php');

$page = new Page('HTML5 page with microdata (without item IDs)', SDTSiteNav::getSiteNav() );

$page->renderHeader( SDTSiteNav::NAV_FORMATS, true );

?>
			<p>This page is part of a <a href="../">suite of test pages</a> designed to find out how well various structured data formats are supported by major search engines.</p>
	
			<h2>Data</h2>
			<p>The following sections have been marked up with structured data that search engines and other tools should be able to extract:</p>
			
			<div itemscope itemtype="http://schema.org/Organization">
				<h3 itemprop="name">Cyberfinity</h3>
				<img itemprop="logo" src="<?php print SDTSiteNav::SITE_ROOT; ?>/cyberfinity-logo.png" alt="Cyberfinity logo" />
				<p itemprop="description"><a itemprop="url" href="http://www.cyberfinity.net/">Cyberfinity</a> is a collection of websites produced and maintained by <span itemprop="member" itemscope itemtype="http://schema.org/Person"><a itemprop="url" href="http://cirrus.twiddles.com/"><span itemprop="name">James Nash</span></a></span> and his friends.</p>
			</div>
			
			<div itemscope itemtype="http://schema.org/Person">
				<h3 itemprop="name">Burpman</h3>
				<img itemprop="image" src="<?php print SDTSiteNav::SITE_ROOT; ?>/burpman.jpg" alt="Picture of the Burpman" />
				<p itemprop="description"><span itemprop="givenName">Burpman</span> <span itemprop="familyName">Burp</span> is a fictional character from the <span itemprop="affiliation" itemscope itemtype="http://schema.org/Organization"><a itemprop="url" href="http://burpmancorp.cyberfinity.net/"><span itemprop="name">BCP</span></a></span> universe. He's an alien from the planet Burpland. His best friend is a character called <span itemprop="knows" itemscope itemtype="http://schema.org/Person"><span itemprop="name">Splogintop</span></span>.</p>
			</div>
<?php

$page->renderFooter();

?>