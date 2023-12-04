<?php
session_start();

require_once(dirname(__DIR__) . '/Handdler/connection.php');

if ($newSession->isUserExists()) {
    header("Location:dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user login page with oops</title>
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
    </div><br><br>
    <span id="error"></span>
    <span id="success"></span>
    <form id="loginPage" action="../Handdler/loginSubmit.php" method="post">
        <div>Email Id :
            <input class="input_field" type="text" name="email" value="">
        </div><br>
        <div>Password :
            <input class="input_field" type="text" name="password" value="">
        </div><br>
        <div>
            <button class="submit_btn" type="submit" name="userLogin" id="login" value="Login">Login</button>
        </div>
    </form>
</body>

</html>