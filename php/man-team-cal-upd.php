<?php
if (isset($_GET['id'])) {
    include "./php/db-config.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM team_calendar WHERE id=$id";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Check if the calendar's data can be found in the database
        $teamCalData = mysqli_fetch_assoc($result);
    } else {
        header("Location: ./man-teams.php");
    }

} else if (isset($_POST['update'])) {
    include "./db-config.php";
    // Format calendar data
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = input($_POST['id']);
    $eventName = input($_POST['eventName']);
    $eventStart = input($_POST['eventStart']);
    $eventEnd = input($_POST['eventEnd']);
    $teamCID = input($_POST['teamCID']);

    if (empty($eventName)) {
        header("Location: ../man-team-calendar-update.php?id=$id&error=Missing Event Name");
    } else if (empty($eventStart)) {
        header("Location: ../man-team-calendar-update.php?id=$id&error=Missing Event Start Date");
    } else if (empty($eventEnd)) {
        header("Location: ../man-team-calendar-update.php?id=$id&error=Missing Event End Date");
    } else if ($eventStart > $eventEnd) {
        header("Location: ../man-team-calendar-update.php?id=$id&error=Event Start Date Cannot Be Later Than End Date");
    } else {

        $sql = "UPDATE team_calendar SET event_name='$eventName', event_start='$eventStart', event_end='$eventEnd' WHERE id=$id AND teamCID=$teamCID";
        $result = mysqli_query($link, $sql);

        if ($result) {
            header("Location: ../man-team-calendar-update.php?id=$id&success=Event Updated Successfully");
        } else {
            header("Location: ../man-team-calendar-update.php?id=$id&error=An Unknown Error Occurred");
        }
    }

} else {
    header("Location: ../man-teams.php");
}