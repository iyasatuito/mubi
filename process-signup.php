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
          
            $_SESSION["loggedin"] = true;
            $_SESSION['userID'] = $userID;
            header("location: index.php");
        }else{
            echo json_encode('Cannot login. Please try again.');
        }
    } else {
        echo json_encode('Passwords do not match');
        // header("location: signup.php");
    }

?>