<?php 
require_once('../page.php');

$flDetails = new Page();
$flDetails->title = 'File Details';

if (!isset($_GET['file'])) {
	$flDetails->content = "You have not specified a file name.";
} else {
	$uploads_dir = '../uploads/';

	// strip off directory information for security
	$the_file = basename($_GET['file']);

	$safe_file = $uploads_dir.$the_file;

	$flDetails->content = '<h1>Details of File: '.$the_file.'</h1>';

	$flDetails->content .= '<h2>File Data</h2>';
	$flDetails->content .= 'File Last Accessed: '.date("j F Y H:i", fileatime($safe_file)).'<br/>';
	$flDetails->content .= 'File Last Modified: '.date('j F Y H:i', filemtime($safe_file)).'<br/>';

	$flDetails->content .= 'File Permissions: '.filegroup($safe_file).'<br>';
	$flDetails->content .= 'File Type: '.filetype($safe_file).'<br>';
	$flDetails->content .= 'File Size: '.filesize($safe_file).' bytes<br>';

	$flDetails->content .= '<h2>File Tests</h2>';
	$flDetails->content .= 'is_dir: '.(is_dir($safe_file)? 'true' : 'false').'<br>';
	$flDetails->content .= 'is_exutable: '.(is_executable($safe_file)?'true' : 'false').'<br>';
	$flDetails->content .= 'is_file: '.(is_file($safe_file)? 'true' : 'false').'<br/>';
	$flDetails->content .= 'is_link: '.(is_link($safe_file)? 'true' : 'false').'<br/>';
	$flDetails->content .= 'is_readable: '.(is_readable($safe_file)? 'true' : 'false').'<br/>';
	$flDetails->content .= 'is_writable: '.(is_writable($safe_file)? 'true' : 'false').'<br/>';

	$flDetails->content .= '<h2>STAT:</h2>';
	$statArr = stat($safe_file);

	for ($i=0; $i < count($statArr); $i++) { 
		switch ($i) {
			case '0':
				$flDetails->content .= 'Номер устройства: '.$statArr[$i].'<br>';
				break;
			case '2':
				$flDetails->content .= 'Режим защиты inode: '.$statArr[$i].'<br>';
				break;
		}
	}
}


$flDetails->Display();
?>