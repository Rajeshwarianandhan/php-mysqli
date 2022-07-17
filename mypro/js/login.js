$(document).ready(function() {


    $("#signin").click(function() {


        const email = $("#email").val();
        const password = $("#password").val();

        if (email == '' || password == '') {
            alert("All fields are required");
        } else {

            $.ajax({
                url: "./php/login.php",
                type: "post",
                data: $("#signin-form").serialize(),
                dataType: "JSON",
                success: function(d) {
                    if (d.status == 'success') {
                        // alert("Login success");
                        window.location = "home.html";
                    } else if (d.status == 'emailError') {
                        // alert("Given Email is not found!");
                        $("#emailError").html("Given Email is not found!");
                        $("#emailError").css("color", "red");
                    } else {
                        // alert("Incorrect Password")
                        $("#passError").html("Incorrect Password!");
                        $("#passError").css("color", "red");
                    }
                    // $("#signin-form")[0].reset();
                }

            });

        }

    });
});