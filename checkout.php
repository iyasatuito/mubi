<!-- include header file -->
<?php include 'partials/header.php'; ?>

<?php
    // connect to database
    require 'partials/connect.php';

    // userID
    $userID = 'U002';
    // $schedID = 'S004';
    $schedID = strval($_GET['id']);
    $_SESSION['schedID'] = $schedID;

    $adultTix = $_SESSION['adult'];
    $childTix = $_SESSION['child'];
    $seniorTix = $_SESSION['senior'];
    $seats = $_SESSION['seats'];

    // var_export($seats);
    // echo $adultTix;
    // echo $childTix;
    // echo $seniorTix;

    // query user
    $getuser = $mysqli->query("SELECT userFirst, userLast, userEmail FROM user
        WHERE userID = '$userID'
    ");

    $user = $getuser->fetch_object();

    // echo $user->userFirst;

    // query prices
    $prices = $mysqli->query("SELECT * FROM price");
 
    // query schedule
    $getschedule = $mysqli->query("SELECT movieTitle, cinemaName, scheduleDate, scheduleTime FROM schedule
        INNER JOIN cinema ON schedule.cinemaID = cinema.cinemaID
        INNER JOIN movie ON schedule.movieID = movie.movieID
        WHERE scheduleID = '$schedID'
    ");

    $schedule = $getschedule->fetch_object();

    // query reserved seats
    // $seats = $mysqli->query("SELECT seat FROM ticket
    //     INNER JOIN booking ON ticket.bookingID = booking.bookingID
    //     INNER JOIN schedule ON schedule.scheduleID = booking.scheduleID
    //     WHERE schedule.scheduleID = '$schedID'
    // ");

    // while($seat = $seats->fetch_object()) {
    //     $reserved = $seat->seat;
    //     $reservedSeats[] = $reserved;
    // }

    // assign seatnames
    // for ($x = 0; $x <= 125; $x++){
    //     $seatNames[] = 'A'.$x+1;
    // }

    // close database connection
    mysqli_close($mysqli);
?>

<div id="booking">
    <div id="bookingContainer">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8">
                    <div class="book-tickets">
                        <div class="page-title">
                            Checkout
                        </div>

                        <div class="step3">
                            <div class="row">
                                <div class="col col-sm-2 col-md-1">
                                    <div class="number">
                                        3
                                    </div>
                                </div>
                                <div class="col col-sm-10 col-md-11">
                                    <div class="subheading">
                                        Customer Info
                                    </div>
                                    <div>
                                        <?php echo $user->userFirst . " " . $user->userLast ?>
                                    </div>
                                    <div>
                                        <?php echo $user->userEmail ?>
                                    </div>
                                    <div class="btn-container">
                                        <a href="account.php" class="btn btn-mubi-secondary">Update Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="step4">
                            <div class="row">
                                <div class="col col-sm-2 col-md-1">
                                    <div class="number">
                                        4
                                    </div>
                                </div>
                                <div class="col col-sm-10 col-md-11">
                                    <div class="subheading">
                                        Payment
                                    </div>
                                    <div>
                                        <label for="card">
                                            Card No.
                                        </label>
                                    </div>
                                    <div>
                                        <input type="number" name="card" id="card">
                                    </div>
                                    <div>
                                        <label for="cvv">
                                            CVV
                                        </label>
                                    </div>
                                    <div>
                                        <input type="number" name="cvv" id="cvv">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="summary-container">
                        <!-- <div class="countdown">
                            <div class="row">
                                <div class="col col-sm-6">
                                    <span>                                
                                        TIME LEFT
                                    </span>
                                </div>
                                <div class="col col-sm-6 right">
                                    <span>
                                        04:32
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <div class="summary">
                            <div class="label">
                                Booking Summary
                            </div>
                            <div class="title">
                                <?php echo $schedule->movieTitle; ?>
                            </div>
                            <div class="text">
                                <?php echo $schedule->cinemaName; ?>
                            </div>
                            <div class="text">
                                <?php echo $schedule->scheduleDate; ?>, <?php echo $schedule->scheduleTime; ?>
                            </div>

                            <hr>

                            <div class="row">
                                    <div class="col col-sm-4">
                                        <div class="text">
                                            Adult                                    
                                        </div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="text right" id="adultQty"><?php echo $adultTix; ?></div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="text right" id="adultTix">
                                        $ <?php echo $adultTix*18; ?>.00
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-4">
                                        <div class="text">
                                            Child
                                        </div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="text right" id="childQty"><?php echo $childTix; ?></div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="text right" id="childTix">
                                        $ <?php echo $childTix*14; ?>.00
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-4">
                                        <div class="text">
                                            Senior
                                        </div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="text right" id="seniorQty"><?php echo $seniorTix; ?></div>
                                    </div>
                                    <div class="col col-sm-4">
                                        <div class="text right" id="seniorTix">
                                            $ <?php echo $seniorTix*16; ?>.00
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-6">
                                        <div class="total">
                                            Total
                                        </div>
                                    </div>
                                    <div class="col col-sm-6">
                                        <div class="total right">
                                            $ <span id="totalTix"><?php echo ($seniorTix*16)+($childTix*14)+($adultTix*18); ?></span>.00
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col col-sm-6">
                                        <div class="text" id="selectedSeatsLabel">
                                            SEATS
                                        </div>
                                    </div>
                                    <div class="col col-sm-6">
                                        <div class="text right" id="selectedSeats">
                                            <?php 
                                                foreach ($seats as $seat) {
                                                    echo $seat." ";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            <button class="btn btn-mubi" id="pay">
                                Pay
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tickets"></div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>