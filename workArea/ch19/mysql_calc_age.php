<?php 
$day = 20;
$month = 2;
$year = 1989;

// format birthday as an ISO 8601 date
$bdayISO = date("c", mktime(0,0,0, $month,$day,$year));

$db = mysqli_connect('localhost','root', 'mStrnk97310852Lx');
$res =  mysqli_query($db, "select datediff(now(), '$bdayISO')");
$age = mysqli_fetch_array($res);

echo 'Current age is '.floor($age[0]/365.25).'.';
?>