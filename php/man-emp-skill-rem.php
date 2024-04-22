<?php
include "./db-config.php";

if (isset($_GET['empID']) && isset($_GET['skill_name'])) {
    // Format skill data
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $empID = input($_GET['empID']);
    $remSkillName = input($_GET['skill_name']);
    // Delete selected skill from the employee that is being updated
    $sql = "DELETE FROM skills WHERE empID='$empID' AND skill_name='$remSkillName'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        header("Location: ../man-employees-update.php?id=$empID&success=Skill Removed Successfully");
    } else {
        header("Location: ../man-employees-update.php?id=$empID&error=An Unknown Error Occurred");
    }
} else {
    header("Location: ../man-employees-update.php");
}