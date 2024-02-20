<?php
include "../db-config.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['position'])) {

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email =  input ($_POST['email']);
    $password = input ($_POST['password']);
    $position = input ($_POST['position']);

    if (empty($email)) {
        header("Location: ../index.php?error=Missing Email");
    } else if (empty($password)) {
        header("Location: ../index.php?error=Missing Password");
    } else {
        $hashedPassword = md5($password);
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$hashedPassword' AND position='$position'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) === 1) {
            echo "WORKS!";
            $userData = mysqli_fetch_assoc($result);
            echo "<pre>";
            print_r($userData);
        }
    }

} else {
    header("Location: ../index.php");
}
