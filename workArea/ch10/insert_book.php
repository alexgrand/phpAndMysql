<?php 
require_once('page.php');

$entryresPage = new Page();
$entryresPage->title .= ' Entry Results';

if (!isset($_POST['ISBN'])||!isset($_POST['Author'])||!isset($_POST['Title'])||!isset($_POST['Price'])) {
	$entryresPage->content = 
			"<p>You have not entered all the required details.<br>
			Please go back and try again.</p>";
	$entryresPage->Display();
	exit;
}

$isbn = $_POST['ISBN'];
$author = $_POST['Author'];
$title = $_POST['Title'];
$price = $_POST['Price'];
$price = doubleval($price);

@$db = new mysqli('localhost','AlexGrand','97310852virus','books');

if (mysqli_connect_errno()) {
	$entryresPage->content = 
	"<p>Error: could not connect to database.<br>
		Please try again later.";
	$entryresPage->Display();
	exit;
}

$query = "INSERT INTO Books VALUES (?,?,?,?)";
$stmt = $db->prepare($query);
$stmt->bind_param('sssd',$isbn,$author,$title,$price);
$stmt->execute();

if ($stmt->affected_rows>0) {
	$entryresPage->content = "<p>Book ".$title." inserted into the database</p>";
} else{
	$entryresPage->content = "<p>An error has occured.<br>
		The item was not added</p>";
}

$db->close();

$entryresPage->Display();
?>