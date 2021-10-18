<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    // $id = "U001";

    // prepare sql statement
    $sql = "SELECT userID, userEmail, userPassword FROM user WHERE user.userEmail = '$email' AND user.userPassword = '$password';";

    // set message depending on result
    if(!empty($mysqli->query($sql))){
        // if($sql ->num_rows == 1){            
            // Define variables and initialize with empty values
    
            $results = $mysqli->query($sql)->fetch_object();
    
            $_SESSION["loggedin"] = true;
            $_SESSION['userID'] = $results->userID;
            // header("location: welcome.php"); todo verify
            echo json_encode('You have successfully updated your account details.');
        }else{
            echo json_encode('Cannot login. Please try again.');
        }
?>