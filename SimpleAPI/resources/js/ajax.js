$('#loginSubmit').submit(function () {
    var formData = $("#booksSubmit").serialize();
    $.ajax({
        url: "{{route('store')}}",
        type: "POST",
        data: {
            type: formData,
            name: Booksname,
            auther: authername,
            publish_date: booksPublishDate
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.Condition1 == true) {

                alert("Login Successful !");
                location.href = "Dashboard.php";
            } else if (dataResult.Condition2 == false) {

                alert("invalid email or password");
                location.href = "login.php";
            }
        },
    });
});