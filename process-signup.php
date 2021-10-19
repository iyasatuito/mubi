<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confPassword = $_POST['confPassword'];
    $userID = $_POST['userID'];
    $userRole = 0; //default

    //add checker if password and confrim password matched
    if($password === $confPassword ){
    $sql = "INSERT INTO user VALUES ('$userID','$fName','$lName','$email','$password','$userRole');";
    $results = $mysqli->query($sql);

     // set message depending on result
     if(!empty($results)){ 

        $_SESSION['userID'] = $userID;
        $_SESSION['userRole'] = $userRole;
            header("location: home.php");
        }else{
            $_SESSION['signUpSuccess'] = false;
             header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $_SESSION['passwordError'] = true;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>