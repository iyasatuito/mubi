<!-- include header file -->
<?php include 'partials/header.php'; ?>

<?php
    // setup session variables
    $_SESSION['movieID'] = "";
    $_SESSION['schedID'] = "";
    $userID = $_SESSION['userID'];
    $_SESSION['seats'] = [];
    $_SESSION['child'] = "";
    $_SESSION['adult'] = "";
    $_SESSION['senior'] = "";   

    // echo $_SESSION['userRole'];
    
    // connect to database
    require 'partials/connect.php';

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