<?php
session_start();
require_once(dirname(__DIR__) . '/Handdler/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udate Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        * {
            max-width: 600px;
            margin: auto;

        }

        form {
            margin-top: 10px;
            width: 200px;
            /* font-size: 20px; */
            text-align: center;
            width: 330px;
            height: 370px;
            border: 2px solid black;
            border-radius: 12px;
        }

        .input_field {
            margin-top: 20px;
            padding-left: 20px;
            border-radius: 12px;
            width: 200px;
            height: 30px;
        }

        .submit_btn {
            width: 80px;
            height: 35px;
            background-color: red;
            color: black;
            border: 2px solid black;
            border-radius: 9px;
            cursor: pointer;

        }

        .message {
            margin-top: 100px;
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>
    <div class="message">
        <?php
        if ($newSession->hasError()) {
            echo $newSession->getError();
            $newSession->removeError();
        }
        if ($newSession->hasMessage()) {
            echo $newSession->getMessage();
            $newSession->removeMessage();
        }
        $id = $_GET['id'];
        $userData = $GetDataClass->find($id);
        ?>
    </div>
    <form id="loginPage" action="../Handdler/registrationSubmitOrUpdate.php" method="post">
        <div>Register Here</div>
        <input class="input_field" type="hidden" name="id" id="user" value="<?php echo $userData['id']; ?>">
        <div>First_Name :
            <input class="input_field" type="text" name="firstName" id="user" value="<?php echo $userData['name']; ?>">
        </div><br>
        <div>Email :
            <input class="input_field" type="text" name="email" id="user" placeholder="email" value="<?php echo $userData['email']; ?>">
        </div><br>
        <div>Password :
            <input class="input_field" type="password" name="password" id="password" placeholder="password" value="<?php echo $userData['password']; ?>">
            <input class="input_field" type="hidden" name="status" placeholder="password" value="<?php echo $userData['status']; ?>">
        </div><br>
        <div>
            <button class="submit_btn" type="submit" name="adminEdit" id="submit" value="submit">submit</button>
        </div>
    </form>

    <?php

    ?>
</body>

</html>