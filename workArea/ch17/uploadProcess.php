<?php 
require_once('../page.php');

$upProcess = new Page();
$upProcess->title = 'Uploading File...';
$upProcess->content = '<h1>Uploading File...</h1>';

if ($_FILES['the_file']['error'] > 0) {
	$upProcess->content .= 'Problem: ';
	switch ($_FILES['the_file']['error']) {
		case 1:
			$upProcess->content .= 'File exceeded upload_max_filesize.';
			break;
		case 2:
			$upProcess->content .= 'File exceeded max_file_size';
			break;
		case 3:
			$upProcess->content .= 'File only partially uploaded.';
			break;
		case 4:
			$upProcess->content .= 'No file uploaded.';
			break;
		case 6:
			$upProcess->content .= 'Cannot uploadfile: No temp directory specified.';
			break;
		case 7:
			$upProcess->content .= 'Upload failed: Cannot write to disc.';
			break;
		case 8:
			$upProcess->content .= 'A PHP extension blocked the file upload.';
			break;
	}
	$upProcess->Display();
	exit;
}

// Does the filehave the right MIME type?
if ($_FILES['the_file']['type'] != 'image/png') {
	$upProcess->content .= 'Problem: file is not a PNG image.';
	$upProcess->Display();
	exit;
}

// put the file where we'd like it
$uploaded_file = '../uploads/'.basename($_FILES['the_file']['name'],".png");

if (is_uploaded_file($_FILES['the_file']['tmp_name'])) {
	if (!move_uploaded_file($_FILES['the_file']['tmp_name'],$uploaded_file)) {
			$upProcess->content .= 'Problem: Could not move file to destination directory.';
			$upProcess->Display();
			exit;
	}
} else {
	$upProcess->content .= 'Problem: Possible file upload attack. Filename: ';
	$upProcess->content .= $_FILES['the_file']['name'];
	$upProcess->Display();
	exit;
}

$upProcess->content .= 'File uploaded successfully.';

// show what was uploaded
$upProcess->content .= '<p>You uploaded the following image:<br>';
$upProcess->content .= '<img src="/uploads/'.$_FILES['the_file']['name'].'"/>';

$upProcess->Display();
?>