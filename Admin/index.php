<?php

require(dirname(__DIR__) . '/Handdler/connection.php');

if ($newSession->isAuthExists()) {
    header("Location:Dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        * {
            max-width: 600px;
            margin: auto;

        }

        form {

            width: 200px;
            /* font-size: 20px; */
            text-align: center;
            width: 330px;
            height: 210px;
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
            background-color: lightskyblue;
            color: black;
            border: 2px solid black;
            border-radius: 9px;
            cursor: pointer;

        }

        .errorMsg {
            margin-top: 100px;
            color: red;
            text-align: center;
        }

        span {
            color: red;
        }
    </style>
</head>

<body>
    <div class="errorMsg">
        <?php
        if ($newSession->hasError()) {
            echo $newSession->getError();
            $newSession->removeError();
        }
        ?>
    </div>

    <form id="loginPage" action="loginSubmit.php" method="post">
        <div>Admin :
            <input class="input_field" type="text" name="adminName" value="">
        </div><br>
        <div>Password :
            <input class="input_field" type="password" name="password" value="">
        </div><br>
        <div>
            <button class="submit_btn" type="submit" name="Login" id="login" value="Login">Login</button>
        </div>
    </form>
</body>

</html>