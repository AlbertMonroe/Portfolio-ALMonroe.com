<?php

while (list($key, $val) = @each($_GET)) $GLOBALS[$key] = $val;
while (list($key, $val) = @each($_POST)) $GLOBALS[$key] = $val;
while (list($key, $val) = @each($_COOKIE)) $GLOBALS[$key] = $val;
while (list($key, $val) = @each($_FILES)) $GLOBALS[$key] = $val;
while (list($key, $val) = @each($_SESSION)) $GLOBALS[$key] = $val;

/* Subject and Email Variables */

	$emailSubject = 'Contact Form';
	$webMaster = 'mailto: alrmonroe@yahoo.com';
	
/* Gathering Data Variables */

	$nameField = $_POST['name'];
	$emailField = $_POST['Email'];
	$messageField = $_POST['Message'];
	
$body = <<<EOD
<br><hr><br>
Name: $nameField <br>
Email: $emailField <br>
Message: $messageField <br>
EOD;

$headers = "From: $email\r\n";
$headers .= "Content-type: text/html\r\n";
$success = mail($webMaster, $emailSubject, $body, $headers);
	
/* Results Rendered as HTML */
$theResults = <<<EOD

<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><br />
<meta HTTP-EQUIV="REFRESH" content="3; url=http://almonroe.com">

<style type="text/css">
	body {
	background-color: #f1f1f1;
	color: #555;
	font-size: 24px;
	font-family: verdana, arial;
	}  
</style>

</head>

<body>
<div align="left">
Thank You, Your Message Has Been Sent.<br>
Redirecting To Home Page...</div>
</body>
</html>
EOD;
echo "$theResults";

?>