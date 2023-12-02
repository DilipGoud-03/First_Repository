<?php
session_start();

require_once(dirname(__DIR__) . '/Handdler/connection.php');
// require(dirname(__FILE__) . '/loginCheck.php');
// $logincheck = new Logincheck("dilip", "1234");

if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    header("Location:index.php");
    exit();
}
$adminName = trim($_POST['adminName']);
$password = trim($_POST['password']);
/** Return false if user is empty */
if (empty($adminName)) {
    $newSession->setError('Please enter  adminName ');
    header("Location:index.php");
    exit();
}

// Return false if password is empty
if (empty($password)) {
    $newSession->setError('Enter your password ');
    header("Location:index.php");
    exit();
}
if (!$GetDataClass->matchAdminNamePass($adminName, $password)) {
    $newSession->setError('Invalid Admin or password ');
    header("Location:index.php");
    exit();
}

$newSession->setAuthId("1");
$newSession->setAuthName($adminName);
$newSession->setMessage('Login successful');
header("Location:Dashboard.php");
exit();
