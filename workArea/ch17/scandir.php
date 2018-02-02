<?php 
require_once('../page.php');

$scDir = new Page();
$scDir->title = 'Browse Directories';

$scDir->content = '<h1>Browsing</h1>';

$dir = '../uploads/';
$files1 = scandir($dir);
$files2 = scandir($dir,1);

$scDir->content .= '<p>Upload directory is '.$dir.'</p>';
$scDir->content .= '<p>Directory Listing in alphabetical order, ascending:</p><ul>';

foreach ($files1 as $file) {
	if ($file != "." && $file != "..") {
		$scDir->content .= '<li>'.$file.'</li>';
	}
}

$scDir->content .= '</ul>';

$scDir->content .= '<p>Upload directory is: '.$dir.'</p>';
$scDir->content .= '<p>Directory Listing in alphabetical order, descending:</p><ul>';

foreach ($files2 as $file) {
	if ($file != "." && $file != "..") {
		$scDir->content .= '<li>'.$file.'</li>';
	}
}

$scDir->content .= '</ul>';

$scDir->Display();
?>