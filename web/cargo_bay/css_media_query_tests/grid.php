<?php

$use_scale = false;
$scale = "1.0";
if( isset( $_GET['initial-scale'] ) ){
	$use_scale = true;
	$scale = $_GET['initial-scale'];
}

?><!DOCTYPE html>
<html>
<head>
<title>Grid Idea</title>
<link rel="stylesheet" type="text/css" href="grid.css" />
<meta name="viewport" content="width=device-width<?php

if( $use_scale ){
	print ', initial-scale='.$scale;
}

?>" />
<script src="grid_info.js"></script>
</head>
<body>
	<section class="main" id="mainbody">
		<div class="colfull">
			<p><?php

if( $use_scale ){
	print "Using <code>initial-scale=".$scale."</code> in meta tag. <a href=\"grid.php\">Disable scale</a>.";
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
