<?php
session_start();
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
    <title>User listing table</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
    </script>
    <script>
        $(document).ready(function() {
            $(".Delete").click(function() {
                $(this).parent(".Action").hide();
            });

            $("#table").DataTable({
                ordering: false


            });
        });
    </script>
    <style>
        div {
            text-align: center;
            font-size: large;


        }

        #table {
            text-align: justify;

        }

        thead {
            background-color: lightslategrey;
            color: wheat;

        }

        th {
            border: black;
            font-weight: 600;
            border: 1px solid black;
        }

        td {
            background-color: lightblue;
            border: black;
            font-weight: 600;
            border: 1px solid black;
        }

        .Action {
            word-spacing: 12px;
        }

        .Delete {
            color: black;
            background-color: #F94C10;
            border: 1px solid black;
            font-weight: bold;
            border-radius: 5px;
            font-size: 20px;
            width: 40px;
            text-decoration-line: none;


        }

        .Edit {
            color: black;
            background-color: blue;
            border: 1px solid black;
            font-weight: 700;
            border-radius: 5px;
            font-size: 20px;
            width: 40px;
            text-decoration-line: none;
        }

        p {
            text-align: center;
            color: darkblue;
            font-weight: 800;
            font-size: 20px;
        }

        .back {
            margin: 12px;
            color: black;
            float: right;
            font-weight: 700;
            border-radius: 5px;
            font-size: 20px;
            width: 80px;
            text-decoration-line: none;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="Dashboard.php">Home</a></li>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="notification.php"><span class="glyphicon glyphicon-user"></span>Message</a></li>
                </li>
            </ul>
        </div>
    </nav>
    <h2>User Listing Table</h2>
    <?php
    if ($newSession->hasError()) {
        echo $newSession->getError();
        $newSession->removeError();
    }
    if ($newSession->hasMessage()) {
        echo $newSession->getMessage();
        $newSession->removeMessage();
    }
    ?>

    <?php
    $myData = file_get_contents(dirname(__DIR__) . '/Handdler/JsonData/data.json');
    $myObject = json_decode($myData, true);


    ?>
    <table id="table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $row = 1;
            foreach ($myObject as $key => $item) {
                echo "<tr>";
                echo " <td>{$row}</td>";
                $row++;
            ?>
                <td><?php echo $myObject[$key]['name']; ?></td>
                <td><?php echo $myObject[$key]['email']; ?></td>
                <td><?php echo $myObject[$key]['password']; ?></td>
                <td><?php echo $myObject[$key]['status']; ?></td>
                <?PHP
                if (($myObject)) {
                ?>
                    <td class="Action">
                        <a class="Edit" href="updateUserInfoIndex.php?id=<?php echo $myObject[$key]['id']; ?>">Update</a>
                        <a class="Delete" href="removeUser.php?id=<?php echo $myObject[$key]['id']; ?>">Delete</a>
                    </td>
            <?php
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>