<!-- include header file -->
<?php include 'partials/header.php'; ?>

<?php
    // setup session variables
    $_SESSION['movieID'] = "";

    // connect to database
    require 'partials/connect.php';

    // query movie banners
    $moviebanners = $mysqli->query("SELECT movieBanner FROM movie WHERE isFeatured=1");

    // query movies
    $movies = $mysqli->query("SELECT * FROM movie WHERE isFeatured=1");

    // set banner counter
    $banner = 0;

    // while($movie = $movies->fetch_object()) {
    //     echo $movie->movieID;
    //     echo '<br>';
    //     echo $movie->movieTitle;
    //     echo '<br>';
    //     echo $movie->movieDescription;
    //     echo '<br>';
    //     echo $movie->movieBanner;
    //     echo '<br>';
    //     echo $movie->isFeatured;
    //     echo '<br>';
    // }

?>

<div id="home">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
                while($moviebanner = $moviebanners->fetch_object()) {
                    if($banner==0){
                        echo 'hello';
                        echo '<div class="carousel-item active">';
                        echo '<img src="assets/img/movies/'.$moviebanner->movieBanner.'" class="d-block w-100" alt="...">';
                        echo '</div>';
                    } else {
                        echo '<div class="carousel-item">';
                        echo '<img src="assets/img/movies/'.$moviebanner->movieBanner.'" class="d-block w-100" alt="...">';
                        echo '</div>';
                    }

                    $banner = $banner + 1;
                }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="row">
            <div class="col col-sm-6">
                <div class="home-nav mustard-bg" id="nowShowing">
                    NOW SHOWING
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="home-nav" id="comingSoon">
                    COMING SOON
                </div>
            </div>
        </div>
        <div class="row">
            <div id="movieList">
                <?php
                    while($movie = $movies->fetch_object()) {
                        echo '<div class="movie-banner">';
                        echo '<div class="overlay">';
                        echo '<div>';
                        echo $movie->movieDescription;
                        echo '</div>';
                        echo '<a href="movie.php?id='.$movie->movieID.'" class="btn btn-mubi">Movie Info</a>';
                        echo '</div>';
                        echo '<img src="assets/img/movies/'.$movie->movieBanner.'" alt="">';
                        echo '</div>';
                    }
                ?>
            </div>
        <?php
            
        ?>          
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>