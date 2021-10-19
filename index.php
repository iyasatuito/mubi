<!-- include header file -->
<?php include 'partials/header-guest.php'; ?>

<?php   
    
    // connect to database
    require 'partials/connect.php';

    // echo $_SESSION['userID'];

    // query movie banners
    $moviebanners = $mysqli->query("SELECT movieHero, movieID FROM movie WHERE isFeatured=1");

    // query movies
    $movies = $mysqli->query("SELECT * FROM movie");

    // set banner counter
    $banner = 0;

?>

<!-- include homepage file -->
<?php include 'partials/homepage.php'; ?>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>