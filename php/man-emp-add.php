<?php
include "./db-config.php";

if (isset($_POST['create'])) {
    // Format employee data (if entered) when pressing add
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = input($_POST['name']);
    $email = input($_POST['email']);
    $password = input ($_POST['password']);
    $position = input ($_POST['position']);

    if (empty($name)) {
        header("Location: ../man-employees-add.php?error=Missing Name");
    } else if (empty($email)) {
        header("Location: ../man-employees-add.php?error=Missing Email");
    } else if (empty($password)) {
        header("Location: ../man-employees-add.php?error=Missing Password");
    } else {

        // Hash entered password before storing all details in the database
        $hashedPassword = md5($password);
        $sql = "INSERT INTO users (name, email, password, position) VALUES ('$name', '$email', '$hashedPassword', 'employee')";
        $result = mysqli_query($link, $sql);

        if ($result) {
            header("Location: ../man-employees-add.php?success=Employee Added Successfully");
        } else {
            header("Location: ../man-employees-add.php?error=An Unknown Error Occurred");
        }
    }
}
