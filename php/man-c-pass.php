<?php

if (isset($_POST['change'])) {
    include "./db-config.php";
    // Format password data
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = input($_POST['id']);
    $currentPass = input($_POST['currentPass']);
    $newPass = input($_POST['newPass']);
    $confirmNewPass = input($_POST['confirmNewPass']);

    if (empty($currentPass)) {
        header("Location: ../man-change-pass.php?error=Please enter your current password");
    } else if (empty($newPass)) {
        header("Location: ../man-change-pass.php?error=Please enter a new password");
    } else if (empty($confirmNewPass)) {
        header("Location: ../man-change-pass.php?error=Please confirm your new password");
    } else if ($newPass !== $confirmNewPass) {
        header("Location: ../man-change-pass.php?error=Password confirmation does not match");
    } else {


        $currentPass = md5($currentPass);
        $newPass = md5($newPass);

        $sql = "SELECT password FROM users WHERE id='$id' AND password='$currentPass'";
        $result = mysqli_query($link, $sql);

        // Ensure the user details are unique in the database (only found for one row)
        if(mysqli_num_rows($result) === 1){
            $sql2 = "UPDATE users SET password='$newPass' WHERE id='$id'";
            mysqli_query($link, $sql2);
            header("Location: ../man-change-pass.php?success=Password changed successfully");

        } else {
            header("Location: ../man-change-pass.php?error=Current password is incorrect");
        }
    }

} else {
    header("Location: ../man-change-pass.php");
}