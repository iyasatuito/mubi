<?php


    require 'partials/connect.php';
    $_SESSION["loggedin"] = false;
    $_SESSION['userID'] = "";

    session_destroy();
    header("location: http://localhost/mubi/index.php");

    // header("location: https://300693.cdms.westernsydney.edu.au/~bbondoc/mubi/");

?>