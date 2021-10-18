<?php
    session_start();

    // connect to database
    require 'partials/connect.php';

    $qty = $_POST['qty'];
    $cost = $_POST['cost'];
    $schedID = $_SESSION['schedID'];
    $userID = $_SESSION['userID'];
    $seats = $_SESSION['seats'];

    // $email = $_POST['email'];
    // $password = $_POST['password'];
    $bookingID = uniqid();

    // prepare sql insert query
    $statement = $mysqli->prepare("INSERT INTO booking (bookingID, scheduleID, userID, ticketQty, totalCost) VALUES(?, ?, ?, ?, ?)");

    //bind parameters for markers, bind values and execute insert query
    $statement->bind_param('sssid', $bookingID, $schedID, $userID, $qty, $cost); 

    // query schedule
        $getschedule = $mysqli->query("SELECT movieTitle, cinemaName, scheduleDate, scheduleTime FROM schedule
        INNER JOIN cinema ON schedule.cinemaID = cinema.cinemaID
        INNER JOIN movie ON schedule.movieID = movie.movieID
        WHERE scheduleID = '$schedID'
    ");

    $schedule = $getschedule->fetch_object();

    // set message depending on result
    if($statement->execute()){
?>

        <div class="container">
            <div class="row no-print">
                <div class="page-title">
                    Tickets
                </div>
            </div>
            <div class="row no-print">
                <div class="col col-lg-8">
                    <div class="description">
                        You have successfully booked your tickets. Save a copy of these e-tickets and scan the QR code upon entry to Mubi cinemas.
                    </div>
                </div>
                <div class="col col-lg-4 right">
                    <button class="btn btn-mubi" onclick="window.print()">
                        Print
                    </button>
                </div>
            </div>
            <div class="row ticket-container">
                <?php
                    foreach($seats as $seat){
                        echo '<div class="col col-lg-4">
                            <div class="ticket">
                                <img src="assets/img/qr/qr1.jpg">
                                    <div class="title">';
                        echo $schedule->movieTitle;
                        echo '</div><div class="description">';
                        echo $schedule->cinemaName . ", " . $seat;
                        echo '</div><div class="description">';
                        echo $schedule->scheduleDate . ", " . $schedule->scheduleTime;
                        echo '</div></div></div>';
                    }
                ?>
            </div>
        </div>
<?php
    // }else{
    //     echo '<div class="container">
    //     <div class="row">Something went wrong. Please try again.</div></div>';
    }

    // reset sessions
    $_SESSION['movieID'] = "";
    $_SESSION['schedID'] = "";
    $_SESSION['seats'] = [];
    $_SESSION['child'] = "";
    $_SESSION['adult'] = "";
    $_SESSION['senior'] = "";  
?>