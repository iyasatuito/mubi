<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $seats = $_POST['seats'];
    // $qty = $_POST['qty'];

    // echo json_encode($qty);
    $_SESSION['seats'] = $seats;
    $_SESSION['child'] = $_POST['cQty'];
    $_SESSION['adult'] = $_POST['aQty'];
    $_SESSION['senior'] = $_POST['sQty'];
    

    echo json_encode($seats);

    // query movies
    // if($type=='now'){
    //     $movies = $mysqli->query("SELECT * FROM movie WHERE isFeatured=1");
    // } else {
    //     $movies = $mysqli->query("SELECT * FROM movie WHERE isFeatured=0");
    // }

    // while($movie = $movies->fetch_object()) {
    //         echo '<div class="movie-banner">';
    //         echo '<div class="overlay">';
    //         echo '<div>';
    //         echo $movie->movieDescription;
    //         echo '</div>';
    //         echo '<a href="movie.php?id='.$movie->movieID.'" class="btn btn-mubi">Movie Info</a>';
    //         echo '</div>';
    //         echo '<img src="assets/img/movies/'.$movie->movieBanner.'" alt="">';
    //         echo '</div>';
    // }

?>