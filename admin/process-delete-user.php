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
        $_SESSION['feedback'] = "You have successfully deleted a user.";
    } else {
        $_SESSION['feedback'] = "Failed to delete user.";
    }


    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'users.php';
    header("Location: http://$host$uri/$extra");
?>