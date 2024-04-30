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

    $sql = "SELECT * FROM team_calendar WHERE id=$id";
    $result = mysqli_query($link, $sql);
    $teamCalData = mysqli_fetch_assoc($result);

    $teamCID = $teamCalData['teamCID'];

    $sql2 = "DELETE FROM team_calendar WHERE id=$id";
    $result2 = mysqli_query($link, $sql2);

    if ($result2) {
        header("Location: ../man-team-room.php?id=$teamCID");
    } else {
        header("Location: ../man-teams");
    }

} else {
    header("Location: ../man-teams.php");
}