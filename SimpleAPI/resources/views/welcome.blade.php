<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>store Data with Ajax</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class=" mt-5">
        <div class="container card w-50">
            <div class="card-header">
                Register Books Here
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="booksName" class="form-label">Book Name:</label>
                        <input type="text" class="form-control" id="booksName" name="booksName" value="{{old('booksName')}}">
                    </div>
                    <div class="mb-3">
                        <label for="autherName" class="form-label">Auther Name :</label>
                        <input type="text" class="form-control" id="autherName" name="autherName" value="{{old('autherName')}}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>