<?php 
require_once('../page.php');

$ftp = new Page();
$ftp->title = 'Mirror Update';

$ftp->content = '<h1>Mirror Update</h1>';

// set up variables = change these suit application
$host = 'apache.cs.utah.edu';
$user = 'anonymous';
$password = 'me@example.com';
$remotefile = '/apache.org/httpd/httpd-2.4.16.tar.gz';
$localfile = '/path/to/files/httpd-2.4.16.tar.gz';

// connect to host
$conn = ftp_connect($host);

if (!$conn) {
	$ftp->content .= 'Error: Could not connect to '.$host;
}

$ftp->Display();
?>