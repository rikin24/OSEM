<?php

if (isset($_GET['id'])) {
    include "./php/db-config.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM teams WHERE id=$id";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Check if the calendar's data can be found in the database
        $teamData = mysqli_fetch_assoc($result);
    } else {
        header("Location: ./man-teams.php");
    }

} else if (isset($_POST['create'])) {
    include "db-config.php";
    // Format manager data
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $eventName = input($_POST['eventName']);
    $eventStart = $_POST['eventStart'];
    $eventEnd = $_POST['eventEnd'];
    $teamCID = $_POST['teamCID'];

    // Check if event already exists
    $sql = "SELECT * FROM team_calendar WHERE event_name='$eventName' AND event_start='$eventStart' AND event_end='$eventEnd' AND teamCID=$teamCID";
    $check = mysqli_query($link, $sql);

    if (empty($eventName)) {
        header("Location: ../man-team-calendar-add.php?id=$teamCID&error=Missing Event Name");
    } else if (empty($eventStart)) {
        header("Location: ../man-team-calendar-add.php?id=$teamCID&error=Missing Event Start Date");
    } else if (empty($eventEnd)) {
        header("Location: ../man-team-calendar-add.php?id=$teamCID&error=Missing Event End Date");
    } else if (mysqli_num_rows($check) > 0) {
        header("Location: ../man-team-calendar-add.php?id=$teamCID&error=Event Already Exists");
    } else if ($eventStart > $eventEnd) {
        header("Location: ../man-team-calendar-add.php?id=$teamCID&error=Event Start Date Cannot Be Later Than End Date");
    } else {
        // Add event to personal calendar with correct current user's ID
        $sql = "INSERT INTO team_calendar (event_name, event_start, event_end, teamCID) VALUES ('$eventName', '$eventStart', '$eventEnd',$teamCID)";
        $result = mysqli_query($link, $sql);

        if ($result) {
            header("Location: ../man-team-calendar-add.php?id=$teamCID&success=Event Added Successfully");
        } else {
            header("Location: ../man-team-calendar-add.php?id=$teamCID&error=An Unknown Error Occurred");
        }
    }
} else {
    header("Location: ../man-teams.php");
}
