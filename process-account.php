<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = "U001";

    // echo $title;
    // echo $description;
    // echo $id;

    // prepare sql statement
    $statement = "UPDATE user
        SET userFirst = '$fname',
            userLast = '$lname',
            userEmail = '$email',
            userPassword = '$password'
        WHERE userID='$id'";

    // set message depending on result
    if($mysqli->query($statement) === TRUE){
        echo json_encode($fname);
    }else{
        echo json_encode('Update failed.');
    }

    //$mysqli->close();

    // redirect to review page
    // $host  = $_SERVER['HTTP_HOST'];
    // $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    // $extra = 'account.php';
    // header("Location: http://$host$uri/$extra");

?>