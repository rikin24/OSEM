<?php

if (isset($_GET['id'])) {
    include "./php/db-config.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Check if the employee's data can be found in the database
        $empData = mysqli_fetch_assoc($result);
    } else {
        header("Location: ./man-employees.php");
    }


} else if (isset($_POST['update'])) {
    include "./db-config.php";
    // Format employee data
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = input($_POST['id']);
    $name = input($_POST['name']);
    $skillName = input($_POST['skillName']);
    $skillDesc = input($_POST['skillDesc']);

    if (empty($name)) {
        header("Location: ../man-employees-update.php?id=$id&error=Missing Name");
    } else {

        $sql = "UPDATE users SET name='$name' WHERE id=$id";
        $result = mysqli_query($link, $sql);
        if ($skillName != "") {
            // Add skill to given employee if entered in update form
            $sql2 = "INSERT INTO skills (skill_name, skill_desc, empID) VALUES ('$skillName', '$skillDesc', '$id')";
            $result2 = mysqli_query($link, $sql2);
        }

        if ($result) {
            header("Location: ../man-employees-update.php?id=$id&success=Employee Updated Successfully");
        } else {
            header("Location: ../man-employees-update.php?id=$id&error=An Unknown Error Occurred");
        }
    }

} else {
        header("Location: ../man-employees-update.php");
}