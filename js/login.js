$(function() {
    $("#btn_login").click(function () {
        $.ajax({
                type: "POST",
                url: "php/check_login.php",
                data: {
                    email: $("#emailAddress").val()
                }
            })
            .done(function (rows_returned) {
                if(parseInt(rows_returned,10) > 0) {
                    console.log("Account found!");
                    window.location.replace("home.php");
                } else {
                    console.log("Account NOT found!");
                }
            });
    });
});
