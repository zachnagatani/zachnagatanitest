<?php

$name = $_POST['name'];
$email = $_POST['email'];
$timeline = $_POST['timeline'];
$budget = $_POST['budget'];
$company = $_POST['company'];
$website = $_POST['website'];
$message = $_POST['message'];
 
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
if ($success){
   echo "success";
}else{
    echo "invalid";
}

?>