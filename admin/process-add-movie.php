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
        $_SESSION['feedback'] = "Movie successfully added.";
    } else {
        $_SESSION['feedback'] = "Cannot add movie. Please try again.";
    }

    // redirect to review page
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'movies.php';
    header("Location: http://$host$uri/$extra");
?>