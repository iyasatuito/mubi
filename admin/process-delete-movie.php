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
        header('Location: ' . 'movies.php');
    } else {
        echo json_encode('Cannot update. Please try again.');
    }
?>