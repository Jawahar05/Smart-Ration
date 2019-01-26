<?php
	// Account details
	$apiKey = urlencode('mjL/sb4ULhI-AO3Udp9Ya2YgFawymAlY3Cc6IAh6wV	');
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/get_inboxes/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>