<?php

if (isset($_GET['id'])) {
    include "./php/db-config.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM teams WHERE id=$id";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Check if the team's data can be found in the database
        $teamData = mysqli_fetch_assoc($result);
    } else {
        header("Location: ./man-employees.php");
    }

} else if (isset($_POST['update'])) {
    include "./db-config.php";
    // Format team data
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = input($_POST['id']);
    $currentTeamName = input($_POST['currentTeamName']);
    $teamName = input($_POST['teamName']);
    $teamDesc = input($_POST['teamDesc']);
    $empTID = $_POST['empTID'];

    if (empty($teamName)) {
        header("Location: ../man-teams.php?error=Missing Name");
    } else {

            $sql = "UPDATE teams SET team_name='$teamName' WHERE team_name='$currentTeamName'";
            $result = mysqli_query($link, $sql);

            foreach($empTID as $empTID2) {
                $sql2 = "INSERT INTO teams (team_name, team_desc, empTID) VALUES ('$teamName', '$teamDesc', '$empTID2')";
                $result2 = mysqli_query($link, $sql2);
            }

            if ($result) {
                header("Location: ../man-teams.php?success=Team Updated Successfully");
            } else {
                header("Location: ../man-teams.php?error=An Unknown Error Occurred");
            }

    }
} else {
    header("Location: ../man-teams.php");
}