<?php 
require_once("page.php");

$searchPage = new Page();
$searchPage->title .= ' Catalog Search';
$searchPage->content = 
<<<END
<form action="results.php" method="post">
	<p>
		<strong>Choose Search Type:</strong>
		<br>
		<select name="searchtype" id="">
			<option value=""></option>
			<option value="Author">Author</option>
			<option value="Title">Title</option>
			<option value="ISBN">ISBN</option>
		</select>
	</p>
	<p>
		<strong>Enter Search Term:</strong>
		<br>
		<input type="text" name="searchterm" size="" ="40">
	</p>
	<p><input type="submit" name="submt" value="Search"></p>
</form>
END;

$searchPage->Display();
?>