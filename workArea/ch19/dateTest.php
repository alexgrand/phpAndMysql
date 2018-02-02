<?php 
$today = getdate();
foreach ($today as $key => $value) {
	echo $key.' => '.$value.'<br>';
}

 echo strftime('%A<br />');
 echo strftime('%x<br />');
 echo strftime('%c<br />');
 echo strftime('%Y<br />');
?>