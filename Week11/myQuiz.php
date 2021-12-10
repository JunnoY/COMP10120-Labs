<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Countries v1 Quiz</title>
	<style type="text/css">
	body
		{background-color:skyblue;}
	</style>
</head>
<body>
<?php

if (!isset($_SESSION['started']))
{
	$_SESSION['qa'] = buildQA();
	$_SESSION['started'] = true;
}

$qa = $_SESSION['qa'];


if (!isset($_POST['correctAnswer']))
{
	$correctAnswer = $_POST["correctAnswer"];

	if($_POST['answer'] == $qa[$correctAnswer][1])
	{
		echo("correct... well done <br><br>");
	}
	else
	{
		echo("incorrect... nevermind <br><br>");
	}
	echo("Try another... <br><br>");
}

showQA($qa);



function showQA()
{
	$answer[] = rand(0, sizeof($qa) - 1);
	echo("Question " . $answer[0]);

	for($i=0; $i<3; $i++) // we will have questions 0,1,2,3 printed out
	{
		$answer[] = rand(0, sizeof($qa)-1);
	}

	// foreach ($answer as $value) {
	// 	echo($value. "<br>");
	// }
	$correct = "<input type='hidden' value='$answer[0]' name='correctAnswer' >";

	echo("<p>What is the capital of " . $qa[$answer[0]][0]. " </p>")
	shuffle($answer);

	$choice = "";

	foreach ($answer as $value)
	{

		$choice = "<input type='radio' name='answer' value='" $qa[$value][1]. "'>" . $qa[$value][1] . "<br>";
	}
	echo("<form method='post'>");
	echo($choice);
	echo($correct);
	echo("<br> <input type='sbumit' value='Check Answer'></form>");

}





function buildQA()
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://ajayakv-rest-countries-v1.p.rapidapi.com/rest/v1/all",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: ajayakv-rest-countries-v1.p.rapidapi.com",
			"x-rapidapi-key: bdb32997eamsh4e51486f1c6de4fp1ee6b5jsn4a9f77e054b4"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		die("cURL Error #:" . $err);
	} else {
		echo $response;
	}


	$response = json_decode($response, true);
	$qa = [];

	foreach ($response as $item) {
		//echo("Country: " .$item['name'] ."<br>");
		//echo("Capital: " .$item['capital'] ."<br>");

		array_push($qa, array($item['name'], $item['capital']));

	}
	return $qa;
}







?>

</body>
</html>