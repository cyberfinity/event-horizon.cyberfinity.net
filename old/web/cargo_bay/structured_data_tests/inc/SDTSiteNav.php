<?php

require_once('SiteNav.php');

class SDTSiteNav {
	
	const NAV_NONE = -1;
	const NAV_HOME = 0;
	const NAV_FORMATS = 1;
	
	const SITE_ROOT = 'http://event-horizon.cyberfinity.net/cargo_bay/structured_data_tests';
	
	private static $self;
	
	private $siteNav;
	
	private function __construct(){
		$this->siteNav = new SiteNav();
		
		// Add links
		$this->siteNav->addLink( SDTSiteNav::SITE_ROOT.'/', 'Home' );
		$this->siteNav->addLink( SDTSiteNav::SITE_ROOT.'/formats/', 'Format Tests' );
	}
	
	private static function getSelf(){
		if( ! isset( SDTSiteNav::$self ) ){
			SDTSiteNav::$self = new SDTSiteNav();
		}
		
		return SDTSiteNav::$self;
	}
	
	public static function getSiteNav(){
		return SDTSiteNav::getSelf()->siteNav;
	}
	
	
}




?>