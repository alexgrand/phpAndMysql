<?php 
require_once('../page.php');

$look = new Page();
$look->title = 'Stock Quote From NASDAQ';

// choose stock to look at
$symbol = 'goog';
$look->content = '<h1>Stock Quote for '.$symbol.'</h1>';

$url = 'http://www.google.com/finance?q=NASDAQ:'.$symbol.'&sa=X&ved=0ahUKEwjvhI65pKzYAhXBtpQKHZo4ApkQ2AEIFTAA';

if (!($contents = file_get_contents($url))) {
	die('Failed to open '.$url);
}

$look->content .= $contents;
$look->Display();
?>