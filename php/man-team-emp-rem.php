<?php
include "./db-config.php";

if (isset($_GET['id']) && isset($_GET['team_name'])) {
    // Format team data
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $empTID = input($_GET['id']);
    $teamName = input($_GET['team_name']);
    // Delete selected employee from the team that is being updated
    $sql = "DELETE FROM teams WHERE empTID='$empTID' AND team_name='$teamName'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        header("Location: ../man-teams.php?success=Member Removed Successfully");
    } else {
        header("Location: ../man-teams.php?error=An Unknown Error Occurred");
    }
} else {
    header("Location: ../man-teams.php");
}