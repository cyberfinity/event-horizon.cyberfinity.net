<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>CSS 3 multiple background test</title>
		<link rel="stylesheet" href="screen.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" media="screen" href="/style/sidebar.css" />
	</head>
	<body>
		<h1><acronym title="Cascading Style Sheets">CSS</acronym>3 multiple background test</h1>
		<div id="content">
			<p>Like many web-designers I've often wished I could assign multiple backgrounds to a single (<abbr title="eXtensible">X</abbr>)<acronym title="HyperText Markup Language">HTML</acronym> element using <acronym title="Cascading Style Sheets">CSS</acronym> to create effects like drop shadows or rounded boxes. But alas <acronym title="Cascading Style Sheets">CSS</acronym>1 and 2 only permit each element to have at most one background image.</p>
			<p>So far the best way to achieve such effects is to layer elements on top of each other and giving each one part of the combined background. For example, to create a box with rounded corners you could use 4 corner images (one for each corner), create 4 nested elements and assign one of the images as a background in the corresponding corner to each. Unfortunately this approach usually bloats the <acronym title="HyperText Markup Language">HTML</acronym> with superfluous and semantically meaningless elements.</p>
			<p>Luckily, the current draft specification for the <a href="http://www.w3.org/TR/2005/WD-css3-background-20050216/"><acronym title="Cascading Style Sheets">CSS</acronym>3 Backgrounds and Borders Module</a> includes support for multiple, layered background images on a single element! But wait! It get's better still: Beginning with version 1.3, <a href="http://www.apple.com/macosx/features/safari/">Apple's Safari web-browser</a> added support for this feature (See the <a href="http://webkit.opendarwin.org/blog/?p=15">Safari <acronym title="Cascading Style Sheets">CSS</acronym>3 multiple background support announcement</a>). Other browsers now also support <acronym title="Cascading Style Sheets">CSS</acronym>3 multiple backgronds: <a href="http://www.konqueror.org/">Konqueror >= 3.5</a>, <a href="http://www.omnigroup.com/applications/omniweb/">OmniWeb >= 5.5</a>, <a href="http://www.s60.com/business/productinfo/builtinapplications/webrowser">Nokia's S60 Browser (included in S60 3rd edition and up)</a> and <a href="http://www.apple.com/iphone/internet/">Safari on the Apple iPhone</a>.</p>
			<p>When support in Safari was first announced I just <em>had</em> to try this new feature out! I did this by defining a <acronym title="Cascading Style Sheets">CSS</acronym> class called <code>box</code> which creates a box with rounded corners <em>and</em> a drop shadow (so that it looks like it's been cut out of the page). It uses 6 backgrounds - one each for the four corners and two more to create drop shadows along the top and left sides. This is the <acronym title="Cascading Style Sheets">CSS</acronym> code:</p>
			<pre><code class="selector">.box</code> {
  <code class="comment">/*
   * Multiple background magic!
   * The order in which images are listed also defines
   * their stacking - earlier images are drawn on top of
   * later ones.
   */</code>
  <code class="property">background-color</code>: <code class="value">#e2e2e2</code>;

  <code class="property">background-image</code>: <code class="value">url(<code class="string">"box-tl"</code>)</code>, <code class="value">url(<code class="string">"box-tr"</code>)</code>,
                    <code class="value">url(<code class="string">"box-bl"</code>)</code>, <code class="value">url(<code class="string">"box-br"</code>)</code>,
                    <code class="value">url(<code class="string">"box-left"</code>)</code>, <code class="value">url(<code class="string">"box-top"</code>)</code>;

  <code class="property">background-repeat</code>: <code class="value">no-repeat</code>, <code class="value">no-repeat</code>,
                     <code class="value">no-repeat</code>, <code class="value">no-repeat</code>,
                     <code class="value">repeat-y</code>, <code class="value">repeat-x</code>;

  <code class="property">background-position</code>: <code class="value">top left</code>, <code class="value">top right</code>,
                       <code class="value">bottom left</code>, <code class="value">bottom right</code>,
                       <code class="value">left</code>, <code class="value">top</code>;

  <code class="comment">/*
   * Ensure a minimum height and width so that the corner
   * images never overlap
   */</code>
  <code class="property">margin</code>: <code class="value">0 0 1em 0</code>;
  <code class="property">padding</code>: <code class="value">10px</code>;
  <code class="property">min-height</code>: <code class="value">16px</code>;
  <code class="property">min-width</code>: <code class="value">16px</code>;
}</pre>

			<p>This is the final result when the above class is aplied to a paragraph:</p>
		
			<p class="box">This text should appear in a box with rounded corners and a drop shadow.</p>

			<p>Remember that this only works in the browsers mentioned above. In other browsers you will either see the text with no background or just a plain grey background. Here's a screenshot of what it's <em>supposed</em> to look like:</p>

			<div class="screenshot">
				<img src="css3-box-screenshot.png" width="412" height="92" alt="Screenshot of rounded box effect using CSS3 backgrounds" />
			</div>

			<p>As you can see it works like a charm! Fancy effects like this can now be achieved without sacrificing markup semantics or accessibility and with virtually no page bloat! Big thanks to <acronym title="Cascading Style Sheets">CSS</acronym>3 and the browser makers who have implemented this!</p>
			<p>As a bonus here's this page as rendered on the S60 browser (using a <a href="http://www.forum.nokia.com/devices/N80">Nokia N80</a>) and on the iPhone:</p>

			<div class="screenshots">
			<a href="s60.jpg" title="click to enlarge"><img src="s60thumb.jpg" alt="[Screenshot of S60 browser rendering this page]" /></a> <a href="iphone.jpg" title="click to enlarge"><img src="iphonethumb.jpg" alt="[Screenshot of Safari on the iPhone rendering this page]" /></a>
			</div>

			<p class="clear">I sincerely hope this feature remains intact in the final <acronym title="Cascading Style Sheets">CSS</acronym>3 specification and is quickly implemented in other web-browsers. Mozilla foundation, Opera and Microsoft - I'm looking at you!</p>

			<p>Until then here's some more demo pages others have put together to keep you amused:</p>
			<ul>
				<li><a href="http://petertoh.com/images/multi-bk.html">Purple picture frame</a> by Dan Bedford</li>
				<li><a href="http://decaffeinated.org/archives/projects/multibg/background-image.html">Mac <acronym title="Operating System">OS</acronym> X icons</a> by <a href="http://decaffeinated.org/">Chris Clark</a></li>
				<li><a href="http://amonre.org/pub/multiplebackgrounds/">Kaleidoscope Window</a> by <a href="http://amonre.org/">Denis Defreyne</a></li>
				<li><a href="http://group.mind-productions.com/articles/multiple_backgrounds__css3_/">Multiple Backgrounds (<acronym title="Cascading Style Sheets">CSS</acronym>3)</a> by <a href="http://group.mind-productions.com/members/individuals/Justin+Halsall/">Justin Halsall</a></li>
			</ul>

		</div>
		<?php
			require('sidebar.inc');
		?>
		<div id="footer">
			<p>&copy; 2005<?php $current_year = date('Y'); if( $current_year > 2005 ){ print( " - ".date('Y') ); } ?> <a href="http://cirrus.twiddles.com/">James Nash</a>.</p>
			<p>This site is a member of the <a href="http://www.twiddles.com/">Twiddles Network</a>.</p>
		</div>
	</body>
</html>