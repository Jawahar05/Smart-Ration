<?php
	// Account details
	$apiKey = urlencode('mjL/sb4ULhI-AO3Udp9Ya2YgFawymAlY3Cc6IAh6wV');
 
	// Prepare data for POST request
	$data = $apiKey;
 
	// Send the GET request with cURL
	$ch = curl_init('https://api.textlocal.in/get_history_single/?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>