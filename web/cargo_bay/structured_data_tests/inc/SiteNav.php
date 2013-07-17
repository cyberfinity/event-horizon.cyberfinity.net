<?php

require_once('NavLink.php');

class SiteNav {
	
	private $links;
	
	public function __construct(){
		$this->links = array();
	}
	
	public function addLink( $path, $label ){
		$this->links[] = new NavLink( $path, $label );
	}
	
	public function render( $navIndex, $isChild, $indent, $asXhtml = false ){
		if( $asXhtml ){
			// output XHTML
			print $indent."<div id=\"nav\">\n";
		}
		else{
			// output HTML5
			print $indent."<nav>\n";
		}
		print $indent."\t<ul>\n";
	
		for( $i = 0; $i < count( $this->links ); ++$i ){
			
			print $indent."\t\t<li>";
			
			if( $i == $navIndex ){
				if( $isChild ){
					print $this->links[ $i ]->getHtml( true, true ); // active link	
				}
				else{
					print $this->links[ $i ]->getHtml( true, false ); // active non-link
				}
				
			}
			else{
				print $this->links[ $i ]->getHtml( false ); // inactive link
			}
			
			print "</li>\n";
			
		}
		
		print $indent."\t</ul>\n";
		if( $asXhtml ){
			// output XHTML
			print $indent."</div>\n";
		}
		else{
			// output HTML5
			print $indent."</nav>\n";
		}
	}
	
	
}




?>