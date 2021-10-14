<!-- include header file -->
<?php include 'partials/header.php'; ?>

<div id="home">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/movies/banner.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/movies/banner.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/movies/banner.jpg" class="d-block w-100" alt="...">
            </div>
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
                <div class="home-nav mustard-bg">
                    NOW SHOWING
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="home-nav">
                    COMING SOON
                </div>
            </div>
        </div>
        <div class="row">
        <div class="movie-banner">
                <div class="overlay">
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tortor, praesent et id tincidunt ullamcorper. Nec id sem iaculis auctor ut nec et mi. Urna maecenas urna quis augue imperdiet felis malesuada.
                    </div>
                    <a href="#" class="btn btn-mubi">
                        Movie Info
                    </a>
                </div>
                <img src="assets/img/movies/banner.jpg" alt="">
            </div>
            <div class="movie-banner">
                <div class="overlay">
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tortor, praesent et id tincidunt ullamcorper. Nec id sem iaculis auctor ut nec et mi. Urna maecenas urna quis augue imperdiet felis malesuada.
                    </div>
                    <a href="#" class="btn btn-mubi">
                        Movie Info
                    </a>
                </div>
                <img src="assets/img/movies/banner.jpg" alt="">
            </div>
            <div class="movie-banner">
                <div class="overlay">
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tortor, praesent et id tincidunt ullamcorper. Nec id sem iaculis auctor ut nec et mi. Urna maecenas urna quis augue imperdiet felis malesuada.
                    </div>
                    <a href="#" class="btn btn-mubi">
                        Movie Info
                    </a>
                </div>
                <img src="assets/img/movies/banner.jpg" alt="">
            </div>
            
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>