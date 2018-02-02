<?php 

class Page
{
	public $lang = "en";
	public $charset = "UTF-8";
	public $title = 'Enter title';
	public $keywords = 'Some keywords';
	public $styles = 'styles.css';
	public $content;
	public $footer = "<footer>
			<p>&copy ENTER FOOTER</p>
		</footer>";

	public function __set($name,$value)
	{
		$this->$name = $value;
	}
	public function Display()
	{
		echo 
		"<!DOCTYPE html>\n<html lang=\"".$this->lang."\">\n<head>\n<meta charset=\"".$this->charset."\">\n";
		$this->DisplayTitle();
		$this->DisplayKeywords();
		$this->DisplayStyles();
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
		// echo 
		// "<header>
		// 	<h1> $this->title</h1>
		// </header>";
	}
	public function DisplayContent()
	{
		echo $this->content;
	}
	public function DisplayFooter()
	{
		echo $this->footer;		
	}
}
?>