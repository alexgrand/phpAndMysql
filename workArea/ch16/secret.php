<?php
require_once('../page.php');

class SecretPage extends Page
{
	public function DisplayHeader()
	{
		echo '<h1>Secret Page</h1>';
	}
}

$secretPage = new SecretPage();
$secretPage->title = 'Secret Page';

if ((!isset($_POST['name']))||(!isset($_POST['password']))) {
	// visitor needs to enter a name and password
	$secretPage->content = "
	<h2>Please Log In</h2>
	<p>This page is secret</p>
	<form action=\"secret.php\" method=\"post\">
		<p><label for=\"name\">Username:</label><input type=\"text\" name='name' id=\"name\" size=\"15\"></p>
		<p>
			<label for=\"password\">Password:</label>
			<input type=\"password\" name=\"password\" id=\"password\" size=\"15\">
			<button type=\"submit\" name=\"submit\">Log In</button>
		</p>
</form>
	";
	// exit;
} elseif (($_POST['name']=='user')&&($_POST['password']=='pass')) {
	$secretPage->content = '<h2>Here it is!</h2>
		<p>I bet you are glad you can see this secret page.</p>';
		// exit;
} else {
	$secretPage->content = '<h2>Go Away!</h2>
		<p>You are not authorized to use this resource.</p>';
		// exit;
}
$secretPage->Display(); 
?>