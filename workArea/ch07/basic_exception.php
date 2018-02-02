<?php 
try {
	throw new Exception("A terrible error has occured", 42);
	
} catch (Exception $e) {
	echo "Exception ".$e->getCode().": ".$e->getMessage()."<br>".
		" in ".$e->getFile()." on line ".$e->getLine()."<br>";
}
?>