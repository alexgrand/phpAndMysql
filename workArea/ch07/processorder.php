<?php 
require_once("file_exception.php");

$tireqrty = (int) $_POST['tireqty'];
$oilqty = (int) $_POST['oilqty'];
$sparqty  = (int) $_POST['sparkqty'];
$address = preg_replace('/\t|\R/','',$_POST['address']);
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$date = date('H:i,jS F Y');
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
	echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";
	echo "<p>Your order is as follows: </p>";

	$totalqty = 0;
	$totalamount = 0.00;

	define('TIREPRICE', 100);
	define('OILPRICE', 10);
	define('SPARKPRICE', 4);
	
	$totalqty = $tireqrty + $oilqty + $sparqty;
	echo "<p>Items ordered: ".$totalqty."<br>";

	if ($totalqty == 0) {
		echo "You did not order anything on the previous page <br>";
	} else {
		if ($tireqrty>0) {
			echo htmlspecialchars($tireqrty).' tires<br>';
		}
		if ($oilqty>0) {
			echo htmlspecialchars($oilqty).' bottles of oil<br />';
		}
		if ($sparqty>0) {
			echo htmlspecialchars($sparqty).' spark plugs<br />';
		}
	}

	$totalamount = $tireqrty*TIREPRICE+
		$oilqty*OILPRICE+
		$sparqty*SPARKPRICE;
	echo  "Subtotal: $".number_format($totalamount,2)."<br />";

	$taxrate = 0.10;  // local sales tax is 10%
	$totalamount = $totalamount * (1 + $taxrate);
	echo "Total including tax: $".number_format($totalamount,2)."</p>";
	echo "<p>Address to ship to is ".htmlspecialchars($address)."</p>";

	$outputstring = $date."\t".$tireqrty." tires \t".$oilqty." oil\t".
		$sparqty." spark plugs\t\$".$totalamount.
		"\t". $address."\n";

	try {
		if (!($fp = @fopen("$doc_root/../orders/orders.txt",'ab'))) {
			throw new fileOpenException();
		}
		if (!flock($fp,LOCK_EX)) {
			throw new fileLockException();
		}
		if (!fwrite($fp,$outputstring,strlen($outputstring))) {
			throw new fileWriteException();
		}

		flock($fp,LOCK_UN);
		fclose($fp);
		echo "<p>Order written.</p>";
	} catch (fileOpenException $foe) {
		echo "<p><strong>Orders file could not be opened.<br>Please contact our webmaster for help.</strong></p>";
	} catch (Exception $e) {
		echo "<p><strong>Your order couldnot be processed this time.<br>Please try again later.</strong></p>";
	}
?>
</body>
</html>