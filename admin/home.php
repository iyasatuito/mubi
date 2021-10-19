<!-- include header file -->
<?php include 'partials/admin-header.php'; ?>

<?php
require 'partials/connect.php';

$_SESSION['movieHero']="";

$nowShowing = 0;
$upcomingMovies = 0;
$pastMovies = 0;

$totalSales = 0;
$ticketBooked = 0;

$today = date("Y-m-d H:i:s");

$getSchedules = $mysqli->query("SELECT * FROM schedule");

$getMovies = $mysqli->query("SELECT * FROM movie");

$getBookings = $mysqli->query("SELECT * FROM booking");

while ($movie = $getMovies->fetch_object()) {
    if (($movie->isScreening) === '1') {
        $nowShowing += 1;
    } elseif (($movie->isScreening) === '2') {
        $pastMovies += 1;
    } else {
        $upcomingMovies += 1;
    }
}

while ($booking = $getBookings->fetch_object()) {
    $totalSales += ($booking->totalCost);
    $ticketBooked += ($booking->ticketQty);
}

mysqli_close($mysqli);
?>

<div class="col col-lg-9 content">
    <div id="home">
        <div class="container">
            <div class="row">
                <div class="col col-lg-4">
                    <div class="dashboard-details">
                        <h1><?php echo $pastMovies; ?></h1>
                        <p class="text-medium">PAST MOVIES</p>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="dashboard-details">
                        <h1><?php echo $nowShowing; ?></h1>
                        <p class="text-medium">NOW SHOWING</p>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="dashboard-details">
                        <h1><?php echo $upcomingMovies; ?></h1>
                        <p class="text-medium">UPCOMING</p>
                    </div>
                </div>
                <div class="col col-lg-8">
                    <div class="dashboard-details">
                        <h1>$<?php echo $totalSales;?></h1>
                        <p class="text-medium">TOTAL SALES</p>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="dashboard-details">
                        <h1><?php echo $ticketBooked; ?></h1>
                        <p class="text-medium">TICKETS BOOKED</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/admin-footer.php'; ?>