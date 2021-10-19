<?php

    session_start();
    // connect to database
    require 'partials/connect.php';

    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userID = $_POST['userID'];
    $userRole = $_POST['userRole']; //use 1 for admin

    //add checker if password and confrim password matched
    $sql = "UPDATE user SET userFirst = '$fName', userLast = '$lName', userEmail = '$email', userPassword='$password', userRole='$userRole' WHERE user.userID = '$userID';";

    // set message depending on result
    if(!empty($mysqli->query($sql))){
        // echo json_encode('You have successfully updated your account.');
        $_SESSION['feedback'] = "You have successfully updated an account.";
    }else{
        $_SESSION['feedback'] = "Failed to update account.";
    }

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'users.php';
    header("Location: http://$host$uri/$extra");
?>