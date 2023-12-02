<?php
require_once(dirname(__DIR__) . '/Handdler/connection.php');

if ($_SERVER["REQUEST_METHOD"] !== 'POST') {

    $newSession->setError('Something went wrong');
    header("Location:updateUserInfroSubmit.php");
    exit();
}
$id = $_POST['id'];
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($email)) {
    $newSession->setError('Please enter emailId ');
    header("Location:updateUserInfroSubmit.php");
    exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $newSession->setError('You have entered valid email');
    header("Location:updateUserInfroSubmit.php");
    exit();
}
if (empty($password)) {
    $newSession->setError('Enter your password ');
    header("Location:updateUserInfroSubmit.php");
    exit();
}

if ($GetDataClass->updateUser($id, [
    'name' => $name,
    'email' => $email,
    'password' => $password,
])) {
    $newSession->setMessage('Upadate successful');
    header("Location:userListing.php");
    exit();
}
$newSession->setError('Invalid email or password ');
header("Location:updateUserInfroSubmit.php");
exit();
