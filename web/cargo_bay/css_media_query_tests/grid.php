<?php

$use_scale = false;
$scale = "1.0";
if( isset( $_GET['initial-scale'] ) ){
	$use_scale = true;
	$scale = $_GET['initial-scale'];
}

$use_hack = false;
if( isset( $_GET['hack'] ) && (strcmp($_GET['hack'], 'yes') == 0) ){
	$use_hack = true;
}

?><!DOCTYPE html>
<html>
<head>
<title>Grid Idea</title>
<link rel="stylesheet" type="text/css" href="grid_36_12.css" title="36 / 12 grid (default)" />
<link rel="alternate stylesheet" type="text/css" href="grid_36_9.css" title="36 / 9 grid" />
<meta name="viewport" content="width=device-width<?php

if( $use_scale ){
	print ', initial-scale='.$scale;
}

?>" />
<?php

if( $use_hack ){

?>
<script type="text/javascript">
(function(doc) {

	var addEvent = 'addEventListener',
	    type = 'gesturestart',
	    qsa = 'querySelectorAll',
	    scales = [1, 1],
	    meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

	function fix() {
		meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
		doc.removeEventListener(type, fix, true);
	}

	if ((meta = meta[meta.length - 1]) && addEvent in doc) {
		fix();
		scales = [.25, 1.6];
		doc[addEvent](type, fix, true);
	}

}(document));
</script>
<?php

}

?><script src="grid_info.js"></script>
</head>
<body>
	<section class="main" id="mainbody">
		<div class="colfull">
			<p><?php

if( $use_scale ){
	if( $use_hack ){
		print "Using <code>initial-scale=".$scale."</code> in meta tag with hack. <a href=\"grid.php\">Disable scale</a>. <a href=\"grid.php?initial-scale=1.0\">Disable hack</a>.";
	}
	else{
		print "Using <code>initial-scale=".$scale."</code> in meta tag without hack. <a href=\"grid.php\">Disable scale</a>. <a href=\"grid.php?initial-scale=1.0&amp;hack=yes\">Enable hack</a>.";
	}
}
else{
	print "Not using <code>initial-scale</code> in meta tag. <a href=\"grid.php?initial-scale=1.0\">Enable scale</a>.";
}
						
?></p>
			<p id="demotext">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		
		<div class="cols1 preview group1"></div>
		<div class="cols1 preview group1"></div>
		<div class="cols1 preview group1"></div>
		<div class="cols1 preview group1"></div>		
		<div class="cols1 preview group1"></div>
		<div class="cols1 preview group1"></div>
		<div class="cols1 preview group1"></div>
		<div class="cols1 preview group1"></div>
		
		<div class="cols1 preview group2"></div>
		<div class="cols1 preview group2"></div>
		<div class="cols1 preview group2"></div>
		<div class="cols1 preview group2"></div>		
		<div class="cols1 preview group2"></div>
		<div class="cols1 preview group2"></div>
		<div class="cols1 preview group2"></div>
		<div class="cols1 preview group2"></div>
		
		<div class="cols1 preview group3"></div>
		<div class="cols1 preview group3"></div>
		<div class="cols1 preview group3"></div>
		<div class="cols1 preview group3"></div>	
		<div class="cols1 preview group3"></div>
		<div class="cols1 preview group3"></div>
		<div class="cols1 preview group3"></div>
		<div class="cols1 preview group3"></div>
		
		<div class="clear"></div>
	</section>
</body>
</html>
