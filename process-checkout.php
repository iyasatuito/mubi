<?php
    session_start();

    // connect to database
    require 'partials/connect.php';

    $qty = $_POST['qty'];
    $cost = $_POST['cost'];
    $schedID = $_SESSION['schedID'];
    $userID = $_SESSION['userID'];

    // $email = $_POST['email'];
    // $password = $_POST['password'];
    $bookingID = uniqid();

    // prepare sql insert query
    $statement = $mysqli->prepare("INSERT INTO booking (bookingID, scheduleID, userID, ticketQty, totalCost) VALUES(?, ?, ?, ?, ?)");

    //bind parameters for markers, bind values and execute insert query
    $statement->bind_param('sssid', $bookingID, $schedID, $userID, $qty, $cost); 

    // set message depending on result
    if($statement->execute()){
?>

        <div class="container">
            <div class="row">
                <div class="page-title">
                    Tickets
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-8">
                    <div class="description">
                        You have successfully booked your tickets. Save a copy of these e-tickets and scan the QR code upon entry to Mubi cinemas.
                    </div>
                </div>
                <div class="col col-lg-4 right">
                    <button class="btn btn-mubi">
                    Download
                </button>
                <button class="btn btn-mubi">
                    Print
                </button>
                </div>
            </div>
            <div class="row ticket-container">
                <div class="col col-lg-4">
                    <div class="ticket">
                        <img src="assets/img/qr/qr1.jpg" alt="">
                        <div class="title">
                            Shang-chi: The Legend of the Ten Rings
                        </div>
                        <div class="description">
                            Cinema 1, Seat A1
                        </div>
                        <div class="description">
                            21 Oct 2021, 9:10AM
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="ticket">
                        <img src="assets/img/qr/qr1.jpg" alt="">
                        <div class="title">
                            Shang-chi: The Legend of the Ten Rings
                        </div>
                        <div class="description">
                            Cinema 1, Seat A1
                        </div>
                        <div class="description">
                            21 Oct 2021, 9:10AM
                        </div>
                    </div>
                </div>  
                <div class="col col-lg-4">
                    <div class="ticket">
                        <img src="assets/img/qr/qr1.jpg" alt="">
                        <div class="title">
                            Shang-chi: The Legend of the Ten Rings
                        </div>
                        <div class="description">
                            Cinema 1, Seat A1
                        </div>
                        <div class="description">
                            21 Oct 2021, 9:10AM
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }else{
        echo '<div class="container">
        <div class="row">Something went wrong. Please try again.</div></div>';
    }
?>