<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo 'success';
session_start();
include('connection.php');

$missingUsername = "<p><strong>Pease enter a username</strong></p>";
$missingEmail = "<p><strong>Please Enter an Email</strong></p>";
$invalidEmail = "<p><strong>Please enter a valid email</strong></p>";
$missingPassword = "<p><strong>Please enter a password</strong></p>";
$invalidPassword = "<p><strong>Password should be atleast six xharacters long and includ e one capital letter and one number</strong></p>";
$differentPassword = "<p><strong>password don't match!</strong></p>";

if((empty($_POST["username"]))){
    $errors .= $missingUsername;
    
} else {
   $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}

if(empty($_POST["email"])){
    $errors.=$missingEmail;
} else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors.=$invalidEmail;
    }
}
    
if(empty(($_POST["password"]))){
    $errors.=$missingPassword;
}elseif (!strlen($_POST["password"])>6 and preg_match('/[A-z]/', $_POST["password"]) and preg_match('/[0-9]/', $_POST["password"])){
    $errors.= $invalidPassword;
    
}
 else {
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
}

if(empty(($_POST["password2"]))){
    $errors.="<p><strong>Re enter password</strong></p>";
            
}
 else {
  $password2 =  filter_var($_POST["password2"], FILTER_SANITIZE_STRING);    
}
if($password != $password2){
    $errors.=$differentPassword;
}

if($errors){
    $resultMessage = '<div class = "alert alert-danger alert-dismissible">'.$errors.'</div>';
echo $resultMessage;
exit;
}


// prepare variables for databse

$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);
$password = hash('sha256',$password);
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class = "alert alert-danger">Error running the query</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results>0){
   echo "<div class = 'alert alert-danger alert-dismissible'>that username is already register. do you want to login</div>";   exit;
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class = "alert alert-danger alert-dismissible">Error running the query</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results>0){
   echo "<div class = 'alert alert-danger alert-dismissible'>that email is already register. do you want to login</div>";   exit;
}

// create a unique activation code
$activationCode = bin2hex(openssl_random_pseudo_bytes(16)); 

//insert user details in to the table

$sql = "INSERT INTO users (username, email, password, activation) VALUES ('$username', '$email', '$password', '$activationCode')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class = "alert  alert-danger alert-dismissible">There was an error inserting the records into the database</div>';
    exit;
}


//send email to user
$headers = 'From: larrie4christ@gmail.com';
$subject = "Confirm your registration ";
$message = "Please click on this link to activate your account: \n\n";
$message .= "http://mycodershift.host20.uk/myonlinenote/activate.php?email=".urlencode($email)."&key=$activationCode";
if(mail($email, $subject, $message, $headers)){
        echo "<div class = 'alert  alert-success alert-dismissible'>Thanks for registration, a confirmation email has been sent to $email. Please click on the activation link in the mail to activate your account. <br /> Check your SPAM folder if mail absent on inbox.</div>";
        exit;
}
 else {
        echo '<div class = "alert  alert-danger alert-dismissible">There was an error inserting the records into the database</div>';

}
