<?php 
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$msg ="";

$orders = file("$doc_root/PHP and MySQL Web Dev 5th edition/workArea/ch03/orders/orders.txt");

$numberOfOrders = count($orders);

if ($numberOfOrders == 0) {
	$msg .= html('p',html('strong','No orders pending<br>'));
}

for ($i=0; $i < $numberOfOrders; $i++) { 
	$msg .= html('br',$orders[$i]);
}

function html($tag,$text="")
{
	if ($tag == "br") {
		return $text."<".$tag.">";
	}
	return "<".$tag.">".$text."</".$tag."> ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bob's Auto Parts - Order Results</title>
	<link rel="stylesheet" href="style/main.css">
</head>
<body>
	<h1>Bob's Auto Parts</h1>
	<h2>Customer Orders</h2>
	<?php 
		echo $msg;
		echo "\n</body>\n";
	 ?>
</html>