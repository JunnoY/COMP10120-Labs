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
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}


?>