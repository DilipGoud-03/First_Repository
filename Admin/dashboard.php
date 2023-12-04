<?php
require(dirname(__DIR__) . '/Handdler/connection.php');

if (!$newSession->isAuthExists()) {
    header("Location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Dashboard</title>
    <style>
        div {
            text-align: center;
            font-size: large;

        }

        .successMsg {
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="userListing.php">ShowUsers</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="notification.php"><span class="glyphicon glyphicon-user"></span>Message</a></li>
                <li class="active"><a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="successMsg">
        <?php
        if ($newSession->hasMessage()) {
            echo $newSession->getMessage();
            $newSession->removeMessage();
        }
        ?>
    </div><br>
    <div>
        <h2> Welcome : Admin </h2>
    </div>


</body>

</html>