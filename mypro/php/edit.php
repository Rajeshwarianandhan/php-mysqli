<?php

include "config.php";

// $fname=$_POST["fname"];
// $lname=$_POST["fname"];
// $email=$_POST["email"];
// $password=$_POST["password"];
// $mobile=$_POST["mobile"];
// $dob=$_POST["dob"];

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])  && isset($_POST['password'])  && isset($_POST['mobile']) && isset($_POST['dob'])){

    session_start();
    $id = $_SESSION['id'];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $mobile =trim($_POST['mobile']);
    $dob = trim($_POST['dob']);

    $update="UPDATE user_new SET fname='$fname',lname='$lname',email='$email',password='$password',mobile='$mobile',dob='$dob' WHERE id='{$id}'";
    // $update="UPDATE users SET email='xyz@gmail.com' WHERE id='{$id}'";



    $result=mysqli_query($conn,$update);

    if($result){
        $_SESSION['id'] = $id;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['mobile'] = $mobile;
        $_SESSION['dob'] = $dob;

        $user = new stdClass();
        $user->fname = $_SESSION['fname'];
        $user->lname = $_SESSION['lname'];
        $user->email = $_SESSION['email'];
        $user->password = $_SESSION['password'];
        $user->mobile = $_SESSION['mobile'];
        $user->dob = $_SESSION['dob'];
        $user->id = $_SESSION['id'];

        $myJSON = json_encode($user);
        // session_start();
        $_SESSION['profileData'] = $myJSON;  
        $_SESSION['create'] = "Updated Successfully";

        echo json_encode(['status' => 'success']);
    

    }else{
        echo json_encode(['status' => 'error', 'message' => 'Update failure']);
    }

}




    




?>