<?php 
session_start();

require_once('../page.php');

$members = new Page();
$members->title = 'Members Only';
$members->content = '<h1>Members Only</h1>';

if (isset($_SESSION['valid_user'])) {
	$members->content .= '<p>You are logged in as '.$_SESSION['valid_user'].'</p>';
	$members->content .= '<p><em>Members-Only content goes here.</em></p>';
} else {
	$members->content .= '<p>You are not logged in.</p>';
	$members->content .= '<p>Only logged in members may see this page.</p>';
}

$members->content .= '<p><a href="authmain.php">Back to Home Page</a></p>';


$members->Display();
?>