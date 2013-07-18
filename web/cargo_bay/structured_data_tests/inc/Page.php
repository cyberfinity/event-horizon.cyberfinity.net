<?php

require_once( 'SiteNav.php' );

class Page {
	
	private $title;
	private $siteNav;
	private $isXhtml;
	
	public function __construct( $title, SiteNav $siteNav, $isXhtml = false ){
		$this->title = trim( strval( $title ) );
		$this->siteNav = $siteNav;
		$this->isXhtml = $isXhtml;
	}
	
	
	public function renderHeader( $navIndex, $isChild, $customH1 = -1 ){
	
		if( $customH1 === -1 ){
			$customH1 = '<h1>'.$this->title.'</h1>';
		}
		
		if( $this->isXhtml ){
			// output XHTML
			print <<<EOF
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.1//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-2.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" prefix="schema: http://schema.org/">
	<head>
		<title>{$this->title}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<div id="header">
			{$customH1}

EOF;
		}
		else{
			// output HTML5
			print <<<EOF
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{$this->title}</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<header>
			{$customH1}

EOF;
		}
		
		$this->siteNav->render( $navIndex, $isChild, "\t\t\t", $this->isXhtml );
		
		if( $this->isXhtml ){
			// output XHTML
			print <<<EOF
		</div>
		<div id="main">

EOF;
		}
		else{
			// output HTML5
			print <<<EOF
		</header>
		<main>

EOF;
		}

	}
	
	
	public function renderFooter(){
		
		if( $this->isXhtml ){
			// output XHTML
			print <<<EOF
		</div>
		<div id="footer">
			<p>&#169; 2013 <a href="http://cirrus.twiddles.com/">James Nash</a>.</p>
			<p>Floating through cyberspace aboard the <a href="/">Event-Horizon</a>.</p>
		</div>
	</body>
</html>

EOF;
		}
		else{
			// output HTML5
			
			print <<<EOF
		</main>
		<footer>
			<p>&copy; <time datetime="2003">2013</time> <a href="http://cirrus.twiddles.com/">James Nash</a>.</p>
			<p>Floating through cyberspace aboard the <a href="/">Event-Horizon</a>.</p>
		</footer>
	</body>
</html>

EOF;
		}
		
		
	}
	
	
}


?>