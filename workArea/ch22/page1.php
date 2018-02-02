<?php 
session_start();

$_SESSION['session_var'] = "Hello World!";

echo 'The content of $_SESSION[\'session_var\'] is '.$_SESSION['session_var'].'<br>';
?>

<a href="page2.php">Next page</a>