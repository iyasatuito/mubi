<?php
    session_start();

    // connect to database
    require 'partials/connect.php';

    $qty = $_POST['qty'];
    $cost = $_POST['cost'];
    $schedID = $_SESSION['schedID'];
    $userID = $_SESSION['userID'];
    $seats = $_SESSION['seats'];
    $code = 'qr.jpg';
    $seat = 'A27';

    $bookingID = uniqid();
    // $ticketID = uniqid();

    // prepare sql insert query
    $statement = $mysqli->prepare("INSERT INTO booking (bookingID, scheduleID, userID, ticketQty, totalCost) VALUES(?, ?, ?, ?, ?)");

    //bind parameters for markers, bind values and execute insert query
    $statement->bind_param('sssid', $bookingID, $schedID, $userID, $qty, $cost);

    // foreach($seats as $seat){    
    //     // prepare sql insert query
    //     $tixStatement = $mysqli->prepare("INSERT INTO ticket (ticketID, bookingID, seat, code) VALUES(?, ?, ?, ?)");

    //     //bind parameters for markers, bind values and execute insert query
    //     $tixStatement->bind_param('ssss', $ticketID, $bookingID, $seat, $code);
    // }

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
                <div class="col">
                    <div class="description">
                        You have successfully booked your tickets. Save a copy of these e-tickets and scan the QR code upon entry to Mubi cinemas.
                    </div>
                    <button class="btn btn-mubi print-btn" onclick="window.print()">
                        Print Ticket
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
    }
?>