<?php
session_start();
include 'define_lang.php';
include 'lang_strings.php';
require_once('../page.php');
defineStrings();

$langSel = new Page();
$langSel->lang = LANGCODE;
$langSel->charset = CHARSET;
$langSel->title = WELCOME_TXT;

$langSel->content =
	"<h1>".WELCOME_TXT."</h1>".
	"<h2>".CHOOSE_TXT."</h2>".
	"<ul>".
		"<li><a href =\"". $_SERVER['PHP_SELF']."?lang=en"."\">en</a></li>".
		"<li><a href =\"". $_SERVER['PHP_SELF']."?lang=ja"."\">ja</a></li>";

$langSel->Display();
?>
