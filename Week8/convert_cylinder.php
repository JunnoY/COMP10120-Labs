<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Surface area of cylinder Conversion Page</title>
</head>
<body>
	<h1>Surface area of cylinder Conversion Page</h1>
	<?php
		$c = $_GET['radius_cylinder'];
		$h = $_GET['height_cylinder'];
		$a = (($c**2)*2*M_PI)+(2*M_PI*$h*$c);
		echo ("The surface area of a sphere with radius ".$c. " metres and height ".$h. " metres is ".$a. " metres^2");
 	?>

</body>
</html>