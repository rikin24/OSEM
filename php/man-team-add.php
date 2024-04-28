<?php
include "./db-config.php";

if (isset($_POST['createTeam'])) {
    // Format team data
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $teamName = input($_POST['teamName']);
    $teamDesc = input($_POST['teamDesc']);
    $empTID = $_POST['empTID'];

    // Check if email already exists
    $sql = "SELECT * FROM teams WHERE team_name='$teamName'";
    $check = mysqli_query($link, $sql);

    if (empty($teamName)) {
        header("Location: ../man-teams-add.php?error=Missing Team Name");
    } else if (empty($empTID)) {
        header("Location: ../man-teams-add.php?error=Please select at least one member");
    } else if (mysqli_num_rows($check) > 0) {
        header("Location: ../man-teams-add.php?error=Team Name Already in Use");
    } else {
        foreach($empTID as $id) {

            $sql = "INSERT INTO teams (team_name, team_desc, empTID) VALUES ('$teamName', '$teamDesc', '$id')";
            $result = mysqli_query($link, $sql);

            if ($result) {
                header("Location: ../man-teams-add.php?success=Team Added Successfully");
            } else {
                header("Location: ../man-teams-add.php?error=An Unknown Error Occurred");
            }
        }
    }
} else {
    header("Location: ../man-teams-add.php");
}
