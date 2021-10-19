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

    //add checker if password and confrim password matched
    $sql = "UPDATE user SET userFirst = '$fName', userLast = '$lName', userEmail = '$email' WHERE user.userID = '$userID';";

    // set message depending on result
    if(!empty($mysqli->query($sql))){
    // if($sql ->num_rows == 1){            

        $_SESSION["loggedin"] = true;
        $_SESSION['userID'] = $results -> userID;
        // header("location: welcome.php"); todo verify
        echo json_encode('You have successfully updated your account.');
    }else{
        echo json_encode('Cannot login. Please try again.');
    }
?>