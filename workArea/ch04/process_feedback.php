<?php 
$msg = "";
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$feedback = htmlspecialchars(trim($_POST['feedback']));
$regEmail = '/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/';
$regFeedback = '/fuck/';
$toAddress = "namelost@yandex.ru";
$subject = "Feedback from website";

if (preg_match($regEmail,$email) === 0) {
	echo "<p>That is not a valid emaid address.</p>";
	echo "<p>Please return to the previous page and try again.</p>";
	exit();
} 

if (preg_match($regFeedback,$feedback)) {
	$feedback = preg_filter($regFeedback,'#@!',$feedback);
} 
if (preg_match('/shop|customer service|retail/',$feedback)) {
	$toAddress = 'retail@example.com';
} elseif (preg_match('/deliver|fulfill/',$feedback)===1) {
	$toAddress = 'fulfillment@example.com';
} elseif (preg_match('/bill|account/',$feedback)) {
	$toAddress = 'accounts@example.com';
} 
if (preg_match('/^bigcustomer@[a-zA-Z0-9\-\.]+\.com$/',$email)) {
	$toAddress = 'bob@example.com';
}

$mailContent = 
	"Customer name: ".str_replace("\r\n","",$name)."\n".
	"Customer email: ".str_replace("\r\n","",$email)."\n".
	"Customer comments:\n".str_replace("\r\n","",$feedback)."\n";
$fromAddress = $email;
@mail($toAddress,$subject,$mailContent,$fromAddress);

$feedback = nl2br(htmlspecialchars($mailContent));
$msg .= $feedback;
$msg .= "Email sent to address: $toAddress";

echo <<<END
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bob'S Auto Parts - Feedback Submitted</title>
</head>
<body>
	<h1>Feedback submitted</h1>
	<p>Your feedback has been sent.</p>
	<p>$msg</p>
</body>
</html>
END;
?>