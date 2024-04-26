<?php
include "./db-config.php";

if (isset($_GET['team_name'])) {
    // Format team data
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $teamName = input($_GET['team_name']);
    // Takes corresponding team_name from GET data and deletes all team values with that name in the teams table
    $sql = "DELETE FROM teams WHERE team_name='$teamName'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        header("Location: ../man-teams.php?success=Team Removed Successfully");
    } else {
        header("Location: ../man-teams.php?error=An Unknown Error Occurred");
    }

} else {
    header("Location: ../man-teams.php");
}