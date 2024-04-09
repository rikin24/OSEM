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

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $check = mysqli_query($link, $sql);

    if (empty($name)) {
        header("Location: ../adm-managers-add.php?error=Missing Name");
    } else if (empty($email)) {
        header("Location: ../adm-managers-add.php?error=Missing Email");
    } else if (empty($password)) {
        header("Location: ../adm-managers-add.php?error=Missing Password");
    } else if (mysqli_num_rows($check) > 0) {
        header("Location: ../adm-managers-add.php?error=Email Already in Use");
    } else {

        // Hash entered password before storing all details in the database
        $hashedPassword = md5($password);
        $sql = "INSERT INTO users (name, email, password, position) VALUES ('$name', '$email', '$hashedPassword', 'manager')";
        $result = mysqli_query($link, $sql);

        if ($result) {
            header("Location: ../adm-managers-add.php?success=Employee Added Successfully");
        } else {
            header("Location: ../adm-managers-add.php?error=An Unknown Error Occurred");
        }
    }
}
