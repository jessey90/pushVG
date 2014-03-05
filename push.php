<?php
require_once("connect.php");
set_time_limit(0);
$list_user_id = array();
$list_token = array();

$messContent = $_POST["mess_content"];

if($_POST["user_id"]){
    $userId = $_POST["user_id"];
    $query = "SELECT token FROM cr_device_token WHERE user_id = '$userId'";

    if($_POST["device_type"])
    {
        $deviceType = $_POST["device_type"];
        $query = "SELECT token FROM cr_device_token WHERE user_id = '$userId' AND device_type = '$deviceType'";
    }

}else{
    $query = "SELECT token FROM cr_device_token";
}

$result = mysqli_query($con, $query);

if($result->num_rows == 0){
    echo "Mã UserID không tồn tại trong hệ thống";
}else{
    while($row = mysqli_fetch_array($result))
    {
        $list_token[] =  $row['token'];
    }
}

mysqli_close($con);

// Adjust to your timezone
date_default_timezone_set('Asia/Bangkok');

// Report all PHP errors
error_reporting(-1);

// Using Autoload all classes are loaded on-demand
require_once 'ApnsPHP/Autoload.php';

// Instanciate a new ApnsPHP_Push object
// Sandbox = Development ; Production = Distibution
$push = new ApnsPHP_Push(
        ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,
        //ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
        'sandbox.pem'
);

// Set the Provider Certificate passphrase
// $push->setProviderCertificatePassphrase('test');

// Set the Root Certificate Autority to verify the Apple remote peer
$push->setRootCertificationAuthority('sandbox.pem');

	// Connect to the Apple Push Notification Service
	$push->connect();
// Bắn Noti pụp pụp pụp
foreach($list_token as $token)
{	
	echo $token.'<br>';
	// Instantiate a new Message with a single recipient
	$message = new ApnsPHP_Message($token);

	// Set a custom identifier. To get back this identifier use the getCustomIdentifier() method
	// over a ApnsPHP_Message object retrieved with the getErrors() message.
	$message->setCustomIdentifier("Message-Badge-1");

	// Set badge icon to "1"
	$message->setBadge(1);

	// Set a simple welcome text
	$message->setText($messContent);

	// Play the default sound
	$message->setSound();

	// Set a custom property
	$message->setCustomProperty('acme2', array('bang', 'whiz'));

	// Set another custom property
	$message->setCustomProperty('acme3', array('bing', 'bong'));

	// Set the expiry value to 30 seconds
	$message->setExpiry(300);

	// Add the message to the message queue
	$push->add($message);
}
	// Send all messages in the message queue
	$push->send();
	
	// Disconnect from the Apple Push Notification Service
	$push->disconnect();


// Examine the error message container
$errors = $push->getErrors(true);
foreach($errors as $error) {
	foreach($error['ERRORS'] as $err) {
		if($err['statusMessage'] == 'Invalid token') exit(); // since i use queue, just exit() and wait for another cosumer to comsume another. Or you may reconnect apns-php here
	}
}

/*$aErrorQueue = $push->getErrors();
if (!empty($aErrorQueue)) {
        var_dump($aErrorQueue);
}*/