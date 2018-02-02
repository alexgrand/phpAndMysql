<?php 
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$msg = "";
$colName = ['Order Date','Tires','Oil','Spark Plugs','Total','Address'];

$orders = file("$doc_root/../orders.txt");

function html($tag,$text='')
{
	if ($tag=='br') {
		return "$text"."<".$tag.">";
	}
	return "<".$tag.">".$text."</".$tag.">";
}

/*______________________*/


if (count($orders) == 0) {
	$msg .= html('p',html('strong','No orders pending.<br> Please try again later'));
}

$msg .= "<table>\n".
		 "\t<tr>";
for ($y=0; $y < count($colName); $y++) { 
	$msg .= html('th',$colName[$y]);
}
$msg .= "</tr>";

for ($i=0; $i < count($orders); $i++) { 
	$line = explode("\t",$orders[$i]);	
	$line[1] = intval($line[1]);
	$line[2] = intval($line[2]);
	$line[3] = intval($line[3]);
	$msg .= "<tr>";
	for ($z=0; $z < count($line); $z++) { 
		$msg .= html('td',$line[$z]);
	}
	$msg .= "</tr>";
}

$msg .= "\n</table>";

echo <<<END
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bob's Auto Parts - Customer Orders</title>
	<link rel="stylesheet" href="style/main.css">
</head>
<body>
	<h1>Bob;s Auto Parts</h1>
	<h2>Customer Orders</h2>
	$msg
</body>
</html>
END
?>