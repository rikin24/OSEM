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
        header("Location: ./emp-teams.php");
    }

} else {
    header("Location: ../emp-teams.php");
}