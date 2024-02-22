<?php
include "./db-config.php";

if (isset($_GET['id'])) {
    // Format employee data
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = input($_GET['id']);

    $sql = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($link, $sql);

    if ($result) {
        header("Location: ../man-employees.php?success=Employee Removed Successfully");
    } else {
        header("Location: ../man-employees.php?error=An Unknown Error Occurred");
    }

} else {
    header("Location: ../man-employees.php");
}