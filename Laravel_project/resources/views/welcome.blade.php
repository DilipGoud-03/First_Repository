<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $name = $_GET['name'];
    $email = $_GET['email'];
    ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php echo $name ?>
                </td>
                <td>
                    <?php echo $email ?>
                </td>
            </tr>
        </tbody>



    </table>

</body>

</html>