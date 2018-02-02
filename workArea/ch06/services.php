<?php 
require_once("page.php");

class ServicePage extends Page
{
	private $row2buttons = array(
		"Re-engineering" => "reengineering.php",
		"Standarts Compliance" => "standarts.php",
		"Buzzword Compliance" => "buzzword.php",
		"Mission Statements" => "mission.php"
	);

	public function Display()
	{
		echo "
		<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<meta charset=\"UTF-8\">\n";
		$this->DisplayTitle();
		$this->DisplayKeywords();
		$this->DisplayStyles();
		echo "</head>\n<body>\n";
		$this->DisplayHeader();
		$this->DisplayMenu($this->buttons);
		$this->DisplayMenu($this->row2buttons);
		echo $this->content;
		$this->DisplayFooter();
		echo "</body>\n</html>";
	}
}

$services = new ServicePage();
$servicesContent = <<<END
<p>At TLA Consulting, we offer a number of services. Perhaps the productivity of your employees would improve if we re-engineered your business. Maybe all your business needs is a fresh mission statement, or a new batch of buzzwords.
</p>
END;

$services->content = $servicesContent;
$services->title = "TLA Services";
$services->Display();
?>