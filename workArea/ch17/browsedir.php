<?php 
require_once('../page.php');

$brDir = new Page();

$brDir->title = 'Browse Directorries';
$content = $brDir->html('h1','Browsing');

$current_dir = '../uploads/';
$dir = opendir($current_dir);

$content .= <<<END
<p>Upload directory is '.$current_dir.'</p>	
<p>Directory Listing:</p><ul>
END;

while (false !== ($file = readdir($dir))) {
	// strip out two entries of . and ..
	if ($file != "." && $file != "..") {
		$content .= '<li>'.$file.'</li>';
	}
}
$content .= '</ul>';
closedir();

$brDir->content .= $content;
$brDir->Display();
?>