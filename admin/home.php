<!-- include header file -->
<?php include 'partials/admin-header.php'; ?>

<?php
require 'partials/connect.php';

$nowShowing = 0;
$upcomingMovies = 0;
$pastMovies = 0;

$totalSales = 0;
$ticketBooked = 0;

$today = date("Y-m-d H:i:s");

$getSchedules = $mysqli->query("SELECT * FROM schedule");

$getMovies = $mysqli->query("SELECT * FROM movie");

$getBookings = $mysqli->query("SELECT * FROM booking");

while($movie = $getMovies -> fetch_object()){
    if(($movie->isScreening) === '1'){
         $nowShowing += 1;
    } elseif(($movie->isScreening) === '2'){
        $pastMovies += 1;
    } else {
         $upcomingMovies += 1;
    }
}

while($booking = $getBookings -> fetch_object()){
     $totalSales += ($booking->totalCost);
     $ticketBooked += ($booking->ticketQty);
}

mysqli_close($mysqli);
?>

<div id="home">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="text-md-left"><a href="home.php">DASHBOARD</a></div>
                <div class=""><a href="movies.php">MOVIES</a></div>
                <div class=""><a href="addmovie.php">ADD MOVIE</a></div>
                <div class=""><a href="schedule.php">SCHEDULE</a></div>
                <div class=""><a href="users.php">USERS</a></div>
                <div class=""><a href="movies.php">LOGOUT</a></div>
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="col-4">
                        <div class="dashboard-details">
                        <p><?php echo $pastMovies; ?></p>
                        <p class="text-medium">PAST MOVIES</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <p>NOW SHOWING<?php echo $nowShowing; ?></p>
                    </div>

                    <div class="col-4">
                        <p>UPCOMING<?php echo $upcomingMovies; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <p>TOTAL SALES $<?php echo $totalSales; ?></p>
                    </div>

                    <div class="col-4">
                        <p>TICKETS BOOKED<?php echo $ticketBooked; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/admin-footer.php'; ?>