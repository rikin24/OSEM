<?php
include "../db-config.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['position'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email =  test_input ($_POST['email']);
    $password = test_input ($_POST['password']);
    $position = test_input ($_POST['position']);

    if (empty($email)) {
        header("Location: ../index.php?error=Missing Email");
    } else if (empty($password)) {
        header("Location: ../index.php?error=Missing Password");
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            echo "<pre>";
            print_r($row);
        }
    }

} else {
    header("Location: ../index.php");
}
