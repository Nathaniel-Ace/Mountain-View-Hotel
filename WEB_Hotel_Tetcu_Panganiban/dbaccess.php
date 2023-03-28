<?php

    $host = "localhost";
    $user = "if22b040";
    $passwordDB = "N34Ace$10P4006!";                    //Datenbankverbindung mit zugehörigen Account für Datenbank
    $database = "web_hotel_tetcu_panganiban";

    $db_obj = new mysqli($host, $user, $passwordDB, $database);

    if($db_obj === false) {
        die("ERROR: Keine Verbindung" . $db_obj->connect_error);
    }
    
?>