<?php 
$str = 'яблоко';
$shaStr = sha1($str);
$isEqual = sha1($str);
if ($isEqual  === $shaStr) {
	echo "password is correct";
} else {
	echo "hash are not equeal<br>";
	echo "hash ".$isEqual."<br> !== hash <br>".$shaStr;
}
?>