<?php
$to = 'namelost@yandex.ru';
$subject = 'test';
$message = 'some test string';
echo <<<END
<form action="mail.php" method="POST">
	<button value="true" type="submit" name="submit">SEND mail</button>
</form>
END;

$button = $_POST['submit'];
if ($button) {
	mail($to,$subject,$message);
	echo $message." SENT";
} else {
	echo "ups. cannot be sent";
}
?>
