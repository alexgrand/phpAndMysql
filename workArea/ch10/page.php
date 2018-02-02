<?php 

class Page
{
	public $title = 'Book-O-Rama';
	public $keywords = 'Book-O-Rama. Books for everyone';
	public $styles = 'styles.css';
	public $content;
	public function __set($name,$value)
	{
		$this->$name = $value;
	}

	public function Display()
	{
		echo 
		"<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<meta charset=\"UTF-8\">\n";
		$this->DisplayTitle();
		$this->DisplayKeywords();
		$this->DisplayStyle();
		echo "</head>\n<body>\n";
		$this->DisplayHeader();
		$this->DisplayContent();
		$this->DisplayFooter();
		echo "\n</body>\n</html>";
	}
	public function DisplayTitle()
	{
		echo "<title>".$this->title."</title>\n";
	}
	public function DisplayKeywords()
	{
		echo "<meta name = 'keywords' content='".$this->keywords."'/>\n";
	}
	public function DisplayStyles()
	{
		echo 
		"
		<link rel=\"stylesheet\" href=".$this->styles.">
		";
	}
	public function DisplayHeader()
	{
		echo 
		"<header>
			<h1> $this->title</h1>
		</header>";
	}
	public function DisplayContent()
	{
		echo $this->content;
	}
	public function DisplayFooter()
	{
		echo 
		"<footer>
			<p>&copy Book-O-Rama LTD</p>
		</footer>";
	}
}
?>