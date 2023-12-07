<html>

<head>
    <title>Form Example</title>
</head>

<body>
    <form action="user" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" /></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Register" />
                </td>
            </tr>
        </table>

    </form>
</body>

</html>