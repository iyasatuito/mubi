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
    $movID = $_POST['movieID'];
    $trailer =  $_POST['trailer']; //must be url
    $isFeatured =  1; //add converter to boolean

    //add checker if password and confrim password matched
    $sql = "UPDATE movie SET movieID ='$movID', movieTitle ='$movTitle', movieDescription ='$movDescription', movieDirector = '$movDirector', movieActor = '$movActor',movieDuration = '$movDuration', movieBanner = '$movBanner', moviePoster = '$movPoster', movieTrailer = '$trailer', isFeatured = '$isFeatured' WHERE movie.movieID = '$movID';";

    // set message depending on result
    if(!empty($mysqli->query($sql))){
     
        // header("location: welcome.php"); todo verify
        echo json_encode('You have successfully updated your account.');
    } else {
        echo json_encode('Cannot login. Please try again.');
    }
?>