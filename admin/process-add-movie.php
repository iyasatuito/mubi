<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $movTitle = $_POST['movTitle'];
    $movDescription = $_POST['movDescription'];
    $movDirector = $_POST['movDirector'];
    $movActor = $_POST['movActor'];
    $movDuration = '120';    
    $movHero = 'default-hero.jpg';
    $movBanner = 'default-banner.jpg';
    $movPoster = 'default-poster.jpg';
    $movID = $_POST['movieID'];
    $trailer =  $_POST['trailer']; //must be utube id
    $isFeature = $_POST['isFeatured']; 
    $isScreening = $_POST['isScreening'];

    $sql = "INSERT INTO movie VALUES ('$movID','$movTitle','$movDescription','$movDirector','$movActor','$movDuration', '$movHero', '$movBanner', '$movPoster', '$trailer', '$isFeature', '$isScreening');";

    if(!empty($mysqli->query($sql))){          
        header("location: movies.php");
    } else {
        echo json_encode('Cannot update. Please try again.');
    }
?>