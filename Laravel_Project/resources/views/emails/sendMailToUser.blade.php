<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body class="bg-red-100">
    <div class="container">
        <div class="space-y-4 mb-6">
            <h1 class="text-4xl fw-800">Hello {{$sendMailData['name']}}, Thank you for registring over website</h1>
        </div>
        <div class="card rounded-3xl px-4 py-8 p-lg-10 mb-6">
            <p class="text-center ">Your Information</p>
            <table class="p-2 w-full">
                <tbody>
                    <tr>
                        <td>Your Name </td>
                        <td class="text-right">{{$sendMailData['name']}}</td>
                    </tr>
                    <tr>
                        <td>Email id </td>
                        <td class="text-right">{{$sendMailData['email']}}</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td class="text-right">{{$sendMailData['password']}}</td>
                    </tr>
                </tbody>
            </table>
            <hr class="my-6">
            <h3>The Admin one's you verify then you can login our website </h3>
            <p>We have One request to you Please keep save this mail for Password, If you forget Password then you enable to login website </p>
        </div>
    </div>

</body>

</html>