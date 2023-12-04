<?php
session_start();

require_once(dirname(__FILE__) . '/connection.php');
// require "../Loginuser/index.php";

switch ($_SERVER["REQUEST_METHOD"] == 'POST') {

    case isset($_POST['adminLogin']):

        $adminName = trim($_POST['adminName']);
        $password = trim($_POST['password']);
        /** Return false if user is empty */
        if (empty($adminName)) {
            $newSession->setError('Please enter  adminName ');
            header("Location:../Admin/index.php");
            exit();
        }

        // Return false if password is empty
        if (empty($password)) {
            $newSession->setError('Enter your password ');
            header("Location:../Admin/index.php");
            exit();
        }
        if (!$GetDataClass->matchAdminNamePass($adminName, $password)) {
            $newSession->setError('Invalid Admin or password ');
            header("Location:../Admin/index.php");
            exit();
        }

        $newSession->setAuthId("1");
        $newSession->setAuthName($adminName);
        $newSession->setMessage('Login successful');
        header("Location:../Admin/dashboard.php");
        break;


    case isset($_POST['userLogin']):

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($email)) {
            $newSession->setError('Please enter emailId ');
            header("Location:../Loginuser/index.php");
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $newSession->setError('You have entered valid email');
            header("Location:../Loginuser/index.php");
            exit();
        }
        // Return false if password is empty
        if (empty($password)) {
            $newSession->setError('Enter your password ');
            header("Location:../Loginuser/index.php");
            exit();
        }

        if ($GetDataClass->loginUser([
            'email' => $email,
            'password' => $password,
        ])) {
            $newSession->setUserId(1);
            $newSession->setMessage('Login successful');
            header("Location:../Loginuser/dashboard.php?email=$email");
            exit();
        }
        $newSession->setError('Invalid email or password ');
        header("Location:../Loginuser/index.php");
        exit();

        $newSession->setError('Something went wrong');
        header("Location:../Loginuser/index.php");
        exit();
}
