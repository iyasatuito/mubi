<?php

    // SQL credentials
    $mysql_host = "localhost";
    $mysql_database = "mubi";

    // Local
    $mysql_username = "root";
    $mysql_password = "";

    // Remote
    // $mysql_username = "bbondoc";
    // $mysql_password = "C#wTv!!!";

    // open a new connection to the SQL server
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

?>