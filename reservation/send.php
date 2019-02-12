<?php
include('../log/dbconnect.php');
// isset condition
if(isset($_POST['send'])) {
    $number = preg_replace("/\s+/", "", $_POST['number']);
    $content = $_POST['message'];
    $mobile = "91".$number;

    echo($mobile . $content);
    sendmsg($number, $content);
}

$a = 'are';
$currentdate = date('j');
$availquery = "SELECT *FROM Calendar WHERE bool_hol = '0' AND DAY = '0' AND date_cal > $currentdate ";
$result = mysqli_query($conn, $availquery);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $a = $a . "," . $row['date_cal'];
        }
    }
    $reply = "Available dates are $a";
// Account details
$apiKey = urlencode('mjL/sb4ULhI-AO3Udp9Ya2YgFawymAlY3Cc6IAh6wV	');

// Message details
$numbers = '8508904053';
$sender = urlencode('TXTLCL');
$message = $reply;

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
echo($response);
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