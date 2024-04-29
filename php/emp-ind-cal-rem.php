<?php
include "./db-config.php";

if (isset($_GET['id'])) {
    // Format calendar data
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = input($_GET['id']);

    $sql = "DELETE FROM ind_calendar WHERE id=$id";
    $result = mysqli_query($link, $sql);

    if ($result) {
        header("Location: ../emp-home.php");
    } else {
        header("Location: ../emp-ind-calendar-update.php?id=$id&error=An Unknown Error Occurred");
    }

} else {
    header("Location: ../emp-home.php");
}