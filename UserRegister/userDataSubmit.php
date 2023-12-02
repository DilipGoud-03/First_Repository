<?php
session_start();
require_once(dirname(__DIR__) . '/Handdler/connection.php');
if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    $newSession->setError("Something went wrong");
    header("Location:user_registration.php");
    exit();
}
$firstName = trim($_POST['firstName']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Return false if firstName is empty
if (empty($firstName)) {
    $newSession->setError("Enter your first name");
    header("Location:user_registration.php");
    exit();
}
// Return false if email is empty
if (empty($email)) {
    $newSession->setError("Enter your email");
    header("Location:user_registration.php");
    exit();
}
if ((!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    $newSession->setError("You Entered Invalid Email");
    header("Location:user_registration.php");
    exit();
}
// Return false if password is empty
if (empty($password)) {
    $newSession->setError("Enter your password");
    header("Location:user_registration.php");
    exit();
}
if (!empty($firstName)  && !empty($email) && !empty($password)) {
    $GetDataClass->createNewUser([
        'name' => $firstName,
        'email' => $email,
        'password' => $password,
        'status' => true
    ]);
    $newSession->setMessage("Registration Successfull");
    header("Location:user_registration.php");
    exit;
}
