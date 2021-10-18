<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $userID = $_GET['userID'];
    $guestID = "U000";

    $getBookings = $mysqli->query("SELECT * FROM booking WHERE booking.userID = '$userID';");
    while($booking = $getBookings->fetch_object()){
        $mysqli->query("UPDATE booking SET bookingID = '$booking->bookingID', scheduleID = '$booking->scheduleID', userID = '$guestID', ticketQty='$booking->ticketQty', totalCost='$booking->totalCost' WHERE booking.userID = '$userID' ;");
    }

    $sql = "DELETE FROM user WHERE user.userID = '$userID';";
	
    if(!empty($mysqli->query($sql))){       
        header('Location: ' . 'users.php');
    } else {
        echo json_encode('Cannot update. Please try again.');
    }
?>