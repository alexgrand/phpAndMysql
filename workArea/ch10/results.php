<?php 
require_once('page.php');

$resPage = new Page();
$resPage->title .= ' Search Results';

$searchtype = $_POST['searchtype'];
$searchterm = trim($_POST['searchterm']);

if (!$searchtype|| !$searchterm) {
	$resPage->content = '<p>You have not entered search details.<br>
		Please go back and try again.</p>';
		$resPage->Display();
		exit;
}
switch ($searchtype) {
	case 'Title':
	case 'Author':
	case 'ISBN':

		break;
	default:
	$resPage->content = '<p>This is not a valid search type.<br>
		Please go back and try again.</p>';
	$resPage->Display();
	exit;
}


@$db = new mysqli('localhost','AlexGrand','7310852virus','books');
if (mysqli_connect_errno()) {
	$resPage->content = '<p>Error: Could not connect to database.<br>
	Please try again later.</p>';
	$resPage->Display();
	exit;
}


$query = "SELECT ISBN, Author,Title,Price
			FROM Books WHERE $searchtype = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('s',$searchterm);
$stmt->execute();
$stmt->store_result(); //помещает результаты в буффер клиента

$stmt->bind_result($isbn,$author,$title,$price);

$resPage->content = "<p>Number of books found: ".
	$stmt->num_rows."</p>";

while ($stmt->fetch()) {
	$resPage->content .= "<p><strong>Title: ".
		$title."</strong><br>Author: ".
		$author."<br>ISBN: ".
		$isbn."<br>Price: \$".
		number_format($price,2)."</p>";
}

$stmt->free_result();
$db->close();

$resPage->Display();
?>
