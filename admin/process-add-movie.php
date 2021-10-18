<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $movTitle = $_POST['movTitle'];
    $movDescription = $_POST['movDescription'];
    $movDirector = $_POST['movDirector'];
    $movActor = $_POST['movActor'];
    $movDuration = $_POST['movDuration'];
    $movBanner = $_POST['movBanner'];
    $movPoster = $_POST['movPoster'];
    $movID = "M009"; //must be generated
    $trailer =  $_POST['trailer']; //must be url
    $isFeature =  1; //add converter to boolean

    //add checker if password and confrim password matched
    $sql = "INSERT INTO movie VALUES ('$movID','$movTitle','$movDescription','$movDirector','$movActor','$movDuration', '$movBanner', '$movPoster', '$trailer', '$isFeature');";

    // set message depending on result
    if(!empty($mysqli->query($sql))){
    // if($sql ->num_rows == 1){            

        $_SESSION["loggedin"] = true;
        $_SESSION['userID'] = $results -> userID;
        // header("location: welcome.php"); todo verify
        echo json_encode('You have successfully updated your account.');
    } else {
        echo json_encode('Cannot update. Please try again.');
    }
?>