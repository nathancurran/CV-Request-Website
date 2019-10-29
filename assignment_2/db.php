<?php

//error_reporting( error_reporting() & ~E_NOTICE );

    //db.php
    $db_location = "localhost";
    $db_username = "B00756824";
    $db_password = "v2MNKabH";
    $db_database = "b00756824";
    $db_connection = new mysqli("$db_location","$db_username","$db_password");
//echo "sdfdf";
    // Check connection
    if ($db_connection->connect_error) {
//        echo "22222";
        die("Connection failed: " . $db_connection->connect_error);
    }
    $db = mysqli_select_db($db_connection, $db_database)
        or die ("Error - Could not open database");
?>
