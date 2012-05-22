<!DOCTYPE html>
<html>
<head>
	<title>Responsive Tests</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<style type="text/css">
	
	/* Unsupported */
	.type-unsupported, .width-unsupported, .height-unsupported, .dev-width-unsupported, .dev-height-unsupported, .orientation-unsupported, .aspect-unsupported, .dev-aspect-unsupported, .res-unsupported, .dpr-unsupported {
		color: #f00;
	}
	
	/*******************************************************************************/
	
	/* Media types */
	.type-screen, .type-print, .type-handheld, .type-tv, .type-projection, .type-aural, .type-braille, .type-embossed, .type-speech, .type-tty {
		display: none;
	}
	
	@media screen {
		li.type-screen {
			display: list-item;
		}
		
		li.type-unsupported {
			display: none;
		}
	}
	
	@media print {
		li.type-print {
			display: list-item;
		}
		
		li.type-unsupported {
			display: none;
		}
	}
	
	@media handheld {
		li.type-handheld {
			display: list-item;
		}
		
		li.type-unsupported {
			display: none;
		}
	}
	
	@media tv {
		li.type-tv {
			display: list-item;
		}
		
		li.type-unsupported {
			display: none;
		}
	}
	
	@media projection {
		li.type-projection {
			display: list-item;
		}
	}
	
	@media aural {
		li.type-aural {
			display: list-item;
		}
		
		li.type-unsupported {
			display: none;
		}
	}
	
	@media braille {
		li.type-braille {
			display: list-item;
		}
		
		li.type-unsupported {
			display: none;
		}
	}
	
	@media embossed {
		li.type-embossed {
			display: list-item;
		}
		
		li.type-unsupported {
			display: none;
		}
	}
	
	@media speech {
		li.type-speech {
			display: list-item;
		}
		
		li.type-unsupported {
			display: none;
		}
	}
	
	@media tty {
		li.type-tty {
			display: list-item;
		}
		
		li.type-unsupported {
			display: none;
		}
	}
	
	/*******************************************************************************/
	
	/* Width */
	.width-lte240, .width-lte320, .width-lte480, .width-lte600, .width-lte640, .width-lte720, .width-lte768, .width-lte800, .width-lte1024, .width-lte1280, .width-gt1280 {
		display: none;
	}
	
	@media (max-width: 240px) {
		li.width-lte240 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 241px) and (max-width: 320px) {
		li.width-lte320 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 321px) and (max-width: 480px) {
		li.width-lte480 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 481px) and (max-width: 600px) {
		li.width-lte600 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 601px) and (max-width: 640px) {
		li.width-lte640 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 641px) and (max-width: 720px) {
		li.width-lte720 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 721px) and (max-width: 768px) {
		li.width-lte768 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 769px) and (max-width: 800px) {
		li.width-lte800 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 801px) and (max-width: 1024px) {
		li.width-lte1024 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 1025px) and (max-width: 1280px) {
		li.width-lte1280 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	@media (min-width: 1281px) {
		li.width-gt1280 {
			display: list-item;
		}
		
		li.width-unsupported {
			display: none;
		}
	}
	
	/*******************************************************************************/
	
	/* Height */
	.height-lte240, .height-lte320, .height-lte480, .height-lte600, .height-lte640, .height-lte720, .height-lte768, .height-lte800, .height-lte1024, .height-lte1280, .height-gt1280 {
		display: none;
	}
	
	@media (max-height: 240px) {
		li.height-lte240 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 241px) and (max-height: 320px) {
		li.height-lte320 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 321px) and (max-height: 480px) {
		li.height-lte480 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 481px) and (max-height: 600px) {
		li.height-lte600 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 601px) and (max-height: 640px) {
		li.height-lte640 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 641px) and (max-height: 720px) {
		li.height-lte720 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 721px) and (max-height: 768px) {
		li.height-lte768 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 769px) and (max-height: 800px) {
		li.height-lte800 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 801px) and (max-height: 1024px) {
		li.height-lte1024 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 1025px) and (max-height: 1280px) {
		li.height-lte1280 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	@media (min-height: 1281px) {
		li.height-gt1280 {
			display: list-item;
		}
		
		li.height-unsupported {
			display: none;
		}
	}
	
	/*******************************************************************************/
	
	/* Width */
	.dev-width-lte240, .dev-width-lte320, .dev-width-lte480, .dev-width-lte600, .dev-width-lte640, .dev-width-lte720, .dev-width-lte768, .dev-width-lte800, .dev-width-lte1024, .dev-width-lte1280, .dev-width-gt1280 {
		display: none;
	}
	
	@media (max-device-width: 240px) {
		li.dev-width-lte240 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 241px) and (max-device-width: 320px) {
		li.dev-width-lte320 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 321px) and (max-device-width: 480px) {
		li.dev-width-lte480 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 481px) and (max-device-width: 600px) {
		li.dev-width-lte600 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 601px) and (max-device-width: 640px) {
		li.dev-width-lte640 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 641px) and (max-device-width: 720px) {
		li.dev-width-lte720 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 721px) and (max-device-width: 768px) {
		li.dev-width-lte768 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 769px) and (max-device-width: 800px) {
		li.dev-width-lte800 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 801px) and (max-device-width: 1024px) {
		li.dev-width-lte1024 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 1025px) and (max-device-width: 1280px) {
		li.dev-width-lte1280 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	@media (min-device-width: 1281px) {
		li.dev-width-gt1280 {
			display: list-item;
		}
		
		li.dev-width-unsupported {
			display: none;
		}
	}
	
	/*******************************************************************************/
	
	/* Height */
	.dev-height-lte240, .dev-height-lte320, .dev-height-lte480, .dev-height-lte600, .dev-height-lte640, .dev-height-lte720, .dev-height-lte768, .dev-height-lte800, .dev-height-lte1024, .dev-height-lte1280, .dev-height-gt1280 {
		display: none;
	}
	
	@media (max-device-height: 240px) {
		li.dev-height-lte240 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 241px) and (max-device-height: 320px) {
		li.dev-height-lte320 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 321px) and (max-device-height: 480px) {
		li.dev-height-lte480 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 481px) and (max-device-height: 600px) {
		li.dev-height-lte600 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 601px) and (max-device-height: 640px) {
		li.dev-height-lte640 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 641px) and (max-device-height: 720px) {
		li.dev-height-lte720 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 721px) and (max-device-height: 768px) {
		li.dev-height-lte768 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 769px) and (max-device-height: 800px) {
		li.dev-height-lte800 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 801px) and (max-device-height: 1024px) {
		li.dev-height-lte1024 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 1025px) and (max-device-height: 1280px) {
		li.dev-height-lte1280 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	@media (min-device-height: 1281px) {
		li.dev-height-gt1280 {
			display: list-item;
		}
		
		li.dev-height-unsupported {
			display: none;
		}
	}
	
	/*******************************************************************************/
	
	/* Orientation */
	.orientation-portrait, .orientation-landscape {
		display: none;
	}
	
	@media (orientation: portrait) {
		li.orientation-portrait {
			display: list-item;
		}
		
		li.orientation-unsupported {
			display: none;
		}
	}
	
	@media (orientation: landscape) {
		li.orientation-landscape {
			display: list-item;
		}
		
		li.orientation-unsupported {
			display: none;
		}
	}
	
	/*******************************************************************************/
	
	/* Aspect Ratio */
	.aspect-portrait, .aspect-square, .aspect-landscape {
		display: none;
	}
	
	@media (max-aspect-ratio: 1000/1001) {
		li.aspect-portrait {
			display: list-item;
		}
	
		li.aspect-unsupported {
			display: none;
		}
	}
	
	@media (aspect-ratio: 1/1) {
		li.aspect-square {
			display: list-item;
		}
	
		li.aspect-unsupported {
			display: none;
		}
	}
	
	@media (min-aspect-ratio: 1001/1000) {
		li.aspect-landscape {
			display: list-item;
		}
	
		li.aspect-unsupported {
			display: none;
		}
	}
	
	/*******************************************************************************/
	
	/* Device Aspect Ratio */
	.dev-aspect-portrait, .dev-aspect-square, .dev-aspect-landscape {
		display: none;
	}
	
	@media (max-device-aspect-ratio: 1000/1001) {
		li.dev-aspect-portrait {
			display: list-item;
		}
	
		li.dev-aspect-unsupported {
			display: none;
		}
	}
	
	@media (device-aspect-ratio: 1/1) {
		li.dev-aspect-square {
			display: list-item;
		}
	
		li.dev-aspect-unsupported {
			display: none;
		}
	}
	
	@media (min-device-aspect-ratio: 1001/1000) {
		li.dev-aspect-landscape {
			display: list-item;
		}
	
		li.dev-aspect-unsupported {
			display: none;
		}
	}
	
	
	/*******************************************************************************/
	
	/* Resolution */
	.res-low, .res-medium, .res-high, .res-extra-high {
		display: none;
	}
		
	@media (max-resolution: 140dpi) {
		li.res-low {
			display: list-item;
		}
		
		li.res-unsupported {
			display: none;
		}
	}
	
	@media (min-resolution: 141dpi) and (max-resolution: 200dpi) {
		li.res-medium {
			display: list-item;
		}
		
		li.res-unsupported {
			display: none;
		}
	}
	
	@media (min-resolution: 201dpi) and (max-resolution: 280dpi) {
		li.res-high {
			display: list-item;
		}
		
		li.res-unsupported {
			display: none;
		}
	}
	
	@media (min-resolution: 281dpi) {
		li.res-extra-high {
			display: list-item;
		}
		
		li.res-unsupported {
			display: none;
		}
	}
	
	/*******************************************************************************/
	
	/* Device Pixel Ratio */
	.dpr-1, .dpr-2, .dpr-gt2 {
		display: none;
	}
	
	@media (-webkit-device-pixel-ratio : 1) {
		li.dpr-1 {
			display: list-item;
		}
		
		li.dpr-unsupported {
			display: none;
		}
	}
	
	@media (-webkit-device-pixel-ratio : 2) {
		li.dpr-2 {
			display: list-item;
		}
		
		li.dpr-unsupported {
			display: none;
		}
	}
	
	/*******************************************************************************/
	
	</style>
</head>
<body>
	<h1>How is your browser responding to media queries?</h1>
	
	<h2>Media Type</h2>
	<ul>
		<li class="type-screen">Screen</li>
		<li class="type-print">Print</li>
		<li class="type-handheld">Handheld</li>
		<li class="type-tv">TV</li>
		<li class="type-projection">Projection</li>
		<li class="type-braille">Braille</li>
		<li class="type-embossed">Embossed</li>
		<li class="type-speech">Speech</li>
		<li class="type-tty">TTY</li>
		<li class="type-aural">Aural (deprecated)</li>
		<li class="type-unsupported">Not Supported</li>
	</ul>
	
	<h2>Width</h2>
	<ul>
		<li class="width-lte240">&lt; 240</li>
		<li class="width-lte320">241 - 320</li>
		<li class="width-lte480">321 - 480</li>
		<li class="width-lte600">481 - 600</li>
		<li class="width-lte640">601 - 640</li>
		<li class="width-lte720">641 - 720</li>
		<li class="width-lte768">721 - 768</li>
		<li class="width-lte800">769 - 800</li>
		<li class="width-lte1024">801 - 1024</li>
		<li class="width-lte1280">1025 - 1280</li>
		<li class="width-gt1280">&gt; 1280</li>
		<li class="width-unsupported">Not supported</li>
	</ul>
	
	<h2>Height</h2>
	<ul>
		<li class="height-lte240">&lt; 240</li>
		<li class="height-lte320">241 - 320</li>
		<li class="height-lte480">321 - 480</li>
		<li class="height-lte600">481 - 600</li>
		<li class="height-lte640">601 - 640</li>
		<li class="height-lte720">641 - 720</li>
		<li class="height-lte768">721 - 768</li>
		<li class="height-lte800">769 - 800</li>
		<li class="height-lte1024">801 - 1024</li>
		<li class="height-lte1280">1025 - 1280</li>
		<li class="height-gt1280">&gt; 1280</li>
		<li class="height-unsupported">Not supported</li>
	</ul>
	
	<h2>Device Width</h2>
	<ul>
		<li class="dev-width-lte240">&lt; 240</li>
		<li class="dev-width-lte320">241 - 320</li>
		<li class="dev-width-lte480">321 - 480</li>
		<li class="dev-width-lte600">481 - 600</li>
		<li class="dev-width-lte640">601 - 640</li>
		<li class="dev-width-lte720">641 - 720</li>
		<li class="dev-width-lte768">721 - 768</li>
		<li class="dev-width-lte800">769 - 800</li>
		<li class="dev-width-lte1024">801 - 1024</li>
		<li class="dev-width-lte1280">1025 - 1280</li>
		<li class="dev-width-gt1280">&gt; 1280</li>
		<li class="dev-width-unsupported">Not supported</li>
	</ul>
	
	<h2>Device Height</h2>
	<ul>
		<li class="dev-height-lte240">&lt; 240</li>
		<li class="dev-height-lte320">241 - 320</li>
		<li class="dev-height-lte480">321 - 480</li>
		<li class="dev-height-lte600">481 - 600</li>
		<li class="dev-height-lte640">601 - 640</li>
		<li class="dev-height-lte720">641 - 720</li>
		<li class="dev-height-lte768">721 - 768</li>
		<li class="dev-height-lte800">769 - 800</li>
		<li class="dev-height-lte1024">801 - 1024</li>
		<li class="dev-height-lte1280">1025 - 1280</li>
		<li class="dev-height-gt1280">&gt; 1280</li>
		<li class="dev-height-unsupported">Not supported</li>
	</ul>
	
	<h2>Orientation</h2>
	<ul>
		<li class="orientation-portrait">Portrait</li>
		<li class="orientation-landscape">Landscape</li>
		<li class="orientation-unsupported">Not Supported</li>
	</ul>
	
	<h2>Aspect Ratio</h2>
	<ul>
		<li class="aspect-portrait">Portrait</li>
		<li class="aspect-square">Square</li>
		<li class="aspect-landscape">Landscape</li>
		<li class="aspect-unsupported">Not Supported</li>
	</ul>
	
	<h2>Device Aspect Ratio</h2>
	<ul>
		<li class="dev-aspect-portrait">Portrait</li>
		<li class="dev-aspect-square">Square</li>
		<li class="dev-aspect-landscape">Landscape</li>
		<li class="dev-aspect-unsupported">Not Supported</li>
	</ul>
	
	<h2>Resolution (aka pixel density)</h2>
	<ul>
		<li class="res-low">Low (&lt;= 140dpi)</li>
		<li class="res-medium">Medium (141dpi - 200dpi)</li>
		<li class="res-high">High (201dpi - 280dpi)</li>
		<li class="res-extra-high">Extra high (&gt; 280dpi)</li>
		<li class="res-unsupported">Not Supported</li>
	</ul>
	
	<h2>Device Pixel Ratio</h2>
	<ul>
		<li class="dpr-1">1</li>
		<li class="dpr-2">2</li>
		<li class="dpr-unsupported">Not Supported</li>
	</ul>

<footer>
	<p>Hosted on the <a href="/">Event-Horizon</a>.
	<p>&copy; 2012<?php $current_year = date('Y'); if( $current_year > 2012 ){ print( " - ".date('Y') ); } ?> <a href="http://cirrus.twiddles.com/">James Nash</a>.</p>
</footer>
</body>
</html>
