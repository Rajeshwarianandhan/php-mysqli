$(document).ready(function() {
    // alert("hello");

    $("#signup").click(function() {

        const fname = $("#fname").val();
        const lname = $("#lname").val();
        const email = $("#email").val();
        const password = $("#password").val();
        const mobile = $("#mobile").val();
        const dob = $("#dob").val();



        if (fname == '' || lname == '' || email == '' || password == '' || mobile == '' || dob == '') {
            alert("All fields are required");
        } else {


            $.ajax({
                url: "./php/index.php",
                type: "post",
                data: $("#form").serialize(),
                dataType: "JSON",
                success: function(d) {
                    if (d.status == 'success') {
                        // alert("register success");
                        window.location = "login.html";
                    } else if (d.status == 'error') {
                        alert("eGiven Email is already exist");
                    }
                    $("#form")[0].reset();
                }
            });

        }


    });
});