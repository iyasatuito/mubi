<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = "U001";

    // prepare sql statement
    $statement = "UPDATE user
        SET userFirst = '$fname',
            userLast = '$lname',
            userEmail = '$email',
            userPassword = '$password'
        WHERE userID='$id'";

    // set message depending on result
    if($mysqli->query($statement) === TRUE){
        echo json_encode('You have successfully updated your account details.');
    }else{
        echo json_encode('Something went wrong. Please try again.');
    }
?>