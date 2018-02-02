<?php 
require_once('../page.php');

$brDir = new Page();
$brDir->title = 'Browse Directorries';

$brDir->content = '<h1>Browsing</h1>';

$dir = dir("../uploads/");

$brDir->content .= '<p>Handle is '.$dir->handle.'</p>';
$brDir->content .= '<p>Upload directory is '.$dir->path.'</p>';
$brDir->content .= '<p>Directory Listing: </p><ul>';

while (false !== ($file = $dir->read())) {
	if ($file != "." && $file != "..") {
		$brDir->content .= '<li>'.$file.'</li>';
	}
}

$brDir->content .= '</ul>';

$brDir->Display();
?>