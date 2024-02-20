<?php
session_start();
include "../db-config.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['position'])) {

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = input ($_POST['email']);
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
            $userData = mysqli_fetch_assoc($result);
            if ($userData['email'] === $email && $userData['password'] === $hashedPassword && $userData['position'] === $position) {
                $_SESSION['name'] = $userData['name'];
                $_SESSION['id'] = $userData['id'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['position'] = $userData['position'];

                header("Location: ../man-home.php");
            } else {
                header("Location: ../index.php?error=Incorrect Details");
            }
        } else {
            header("Location: ../index.php?error=Incorrect Details");
        }
    }

} else {
    header("Location: ../index.php");
}
