<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Initials Conversion Page</title>
</head>
<body>
	<h1>Initials Conversion Page</h1>
	<?php
		$f = $_GET['firstname'];
		$s = $_GET['surname'];
		$i = strtoupper($f[0].$s[0]);
		echo ("Your initial is ".$i);
 	?>

</body>
</html>