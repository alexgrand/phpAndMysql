<?php 
session_start();
require_once('../page.php');

$auth = new Page();
$auth->title = 'Home page';
$auth->styles = 'style.css';
$auth->content = '<h1>Home Page</h1>';
$auth->footer = '';

if (isset($_POST['userid']) && isset($_POST['password'])) {
	$userid = $_POST['userid'];
	$password = $_POST['password'];

	$db_conn = new mysqli('localhost','webuser','webuser1','webauth');

	if (mysqli_connect_errno()) {
		$auth->content .= "Connection to database failed: ".mysqli_connect_errno();
		$auth->Display();
		exit();
	}

	$query = "SELECT password FROM authorized_users WHERE name= ? ";
	if ($stmt = $db_conn->prepare($query)) {
		$stmt->bind_param('s',$userid);
		$stmt->execute();
		$stmt->bind_result($hashedPass);
		$stmt->fetch();

		// check pass
		if (password_verify($password,$hashedPass)) {
			$auth->content .= "Congrats! Password is correct!";
			// if they are in the database register the user id
			$_SESSION['valid_user'] = $userid;
		} else {
			$auth->content .= "Password is not correct or there is no such user!<br>";
		}
		$stmt->close();
	} 
	
	$db_conn->close();
} 

// checking session variable
if (isset($_SESSION['valid_user'])) {
	$auth->content .= '<p>You are logged in as: '.$_SESSION['valid_user'].'<br>'.
		'<a href="logout.php">Log out</a></p>';
} else {
	if (isset($userid)) {
		// if they've tried and failed to log in
		$auth->content .= '<p>Could not log you in.</p>';
	} else {
		// they have not tried to log in yet or have logged out
		$auth->content .= '<p>You are not logged in.</p>';
	}
	
	$auth->content .= <<<END
		<form action="authmain.php" method="post">
			<fieldset>
			<legend>Login Now!</legend>
			<p><label for="userid">UserID:</label><input type="text" name="userid" id="userid" size="30"></p>
			<p><label for="password">Password:</label><input type="password" name="password" id="pasword" size="20"></p>
		</fieldset>
		<button type="submit" name="login">Login</button>
	</form>
	<br>
	<a href="registration.php">Registrate!</a>
END;
}

$auth->content .= '<p><a href="members_only.php">Go to Members Section</a></p>';

$auth->Display();
?>
