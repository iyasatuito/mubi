<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $movieTitle = $_GET['movieTitle'];

     // query movie id first
    $sql = "SELECT movieID FROM movie WHERE movie.movieTitle = '$movieTitle'";
    $result = $mysqli->query($sql)->fetch_object();
    $movID = $result->movieID;
    
      // user movie id to delete schedule and movie
    $sql2 = "DELETE FROM schedule WHERE schedule.movieID = '$movID';";
    $sql2 .= "DELETE FROM movie WHERE movie.movieID = '$movID'";
    $delete = mysqli_multi_query($mysqli, $sql2);
	
    if(!empty($delete)){         
        $_SESSION['feedback'] = "You have successfully deleted a movie.";
    } else {
        $_SESSION['feedback'] = "Unable to delete the movie. There are bookings associated to it.";
    }

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'movies.php';
    header("Location: http://$host$uri/$extra");
?>