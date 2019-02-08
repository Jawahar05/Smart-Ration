<?php


// isset condition
if(isset($_POST['send'])) {
    $number = preg_replace("/\s+/", "", $_POST['number']);
    $content = $_POST['message'];
    $mobile = "91".$number;

    echo($mobile . $content);
    sendmsg($number, $content);
}



// function to send message
function sendmsg($passnumber, $content)
{
            // Account details
    $apiKey = urlencode('mjL/sb4ULhI-AO3Udp9Ya2YgFawymAlY3Cc6IAh6wV	');
	
	// Message details
    $numbers = $passnumber;
    $sender = urlencode('TXTLCL');
    $message = $content;
 
	// $numbers = implode(',', $numbers);
 
	// Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
	
	// Process your response here
	echo $response;
}

?>