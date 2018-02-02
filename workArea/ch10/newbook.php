<?php 
require_once('page.php');

class NewBook extends Page
{
	public function DisplayStyles()
	{
		echo 
		"
		<style type=\"text/css\">
			fieldset {
				width: 75%;
				border: 2px solid  #ccc;
			}
			label {
				width: 75px;
				float: left;
				table-layout: ;
				font-weight: bold;
			}
			input {
				border: 1px solid  #000;
				padding: 3px;
			}
		</style>
		";
	}
}

$newbookPage = new NewBook();
$newbookPage->title .= ' - New Book Entry';
$newbookPage->content = 
<<<END
<form action="insert_book.php" method="post">
	<fieldset>
		<p><label for="ISBN">ISBN</label><input type="text" id="ISBN" name="ISBN" maxlength="13" size="13"></p>
		<p><label for="Author">Author</label><input type="text" id="Author" name="Author" maxlength="30" size="30"></p>
		<p><label for="Title">Title</label><input type="text" id="Title" name="Title" maxlength="60" size="30"></p>
		<p><label for="Price">Price</label>$ <input type="text" id="Price" name="Price" maxlength="7" size="7"></p>
	</fieldset>
	<p><input type="submit" value="Add New Book"></p>
</form>
END;
$newbookPage->Display();
?>