<?php

class NavLink {
	
	private $path;
	private $label;
	
	public function __construct( $path, $label ){
		$this->path = trim( strval( $path ));
		$this->label = trim( strval( $label ));
	}
	
	public function getHtml( $active, $asLink = true ){
		$activeClass = $active ? ' class="active"' : '';
	
		if( $asLink ){
			return '<a href="'.$this->path.'"'.$activeClass.'>'.$this->label.'</a>';
		}
		else{
			return '<strong'.$activeClass.'>'.$this->label.'</strong>';
		}
	}
	
	
}

?>