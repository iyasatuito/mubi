<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confPassword = $_POST['confPassword'];
    $userID = $_SESSION['userID'];
    $userRole = 0; //use 1 for admin

    if($confPassword==$password){
        //add checker if password and confrim password matched
        $sql = "UPDATE user SET userFirst = '$fName', userLast = '$lName', userEmail = '$email' WHERE user.userID = '$userID';";

        // set message depending on result
        if(!empty($mysqli->query($sql))){
            $_SESSION['feedback'] = "You have successfully updated your account.";
        }else{
            $_SESSION['feedback'] = "Cannot login. Please try again.";
        }
    } else {
        $_SESSION['feedback'] = "Passwords do not match.";
    }   

    // redirect to review page
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'edit-account.php';
    header("Location: http://$host$uri/$extra");
?>