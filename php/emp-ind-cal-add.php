<?php
include "./db-config.php";

if (isset($_POST['create'])) {
    // Format employee data (if entered) when pressing add
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $eventName = input($_POST['eventName']);
    $eventStart = $_POST['eventStart'];
    $eventEnd = $_POST['eventEnd'];
    $empCID = input($_POST['id']);

    // Check if event already exists
    $sql = "SELECT * FROM ind_calendar WHERE event_name='$eventName' AND event_start='$eventStart' AND event_end='$eventEnd' AND empCID='$empCID'";
    $check = mysqli_query($link, $sql);

    if (empty($eventName)) {
        header("Location: ../emp-ind-calendar-add.php?error=Missing Event Name");
    } else if (empty($eventStart)) {
        header("Location: ../emp-ind-calendar-add.php?error=Missing Event Start Date");
    } else if (empty($eventEnd)) {
        header("Location: ../emp-ind-calendar-add.php?error=Missing Event End Date");
    } else if (mysqli_num_rows($check) > 0) {
        header("Location: ../emp-ind-calendar-add.php?error=Event Already Exists");
    } else if ($eventStart > $eventEnd) {
        header("Location: ../emp-ind-calendar-add.php?error=Event Start Date Cannot Be Later Than End Date");
    } else {
        // Add event to personal calendar with correct current user's ID
        $sql = "INSERT INTO ind_calendar (event_name, event_start, event_end, empCID) VALUES ('$eventName', '$eventStart', '$eventEnd','$empCID')";
        $result = mysqli_query($link, $sql);

        if ($result) {
            header("Location: ../emp-ind-calendar-add.php?success=Event Added Successfully");
        } else {
            header("Location: ../emp-ind-calendar-add.php?error=An Unknown Error Occurred");
        }
    }
} else {
    header("Location: ../emp-ind-calendar-add.php");
}
