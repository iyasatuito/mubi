<!-- include header file -->
<?php
    // session_start();
    include 'partials/header.php';    
?>

<?php
    // connect to database
    require 'partials/connect.php';
    
    // echo $_SESSION['userID'];

    // get movie id from URL
    $id = strval($_GET['id']);
    $_SESSION['movieID'] = $id;
    
    // query movie
    $getmovie = $mysqli->query("SELECT * FROM movie WHERE movieID = '$id'");
    $movie = $getmovie->fetch_object();

    // get distinct dates for this movie
    $dates = $mysqli->query("SELECT DISTINCT scheduleDate FROM schedule WHERE movieID = '$id'");

    // get distinct cinemas for this movie and date
    // $cinemas = $mysqli->query("SELECT DISTINCT schedule.cinemaID, cinema.cinemaName FROM schedule
    //     INNER JOIN cinema ON schedule.cinemaID = cinema.cinemaID
    //     WHERE movieID = '$id' AND scheduleDate = '2021-12-31'
    // ");

    // query movie schedules
    // $schedules = $mysqli->query("SELECT * FROM schedule
    //     INNER JOIN cinema ON schedule.cinemaID = cinema.cinemaID
    //     WHERE movieID = '$id' AND scheduleDate = '2021-12-31'
    //     ORDER BY scheduleTime
    // ");
    
    // while($cinema = $cinemas->fetch_object()) {
    //     echo '<div class="subheading">';
    //     echo $cinema->cinemaName;
    //     echo '</div>';
    // }

    

    // var_export($getdates);

    // $schedules = $getschedules->fetch_object();

    // var_($getschedules);

    // close database connection
    mysqli_close($mysqli);
?>

<div id="movie">
    <div class="banner">
        <img class="play-btn" src="assets/img/play-btn.png" alt="">
        <img class="video-cover" src="assets/img/movies/<?php echo $movie->movieBanner ?>" alt="">
        <iframe class="yt-video" width="100%" height="500px" src="https://www.youtube.com/embed/<?php echo $movie->movieTrailer ?>?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="container">
        <div class="row">
            <div class="col col-lg-3" id="moviePoster">
                <img class="poster" src="assets/img/movies/<?php echo $movie->moviePoster ?>" alt="">
            </div>
            <div class="col col-lg-9">
                <div class="movie-details">
                    <div class="label">
                        <?php
                            if($movie->isScreening==1){
                                echo 'Now Showing';
                            }else{
                                echo 'Coming Soon';
                            }
                        ?>
                        
                    </div>
                    <div class="title">
                    <?php echo $movie->movieTitle ?>
                    </div>
                    <div class="details">
                        <?php echo $movie->movieDescription ?>    
                    </div>
                    <div class="details">
                        Director: <?php echo $movie->movieDirector ?>
                    </div>
                    <div class="details">
                        Starring: <?php echo $movie->movieActor ?>
                    </div>
                    
                    <?php
                        if($_SESSION['userID']!=""){
                    ?>
                    <div class="booking">
                        <div class="subheading">
                            SELECT DATE
                        </div>
                        <form class="date" action="" method="">
                            <select name="date" id="date">
                                echo '<option value="">Select one</option>';
                                <?php
                                    while($date = $dates->fetch_object()) {
                                        echo '<option value="'.$date->scheduleDate.'">'.$date->scheduleDate.'</option>';
                                    }
                                ?>
                            </select>
                        </form>   
                        
                        <div id="scheduleContainer"></div>  
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>