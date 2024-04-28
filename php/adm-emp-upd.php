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
        header("Location: ./adm-employees.php");
    }


} else if (isset($_POST['update'])) {
    include "./db-config.php";
    // Format employee data
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = input($_POST['id']);
    $name = input($_POST['name']);
    $position = input($_POST['position']);

    if (empty($name)) {
        header("Location: ../adm-employees-update.php?id=$id&error=Missing Name");
    } else {

        $sql = "UPDATE users SET name='$name', position='$position' WHERE id=$id";
        $result = mysqli_query($link, $sql);

        if ($result) {
            header("Location: ../adm-employees-update.php?id=$id&success=Employee Updated Successfully");
        } else {
            header("Location: ../adm-employees-update.php?id=$id&error=An Unknown Error Occurred");
        }
    }

} else {
    header("Location: ../adm-employees-update.php");
}