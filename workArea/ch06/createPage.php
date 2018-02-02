<?php 
require_once("page.php");
class PageCreator extends Page
{
	public function Display()
	{
		echo "
		<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<meta charset=\"UTF-8\">\n";
		$this->DisplayTitle();
		$this->DisplayKeywords();
		$this->DisplayStyles();
		echo "</head>\n<body>\n";
		echo $this->content;
		echo "</body>\n</html>";
	}
}

$pageCreate = new PageCreator();
$pageCreate->title = "Cоздать страницу";



if (empty($_POST['submit'])) {
	$pageCreate->content = 
<<<END
<form action="createPage.php" method="POST">
<p><strong>Название файла</strong><br><input type="text" name="filename" size="40"></p>
<p><strong>Название страницы</strong><br><input type="text" name="title" size="40"></p>
<p><strong>Контент</strong><br><textarea rows='10' cols='37'name='content'></textarea></p>
<p><button type="submit" name="submit" value="true">Отправить</button></p>
</form>
END;
} else {
	$filename = htmlspecialchars(trim($_POST['filename']));
	$title = htmlspecialchars(trim($_POST['title']));
	$content = htmlspecialchars(trim($_POST['content']));
	$outputString = "<?php\nrequire_once(\"page.php\");\n".'$newPage = new Page();'."\n".
		'$newPage->title = "'.$title."\";\n".
		'$newPage->content = htmlspecialchars_decode("'.$content."\");\n".
		'$newPage->Display();'."\n".
		'?>';
	
	if (empty($filename)) {
		echo "<p><strong>Your order could not be processed at this time.<br> ".
		"You didnt put name of file.</stong></p>";
		exit;
	} else {
		$fp = fopen($filename.".php","ap");
		flock($fp,LOCK_EX);
		fwrite($fp, $outputString,strlen($outputString));
		flock($fp,LOCK_UN);
		fclose($fp);

		echo "Файл <a href='".$filename.".php' style='color:blue;'>$filename.php</a>";
	}
}

$pageCreate->Display();
?>