<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Circle Conversion Page</title>
</head>
<body>
	<h1>Circle Conversion Page</h1>
	<?php
		$c = $_GET['radius_circle'];
		$cir = 2*$c*M_PI;
		$a = (($c**2)*2*M_PI)+(2*M_PI*$h*$c);
		echo ("The surface area of the circle with radius ".$c. " metres is ".$a. " metres^2 and its circumference is ".$cir. " metres");
 	?>

</body>
</html>