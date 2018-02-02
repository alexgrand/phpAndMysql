<?php 
require_once('../page.php');

$dirSubmit = new Page();
$dirSubmit->title = 'Submt Site';

$dirSubmit->content = <<<END
<h1>Submit Site</h1>
<form action="submit.php" method="post">
	<label for="url">Enter the URL:</label>
	<input type="text" name="url" id="url" size="30" value="http://"><br>
	<label for="email">Enter the Email Contact:</label>
	<input type="text" name="email" id="email" size="30"><br>
	<input type="submit" value="Submit Site">
</form>
END;

$dirSubmit->Display();
?>