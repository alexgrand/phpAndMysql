<?php 
$distance = 50;
$msg = "";

for ($distance=50; $distance <=250; $distance+=50){
	$msg .= "<tr>".
			 "<td style=\"text-align: right;\">".$distance."</td>".
			 "<td style=\"text-align: right;\">".($distance / 10)."</td>".
			 "</tr>\n";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bob's Auto Parts - Freight Costs</title>
</head>
<body>
<table style="border: 0px; padding: 3px">
	<tr>
		<td style="background: #cccccc; text-align: center;">Distance</td>
		<td style="background: #cccccc; text-align: center;">Cost</td>
	</tr>
	<?php 
	echo $msg;
	?>
</table>
</body>
</html>