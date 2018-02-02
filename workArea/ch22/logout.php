<?php 
session_start();

if (isset($_SESSION['valid_user'])) {
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
}

require_once('../page.php');

$logout = new Page();
$logout->title = 'Log Out';

if (!empty($old_user)) {
	$logout->content .= '<p>You have been logged out.</p>';
} else {
	$logout->content .= '<p>You were not logged in, and so you have not been logged out.</p>';
}
$logout->content .= '<p><a href="authmain.php">Back to Home Page</a>';

$logout->Display();
?>