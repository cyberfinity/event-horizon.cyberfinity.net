<?php
	$this_file = __FILE__;
	$this_dir = preg_replace('/sitemap\.php$/','', $this_file);

	$mod_times[0] = filemtime( $this_file );
	$mod_times[1] = filemtime( $this_dir.'index.php' );
	$mod_times[2] = filemtime( $this_dir.'dirtydoodles/index.php' );
	$mod_times[3] = filemtime( $this_dir.'skull/index.php' );
	$mod_times[4] = filemtime( $this_dir.'midnightdoodles/index.php' );

	$sorted_times = $mod_times;
	sort( $sorted_times );
	$newest_time = array_pop( $sorted_times );

	// output XML
	header('Last-Modified: '.date( 'r', $newest_time ) );
	header('Content-Type: application/xml; charset=utf-8');
	print '<?xml version="1.0" encoding="UTF-8"?>'."\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc>http://event-horizon.twiddles.com/sites/arty/n76contest/</loc>
      <changefreq>daily</changefreq>
      <lastmod><?php print date('Y-m-d', $mod_times[1]); ?></lastmod>
      <priority>0.8</priority>
   </url>
   <url>
      <loc>http://event-horizon.twiddles.com/sites/arty/n76contest/dirtydoodles/</loc>
      <changefreq>daily</changefreq>
      <lastmod><?php print date('Y-m-d', $mod_times[2]); ?></lastmod>
      <priority>0.9</priority>
   </url>
   <url>
      <loc>http://event-horizon.twiddles.com/sites/arty/n76contest/skull/</loc>
      <changefreq>daily</changefreq>
      <lastmod><?php print date('Y-m-d', $mod_times[3]); ?></lastmod>
      <priority>0.7</priority>
   </url>
   <url>
      <loc>http://event-horizon.twiddles.com/sites/arty/n76contest/midnightdoodles/</loc>
      <changefreq>daily</changefreq>
      <lastmod><?php print date('Y-m-d', $mod_times[4]); ?></lastmod>
      <priority>0.7</priority>
   </url>
</urlset>