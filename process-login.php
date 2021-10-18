<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // prepare sql statement
    $sql = "SELECT userID, userEmail, userPassword FROM user WHERE user.userEmail = '$email' AND user.userPassword = '$password';";
    $results = $mysqli->query($sql)->fetch_object();
    // set message depending on result
    if(!empty($results)){
    
            $_SESSION["loggedin"] = true;
            $_SESSION['userID'] = $results->userID;
            header("location: index.php");
        }else{
            echo json_encode('Cannot login. Please try again.');
        }
?>