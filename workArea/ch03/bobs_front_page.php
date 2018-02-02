<?php 
$msg = "";
$pictures = array('brakes.png','headlight.png','spark_plug.png','steering_wheel.png','tire.png','wiper_blade.png');

shuffle($pictures);
for ($i=0; $i < 3; $i++) { 
	$msg .= "<td style=\"width:33%;text-align:center;\">
	<img src=\"img/";
	$msg .= $pictures[$i];
	$msg .= "\"/><td>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bob's Auto Parts</title>
</head>
<body>
	<h1>Bob's Auto Parts</h1>
	<div style="align:center;">
		<table style="width:100%;border:0;">
			<tr>
				<?php echo $msg; ?>
			</tr>
		</table>
	</div>
</body>
</html>