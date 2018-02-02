<?php 
require_once('../page.php');

$submit = new Page();
$submit->title = 'Site Submission Results';

$submit->content = '<h1>Site Submission Results</h1>';

function html($tag,$text)
{
	return '<'.$tag.'>'.$text.'</'.$tag.'>';
}

// extract form fields
$url = $_POST['url'];
$email = $_POST['email'];

// check the URL
$url = parse_url($url);
$host = $url['host'];

if (!($ip = gethostbyname($host))) {
	$submit->content .= 'Host for URL does not have valid IP address.';
	$submit->Display();
	exit;
}

$submit->content .= 'Host ('.$host.') is at IP '.$ip.'<br>';

// Check the email adress
$email = explode('@',$email);
$emailhost = $email[1];

if (!getmxrr($emailhost,$mxhostsarr)) {
	$submit->content .= 'Email address is not at valid host.';
	$submit->Display();
	exit;
}

$submit->content .= 'Email is delivered via: <br>
	<ul>';

foreach ($mxhostsarr as $mx) {
	$submit->content .= '<li>'.$mx.'<li>';
}
$submit->content .= '</ul>';

// If reached here, all ok
$submit->content .= html('p','All submitted details are ok.');
$submit->content .= html('p','Thank you for submitting your site. It will be visited by one of our staff members soon.');


$submit->Display();
?>