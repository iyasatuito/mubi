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
    $trailer =  $_POST['trailer']; 
    $isFeatured = $_POST['isFeatured'];
    $isScreening = $_POST['isScreening']; 

    //add checker if password and confrim password matched
    $sql = "UPDATE movie SET movieID ='$movID', movieTitle ='$movTitle', movieDescription ='$movDescription', movieDirector = '$movDirector', movieActor = '$movActor',movieDuration = '$movDuration', movieBanner = '$movBanner', moviePoster = '$movPoster', movieTrailer = '$trailer', isFeatured = '$isFeatured', isScreening = '$isScreening' WHERE movie.movieID = '$movID';";

    // set message depending on result
    if(!empty($mysqli->query($sql))){
        header('Location: ' . 'movies.php');
    } else {
        echo json_encode('Cannot login. Please try again.');
    }
?>