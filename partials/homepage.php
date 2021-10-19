<div id="home">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
                while($moviebanner = $moviebanners->fetch_object()) {
                    if($banner==0){
                        echo 'hello';
                        echo '<div class="carousel-item active">';
                        echo '<a href="movie.php?id='.$moviebanner->movieID.'"><img src="assets/img/movies/'.$moviebanner->movieHero.'" class="d-block w-100" alt="..."></a>';
                        echo '</div>';
                    } else {
                        echo '<div class="carousel-item">';
                        echo '<a href="movie.php?id='.$moviebanner->movieID.'"><img src="assets/img/movies/'.$moviebanner->movieHero.'" class="d-block w-100" alt="..."></a>';
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
                <div class="home-nav" id="nowShowing">
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
                        echo '<div class="movieTitle">';
                        echo $movie->movieTitle;
                        echo '</div>';
                        echo '<div class="movieDescription">';
                        echo substr($movie->movieDescription, 0, 150)."...";
                        echo '</div>';
                        echo '<a href="movie.php?id='.$movie->movieID.'" class="btn btn-mubi">Movie Info</a>';
                        echo '</div>';
                        echo '<img src="assets/img/movies/'.$movie->movieBanner.'" alt="">';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>