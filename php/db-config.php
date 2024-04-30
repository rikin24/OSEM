<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "osem";

    $link = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if(!$link){
        echo "ERROR: Could not connect." . mysqli_connect_error();
        exit();
    }

