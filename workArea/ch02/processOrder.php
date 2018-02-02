<?php 
$doc_root = $_SERVER['DOCUMENT_ROOT'];

$totalQty = 0;
$totalAmount = 0.00;
$taxRate = 0.10;
$msg = "";
$goods = ['tireqty','oilqty','sparkqty'];
$address = preg_replace('/\t|\R/',' ',$_POST['address']);
$date = "Order processed at ".date('H:i, jS F Y');

for ($i=0; $i < count($goods); $i++) {
	$varname = $goods[$i]; 
	$$varname = (int)htmlspecialchars($_POST[$goods[$i]]);

	if (empty($$varname)) {
		$$varname = 0;
	} elseif ($$varname<0) {
		$$varname *= -1;
	}
}

$totalQty = $tireqty+$oilqty+$sparkqty;

define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);

$subTotal = $tireqty*TIREPRICE
						 + $oilqty*OILPRICE
						 + $sparkqty*SPARKPRICE;
$totalAmount = number_format($subTotal*(1+$taxRate));

$outputString = $date."\t".
	$tireqty." tires,\t".
	$oilqty." bottles of oil, ".
	$sparkqty." spark plugs.\t".
	$totalAmount." total amount.\n";

if ($totalQty == 0) {
	$msg = "<p style='color:red;'>".
				 "You did not order anything on the previous page!<br>".
				 "</p>";
} else {
	$msg .= "<p>$date</p>".
				"<p>Your order is as follows: </p>".
				$tireqty.' tires<br>'.
				$oilqty.' bottles of oil<br>'.
				$sparkqty.' spark plugs<br>'.
				'<p>Items ordered: '.$totalQty."<br>".
				"subtotal: $".number_format($subTotal,2)
				."<br>".
				"Total including tax: $".number_format($totalAmount,2)."</p>";
	$fp = fopen("$doc_root/PHP and MySQL Web Dev 5th edition/workArea/ch02/orders/orders.txt",'ap');
	if (!$fp) {
		$err_msg = "<p><strong>Your order could not be processed at this time".
		"Please try again later</stong></p></body></html>";

		$msg.=$err_msg;
		exit;
	} else {
		flock($fp,LOCK_EX);
		fwrite($fp, $outputString,strlen($outputString));
		flock($fp,LOCK_UN);
		fclose($fp);
	}
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
	<h2>Order Results</h2>

	<?php 
	echo $msg;
	?>
</body>
</html>