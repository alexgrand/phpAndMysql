<?php 
// class ClassName
// {
// 	public $attribute;
// 	function operation($param)
// 	{
// 		$this->attribute = $param;
// 		echo $this->attribute;
// 	}

// 	function __construct($param1)
// 	{
// 		echo "Constructor with parameter ".$param1."<br>";
// 	}
// }

// interface Displayable 
// {
// 	function display();
// }


// $a = new ClassName("First");
// $b = new ClassName("Second");


// trait fileLogger
// {
// 	public function logmessage($message,$level = 'DEBUG')		
// 	{
// 		echo "Your level is $level. $message";
// 	}
// }
// trait sysLogger
// {
// 	public function logmessage($message,$level='ERROR')
// 	{
// 		echo "Your level is $level. $message";
// 	}
// }


// class fileStorage 
// {
// 	use fileLogger, sysLogger 
// 	{
// 		fileLogger::logmessage insteadof sysLogger;
// 		sysLogger:: logmessage as private logsysmessage;
// 	}
// 	function store($data)
// 	{
// 		$this->logsysmessage($data);
// 	}
// }

// $a = new fileStorage();
// $a->store('some text <br>');
// $a->logmessage('lets try <br>');

// Using Per_class Constants

// class Math 
// {
// 	const pi = 3.14159;

// 	static function squared($input)
// 	{
// 		return $input*$input;
// 	}
// }

// echo "Math::pi = ".Math::pi."<br>";
// echo "Math::squared from 8 = ".Math::squared(8)."<br>";

//  Генераторы в PHP

// function nums()
// {
// 	echo "Generator has started<br>";
// 	for ($i=0; $i < 5; $i++) { 
// 		yield $i;
// 		echo "Returned $i<br>";
// 	}
// 	echo "The generator has ended<br>";
// }

// foreach (nums() as $key);

// NAMESPACES

require_once("orders.php");
$a = new orders\order();
$a->addOrder("1st order<br>");

function one_to_three()
{
	for ($i=0; $i <= 3; $i++) { 
		yield $i;
	}
}

$generator = one_to_three();
foreach ($generator as $value) {
	echo "$value\n";
}

echo gettype($generator);
?>
