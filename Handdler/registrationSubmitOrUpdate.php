<?php
require_once(dirname(__FILE__) . '/connection.php');
// include "../Admin/userListing.php";

switch ($_SERVER["REQUEST_METHOD"] == 'POST') {

    case isset($_POST['userRegister']):
        $firstName = trim($_POST['firstName']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Return false if firstName is empty
        if (empty($firstName)) {
            $newSession->setError("Enter your first name");
            header("Location:../UserRegister/index.php");
            exit();
        }
        // Return false if email is empty
        if (empty($email)) {
            $newSession->setError("Enter your email");
            header("Location:../UserRegister/index.php");
            exit();
        }
        if ((!filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $newSession->setError("You Entered Invalid Email");
            header("Location:../UserRegister/index.php");
            exit();
        }
        // Return false if password is empty
        if (empty($password)) {
            $newSession->setError("Enter your password");
            header("Location:../UserRegister/index.php");
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
            header("Location:../UserRegister/index.php");
            exit;
        }
        $newSession->setError("Something went wrong");
        header("Location:../UserRegister/index.php");
        exit();



        // User Edit 
    case isset($_POST['userEdit']):

        $id = $_POST['id'];
        $name = trim($_POST['firstName']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $status = trim($_POST['status']);
        if (empty($email)) {
            $newSession->setError('Please enter your Name ');
            header("Location:../Loginuser/updateUserInfoIndex.php");
            exit();
        }
        if (empty($email)) {
            $newSession->setError('Please enter emailId ');
            header("Location:../Loginuser/updateUserInfoIndex.php");
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $newSession->setError('You have entered valid email');
            header("Location:../Loginuser/updateUserInfoIndex.php");
            exit();
        }
        if (empty($password)) {
            $newSession->setError('Enter your password ');
            header("Location:../Loginuser/updateUserInfoIndex.php");
            exit();
        }

        if ($GetDataClass->updateUser($id, [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'status' => $status,
        ])) {
            $newSession->setMessage('Upadate successful');
            header("Location:../Loginuser/userListing.php?email=$email");
            exit();
        }
        $newSession->setError('User Information does not Updated');
        header("Location:../Loginuser/userListing.php?email=$email");
        exit();


    case isset($_POST['adminEdit']):


        $id = $_POST['id'];
        $name = trim($_POST['firstName']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $status = trim($_POST['status']);
        if (empty($name)) {
            $newSession->setError('Please enter your Name');
            header("Location:../Admin/updateUserInfoIndex.php");
            exit();
        }
        if (empty($email)) {
            $newSession->setError('Please enter emailId ');
            header("Location:../Admin/updateUserInfoIndex.php");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $newSession->setError('You have entered valid email');
            header("Location:../Admin/updateUserInfoIndex.php");
            exit();
        }
        if (empty($password)) {
            $newSession->setError('Enter your password ');
            header("Location:../Admin/updateUserInfoIndex.php");
            exit();
        }

        if ($GetDataClass->updateUser($id, [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'status' => $status,
        ])) {
            $newSession->setMessage('Upadate successful');
            header("Location:../Admin/userListing.php");
            exit();
        }
        $newSession->setError('User information does not updated');
        header("Location:../Admin/userListing.php");
        exit();
}
