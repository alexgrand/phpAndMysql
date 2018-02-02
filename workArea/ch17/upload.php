<?php 
require_once('../page.php');

$uploadPage = new Page();
$uploadPage->title = 'Upload a File';
$uploadPage->styles = '';

$uploadPage->content = <<<END
<h1>Upload a File</h1>
<form action="uploadProcess.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
	<label for="the_file">Upload a file:</label>
	<input type="file" name="the_file" id="the_file">
	<input type="submit" value="Upload File">
</form>
END;

$uploadPage->Display();
?>