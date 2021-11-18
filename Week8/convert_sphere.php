<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Surface area of sphere Conversion Page</title>
</head>
<body>
	<h1>Surface area of sphere Conversion Page</h1>
	<?php
		$c = $_GET['radius_sphere'];
		$a = ($c**2)*4*M_PI;
		echo ("The surface area of a sphere with radius ".$c. " metres is ".$a. " metres^2");
 	?>

</body>
</html>