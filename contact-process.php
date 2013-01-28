<?php

	/*
	
	Template Name: contact-process
	
	*/

?>

<?php
if(isset($_POST['submitted'])) {
	$name = $_POST['fullname'];
	$email = $_POST['email'];
	$type = $_POST['type'];
	$email_text = "";
	
	if ($name != "") {
		$email_text.="\nFull Name: ".stripcslashes($name);
	}
	
	if ($email != "") {
		$email_text.="\nEmail Address: ".stripcslashes($email);
	}
	
	if ($type != "") {
		$email_text.="\nProject Type: ".stripcslashes($type);
	}
	
	
	$to = "leo@saforian.com";//"info@wagnerskis.com";
	$subject = "Message From Portfolio Site";
	$headers = "From: $name <$email>\n";
	mail($to, $subject, $email_text, $headers);
} else {
	header("Location: http://billyfrench.com");
}
?>