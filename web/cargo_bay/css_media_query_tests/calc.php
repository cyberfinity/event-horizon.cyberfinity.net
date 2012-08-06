<?php

$basecol = 36;
$basegutter = 12;
$sizeadjust = 2;

if( isset( $argv[1] ) ){
	$basecol = intval( $argv[1] );
}

if( isset( $argv[2] ) ){
	$basegutter = intval( $argv[2] );
}

if( isset( $argv[3] ) ){
	$sizeadjust = intval( $argv[3] );
}


function printGridInfo( $col, $gutter, $cols, $indent = "" ){
	$fullwidth = $cols * ($col + $gutter);
	$contentwidth = $fullwidth - $gutter;

	print $indent.$cols." cols @ ".$col." | ".$gutter."\n";
	print $indent."\tFull width:    ".$fullwidth."\n";
	print $indent."\tContent width: ".$contentwidth."\n";
}


function printGridSetInfo( $title, $cols ){
	print ">> ".$title." <<\n";
	
	global $basecol, $basegutter, $sizeadjust;
	
	// Smaller
	$smallergutter = $basegutter - $sizeadjust;
	$smallercol = ($smallergutter / $basegutter) * $basecol;
	print "\tSmaller:\n";
	printGridInfo( $smallercol, $smallergutter, $cols, "\t" );
	print "\n";

	// Normal
	print "\tNormal:\n";
	printGridInfo( $basecol, $basegutter, $cols, "\t" );
	print "\n";
	
	// Bigger
	$biggergutter = $basegutter + $sizeadjust;
	$biggercol = ($biggergutter / $basegutter) * $basecol;
	print "\tBigger:\n";
	printGridInfo( $biggercol, $biggergutter, $cols, "\t" );
	print "\n";

	print "\n";
}


printGridSetInfo( "Mobile", 8 );
printGridSetInfo( "Tablet", 16 );
printGridSetInfo( "Desktop", 24 );

?>
