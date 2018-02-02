<?php 
require_once('../page.php');

$insertUser =  new Page();
$insertUser->styles = 'style.css';
$insertUser->title = 'Внести пользователя и пароль в базу данных';
$insertUser->footer = '';

if (isset($_POST['userid']) && isset($_POST['password'])) {
	$userid = $_POST['userid'];
	$password = $_POST['password'];

	$db_host = 'localhost';
	$db_database = 'webauth';
	$db_user = 'registration';
	$db_password = 'reg1$7r4710n';
	$db_table = 'authorized_users';

	$db = new mysqli($db_host,$db_user,$db_password,$db_database) OR DIE('Не могу создать соединение'.mysqli_connect_errno());

	$query = "SELECT * FROM ".$db_table." WHERE name = ?";
	$stmt = $db->prepare($query);
	$stmt->bind_param('s',$userid);
	$stmt->execute();
	$stmt->store_result();
	
	if ($stmt->num_rows>0) {
		$stmt->free_result();
		$insertUser->content .= "User with such name already exists!";
		$insertUser->Display();
		exit;
	}	else {
		if ($password !== '' && $userid !== '') {

			$query = "INSERT INTO ".$db_table."(name,password) VALUES ('".$userid."','".$password = password_hash($password, PASSWORD_DEFAULT)."')";
			if ($result = $db->query($query) === TRUE) {
				$insertUser->content .= "Имя и пароль успешно добавлены в базу данных";
			} else {
				$insertUser->content .= 'ОШИБКА В ДОБАВЛЕНИИ ДАННЫХ!';
				$insertUser->Display();
				exit;
			}
			$stmt->close();
		} else {
			$insertUser->content .= 'You didn\'t choose password or name!<br>'.
			'<a href="registration.php">Come Back!</a>';
		}
	}

	$db->close();

} else {
	$insertUser->content .= '<h1>Registration</h1>';
	$insertUser->content .= <<<END
	<form action="registration.php" method="post">
			<fieldset>
			<legend>Registrate Now!</legend>
			<p><label for="userid">UserID:</label><input type="text" name="userid" id="userid" size="30"></p>
			<p><label for="password">Password:</label><input type="password" name="password" id="pasword" size="20"></p>
		</fieldset>
		<button type="submit" name="login">Registrate</button>
	</form>
	<br>
	<a href="authmain.php">Login!</a>
END;
}


$insertUser->Display();
?>