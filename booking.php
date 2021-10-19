<!-- include header file -->
<?php include 'partials/header.php'; ?>

<?php
    // connect to database
    require 'partials/connect.php';

    // userID
    $userID = 'U001';
    // $schedID = 'S004';
    $schedID = strval($_GET['id']);
    $_SESSION['schedID'] = $schedID;

    // var_export($_SESSION['seats']);

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
    $seats = $mysqli->query("SELECT seat FROM ticket
        INNER JOIN booking ON ticket.bookingID = booking.bookingID
        INNER JOIN schedule ON schedule.scheduleID = booking.scheduleID
        WHERE schedule.scheduleID = '$schedID'
    ");

    while($seat = $seats->fetch_object()) {
        $reserved = $seat->seat;
        $reservedSeats[] = $reserved;
    }

    // var_dump($reservedSeats);

    // assign seatnames
    for ($x = 0; $x <= 132; $x++){
        $seatNames[] = 'A'.$x+1;
    }

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
                            Book Tickets
                        </div>

                        <!-- <div id="qrcode"></div> -->
                        <div class="step1">
                            <div class="number">
                                1
                            </div>
                            <div class="subheading">
                                Select Tickets
                            </div>
                            <div class="details">
                                <table class="ticket-items">
                                    <?php
                                        while($price = $prices->fetch_object()) {
                                            echo '<tr><td>';
                                            echo $price->ticketType;
                                            echo '</td><td>';
                                            echo '$ '.sprintf('%0.2f', $price->price);
                                            echo '</td><td><input min="0" class="input-tix" id="input'.$price->ticketType.'" name="'.$price->ticketType.'" type="number"></td></tr>';
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                        
                        <div class="step2">
                            <div class="row">
                                <div class="col">
                                    <div class="number">
                                        2
                                    </div>
                                    <div class="subheading">
                                        Select Seats
                                    </div>
                                    <div class="seats">
                                        <div class="container">
                                            
                                            <div class="row seats-container">
                                    <!-- </div> -->
                                    <!-- <table class="seats"> -->
                                        
                                    <?php

                                    
                                        foreach ($seatNames as $seatName) {
                                            $checker = 0;

                                            foreach ($reservedSeats as $reservedSeat) {
                                                if($seatName==$reservedSeat){
                                                    $checker = 1;
                                                    break;        
                                                } else {
                                                    $checker = 0;
                                                }
                                            }
                                            
                                            if ($checker == 1) {
                                                // echo 'reserved ';
                                                echo '<div id="'.$seatName.'" class="col col-sm-1 seat"></div>';
                                            } else {
                                                // echo 'free ';
                                                
                                                echo '<div id="'.$seatName.'" class="col col-sm-1 seat free"></div>';
                                            }
                                        }
                                        // for ($x = 1; $x <= 8; $x++) {
                                            // echo '<tr>';
                                            // $z = '';

                                            // assign letter per row
                                            // switch ($x) {
                                            //     case 1:
                                            //         $z = 'A';
                                            //         break;
                                            //     case 2:
                                            //         $z = 'B';
                                            //         break;
                                            //     case 3:
                                            //         $z = 'C';
                                            //         break;
                                            //     case 4:
                                            //         $z = 'D';
                                            //         break;
                                            //     case 5:
                                            //         $z = 'E';
                                            //         break;
                                            //     case 6:
                                            //         $z = 'F';
                                            //         break;
                                            //     case 7:
                                            //         $z = 'G';
                                            //         break;      
                                            //     default:
                                            //         $z = 'H';
                                            // }

                                            
                                            // assign id per seat
                                            // for ($y = 1; $y <= 14; $y++) {
                                                // echo '<td id="'.$y.'" class="seat"></td>';
                                                // $seatNames[$y-1] = $z.$y;
                                                // echo $seatName . ' ';
                                                // var_dump($seatName);

                                                
                                                // var_dump($seatNames);
                                                

                                            // }
                                            // echo '</tr>';
                                            
                                        // }

                                        

                                        // var_dump($reservedSeats);
                                        // var_dump($reservedSeats);
                                        // var_dump($seatNames);
                                        

                                        
                                    ?>                                
                                    <!-- </table> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="step3">
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
                                        <label for="name">
                                            Name
                                        </label>
                                        <input type="text" name="name">
                                    </div>
                                    <div>
                                        <label for="email">
                                            Email
                                        </label>
                                        <input type="email" name="email">
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="step4">
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
                                        <label for="name">
                                            Card No.
                                        </label>
                                        <input type="number" name="card">
                                    </div>
                                    <div>
                                        <label for="email">
                                            CVV
                                        </label>
                                        <input type="number" name="cvv">
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
                                    <div class="text right" id="adultQty">0</div>
                                </div>
                                <div class="col col-sm-4">
                                    <div class="text right" id="adultTix">
                                        $ 0.00
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
                                    <div class="text right" id="childQty">0</div>
                                </div>
                                <div class="col col-sm-4">
                                    <div class="text right" id="childTix">
                                        $ 0.00
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
                                    <div class="text right" id="seniorQty">0</div>
                                </div>
                                <div class="col col-sm-4">
                                    <div class="text right" id="seniorTix">
                                        $ 0.00
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
                                        $ <span id="totalTix">0</span>.00
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col col-sm-6">
                                    <div class="text" id="selectedSeatsLabel">
                                        Seats
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <div class="text right" id="selectedSeats">-
                                    </div>
                                </div>
                            </div>

                            <a href="checkout.php?id=<?php echo $schedID; ?>" class="btn btn-mubi" id="checkout">
                                Checkout
                            </a>
                            <!-- <button class="btn btn-mubi" id="pay">
                                Pay
                            </button>
                            <button class="btn btn-mubi" id="back">
                                Go Back
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>