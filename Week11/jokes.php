<!DOCTYPE html>
<html>
<head>
	<title>My Jokes Application</title>
	<style type="text/css">
	body
		{   background-color: skyblue;}
		.joke
		{
			font-family: Georgia, serif;
			font-size: 25px;
			letter-spacing: 2px;
			word-spacing: 2px;
			text-align: center;
			color: #ff8103;
		}
		.myButton
		{
			box-shadow: 0px 10px 14px -7px #7fe8fa;
			background: linear-gradient(to bottom, #63e8ff 5%, #14d4f5, 100%);
			background-color: #63e8ff;
			border: 3px solid #0088b5;
			display: inline-block;
			cursor: pointer;
			color: #ffb303;
			font-family: Algerian;
			font-size: 18px;
			font-weight: bold;
			padding: 6px 12px;
			text-shadow: 0px 1px 0px #5b8a3c;
			text-align: center;
		}

		.wrapper
		{
			text_align:  center;
		}

	</style>
	<script type="text/javascript">
		function showAnswer()
		{
			answer = document.getElementById("answer");
			answer.style.display = "block";
		}

	</script>
</head>
<body>

<?php

$curl = curl_init();
$URL = "https://icarus.cs.man.ac.uk/official_joke_api/jokes/random";

curl_setopt($curl, CURLOPT_URL, $URL);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($curl);
$err = curl_errno($curl);

if($err)
{
	die("Crl Error: " .$err);
}
else
{
	//echo("It worked!");
}

//echo(gettype($response));

$response = json_decode($response, true);

//echo(gettype($response));

// foreach ($response as $key => $value) 
// {
// 	echo("IN array");
// 	if(gettype($value)== "array")
// 	{   

// 		echo("Iside inner array<br><br>");
// 		foreach ($value as $key2 => $value2) 
// 		{   
// 			echo("key: $key2  |  value: $value<br>");

// 		}
// 	}
// 	else
// 	{
// 		echo("key: $key |  value: $value");
// 	}
// }

	echo ("<p class='joke'>" . $response[0]['setup'] . "</p>");


	echo ("<form method='post'>");

	echo("<div class='wrapper'>");

	echo("<input class='myButton' type='button' value='Reveal Answer' onclick='showAnswer();'>");
	echo("<input class='myButton' type='submit' value='New Joke' onclick='submit'>");

	echo("</div");
	echo("</form>");

	echo ("<p class='joke' id='answer' style='display:none;'>" . $response[0]['punchline'] . "</p>");



?>

</body>
</html>