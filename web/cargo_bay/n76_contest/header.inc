<?php
	define( ETC_DOMAIN,	'http://event-horizon.twiddles.com' );
	define( SITE_BASE_PATH, '/cargo_bay/n76_contest/' );

	class pageInfo{

		function pageInfo( $title, $short_name, $location = NULL, $class = NULL ){
			$this->title = $title;
			$this->short_name  = $short_name;
			$this->location = $location;
			$this->class = $class;
		}

		function getTitle(){
			return htmlspecialchars( $this->title, ENT_NOQUOTES );
		}

		function getShortName(){
			return htmlspecialchars( $this->short_name, ENT_NOQUOTES );
		}

		function getLocation(){
			return htmlspecialchars( SITE_BASE_PATH.$this->location, ENT_NOQUOTES );
		}

		function getClass(){
			return htmlspecialchars( $this->class, ENT_NOQUOTES );
		}

		var $title;
		var $short_name;
		var $location;
		var $class;
	}


	$pages = array(
		new pageInfo(
			'N-Series design entries',
			'Home'
		),
		new pageInfo(
			'Dirty Doodles N76 design',
			'Dirty Doodles',
			'dirtydoodles/',
			'dd'
		),
		new pageInfo(
			'Skull N76 design',
			'Skull',
			'skull/',
			'sk'
		),
		new pageInfo(
			'Midnight Doodles N76 design',
			'Midnight Doodles',
			'midnightdoodles/',
			'md'
		)
	);

	$pageIndex;
	if( ! isset( $pageIndex ) ){
		$pageIndex = 0;
	}


	// print "share this page" links
	function shareLinks(){
		global $pages, $pageIndex;
		
		print '<ul class="linklove">';

		// Facebook
		print '<li class="facebook"><a href="http://www.facebook.com/share.php?u='.urlencode( ETC_DOMAIN.$pages[ $pageIndex ]->getLocation() ).'&amp;t='.urlencode( $pages[ $pageIndex ]->getTitle() ).'">Share on Facebook</a></li>';

		// Digg
		print '<li class="digg"><a href="http://digg.com/submit?phase=2&url='.urlencode( ETC_DOMAIN.$pages[ $pageIndex ]->getLocation() ).'&amp;title='.urlencode( $pages[ $pageIndex ]->getTitle() ).'&amp;bodytext='.urlencode( 'Nokia N76 cover design by Ha Yun Park for the N-Series "Your Talent" competition.' ).'&topic=design">Digg this</a></li>';

		// Stumble Upon
		print '<li class="stumbleupon"><a href="http://www.stumbleupon.com/submit?url='.urlencode( ETC_DOMAIN.$pages[ $pageIndex ]->getLocation() ).'&amp;title='.urlencode( $pages[ $pageIndex ]->getTitle() ).'">Stumble it</a></li>';

		// Del.icio.us
		print '<li class="delicious"><a href="http://del.icio.us/post?url='.urlencode( ETC_DOMAIN.$pages[ $pageIndex ]->getLocation() ).'&amp;title='.urlencode( $pages[ $pageIndex ]->getTitle() ).'">Save to Del.icio.us</a></li>';

		// Furl
		print '<li class="furl"><a href="http://furl.net/storeIt.jsp?u='.urlencode( ETC_DOMAIN.$pages[ $pageIndex ]->getLocation() ).'&amp;t='.urlencode( $pages[ $pageIndex ]->getTitle() ).'">Furl it</a></li>';

		// Reddit
		print '<li class="reddit"><a href="http://reddit.com/submit?url='.urlencode( ETC_DOMAIN.$pages[ $pageIndex ]->getLocation() ).'&amp;title='.urlencode( $pages[ $pageIndex ]->getTitle() ).'">Reddit</a></li>';

		// Blinklist
		print '<li class="blinklist"><a href="http://blinklist.com/index.php?Action=Blink/addblink.php&amp;Url='.urlencode( ETC_DOMAIN.$pages[ $pageIndex ]->getLocation() ).'&amp;Title='.urlencode( $pages[ $pageIndex ]->getTitle() ).'&amp;Description='.urlencode( 'Nokia N76 cover design by Ha Yun Park for the N-Series "Your Talent" competition.' ).'">Blink it</a></li>';

		print '</ul>'."\n";
	}


	// print top of page
	// HTTP header
	if( !isset( $omitHTTPHeader ) || !$omitHTTPHeader ){
		if( isset( $pageFile ) ){
			header('Last-Modified: '.date( 'r', filemtime( $pageFile ) ) );
		}
		header('Content-type: text/html; charset=utf-8');
	}
	print '<?xml version="1.0" encoding="utf-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title><?php print $pages[ $pageIndex ]->getTitle(); ?></title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php print SITE_BASE_PATH; ?>style/screen.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="/style/sidebar.css" />
		<link rel="shortcut icon" href="<?php print SITE_BASE_PATH; ?>favicon.ico" type="image/x-icon"/>
	</head>
	<body<?php
	$class = $pages[ $pageIndex ]->getClass();
	if( !empty( $class ) ){
		print ' class="'.$class.'"';
	}
?>>
		<div id="header">
			<h1><span><?php print $pages[ $pageIndex ]->getTitle()."</span></h1>
			<ul>
";

	// print navbar
	for( $i = 0; $i < count( $pages ); ++$i ){
		if( $i == $pageIndex ){
			print '				<li><span>'.$pages[$i]->getShortName().'</span></li>'."\n";
		}
		else{
			$class_param;
			$class = $pages[ $i ]->getClass();
			if( !empty( $class ) ){
				$class_param = ' class="'.$class.'"';
			}
			print '				<li><a href="'.$pages[$i]->getLocation().'"'.$class_param.'>'.$pages[$i]->getShortName().'</a></li>'."\n";
		}
	}

?>
			</ul>
		</div>