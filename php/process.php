<?php

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
	$name = $_POST['name'];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG . = "Email is required ";
} else {
	$email = $_POST['email'];
}

//TIMELINE
if (empty($_POST["timeline"])) {
    $errorMSG .= "Timeline is required ";
} else {
	$timeline = $_POST['timeline'];
}

// BUDGET
if (empty($_POST["budget"])) {
    $errorMSG .= "Budget is required ";
} else {
	$budget = $_POST['budget'];
}


$company = $_POST['company'];

$website = $_POST['website'];

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
	$message = $_POST['message'];
 }

$EmailTo = "zachnagatani@gmail.com";
$Subject = "New Project Inquiry Received";
 
// prepare email body text
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
 
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";

$Body .= "Timeline: ";
$Body .= $timeline;
$Body .= "\n";

$Body .= "Budget: ";
$Body .= $budget;
$Body .= "\n";

$Body .= "Company: ";
$Body .= $company;
$Body .= "\n";

$Body .= "Website: ";
$Body .= $website;
$Body .= "\n";
 
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
 
// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);
 
// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>