<?php 
$totalQty = 0;
$totalAmount = 0.00;
$taxRate = 0.10;
$discount = 0;
$msg = "";
$goods = ['tireqty','oilqty','sparkqty'];
$choice = ['a','b','c','d'];
$options = ["<p>Regular customer.</p>","<p>Customer referred by TV advert.</p>","<p>Customer referred by phone directory.</p>","<p>Customer referred by word of mouth.</p>"];
$find = htmlspecialchars($_POST['find']);

for ($i=0; $i < count($goods); $i++) {
	$varname = $goods[$i]; 
	$$varname = htmlspecialchars($_POST[$goods[$i]]);

	if (empty($$varname)) {
		$$varname = 0;
	} elseif ($$varname<0) {
		$$varname *= -1;
	}
}

for ($y=0; $y < count($choice); $y++) { 
	switch ($find) {
		case $choice[$y]:
			$option = $options[$y];
			break;
	}
}


// switch ($find) {
// 	case 'a':
// 		$find = "<p>Regular customer.</p>";
// 		break;
// 	case 'b':
// 		$find = "<p>Customer referred by TV advert.</p>";
// 		break;
// 	case 'c':
// 		$find = "<p>Customer referred by phone directory.</p>";
// 		break;
// 	case 'd':
// 		$find = "<p>Customer referred by word of mouth.</p>";
// 		break;
	
// 	default:
// 		$find = "<p>We do not know how this customer found us.</p>";
// 		break;
// }

$totalQty = $tireqty+$oilqty+$sparkqty;

define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);

$subTotal = $tireqty*TIREPRICE
						 + $oilqty*OILPRICE
						 + $sparkqty*SPARKPRICE;
$totalAmount = $subTotal*(1+$taxRate);

if ($totalQty == 0) {
	$msg = "<p style='color:red;'>".
				 "You did not order anything on the previous page!<br>".
				 "</p>";
} else {
	$msg .= "<p>Your order is as follows: </p>".
				$tireqty.' tires<br>'.
				$oilqty.' bottles of oil<br>'.
				$sparkqty.' spark plugs<br>'.
				'<p>Items ordered: '.$totalQty."<br>".
				"subtotal: $".number_format($subTotal,2)
				."<br>".
				"Total including tax: $".number_format($totalAmount,2)."</p>".
				$option;
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