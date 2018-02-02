<?php 
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$file = "$doc_root/PHP and MySQL Web Dev 5th edition/workArea/ch02/orders/orders.txt";
$msg = "";

if (file_exists($file)) {
	@$fp = fopen($file,'rb');
	@flock($fp,LOCK_SH); //lock file for reading

	if (!$fp) {
		echo "<p><strong>No orders pending.<br>".
	        "Please try again later.</strong></p>";
		exit;
	} else {
		while (!feof($fp)) {
			$order = fgets($fp);
			$msg .= htmlspecialchars($order)."<br>";
		}
		$msg .= "Final position of the file is ".(ftell($fp))."<br>";
		rewind($fp);
		$msg .= "After rewind, the position is ".
				 (ftell($fp))."<br>";
		flock($fp,LOCK_UN);
		fclose($fp);
	}
} else {
	$err_msg = "<p><strong>No orders pending.<br>".
	        "Please try again later.</strong></p>";
	$msg .= $err_msg;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bob's Auto Parts - Order Results</title>
</head>
<body>
	<h1>Bob's Auto Parts</h1>
	<h2>Customer Orders</h2>
	<p>
	<?php 
	echo $msg;
	?>
	</p>
</body>
</html>