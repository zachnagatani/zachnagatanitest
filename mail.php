<?php

	$name = $_POST['name'];
	$email = $_POST['email'];
	$timeline = $_POST['timeline'];
	$budget = $_POST['budget'];
	$company = $_POST['company'];
	$website = $_POST['website'];
	$message = $_POST['message'];
	$formcontent="From: $name \n Email: $email \n Timeline: $timeline \n Budget: $budget \n Company: $company \n Website: $website \n Message: \n $message";
	$recipient = "zachnagatani@gmail.com";
	$subject = "Contact Form";
	$mailheader = "From: $email \r\n";
	mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
	echo "Thank You!";
?>