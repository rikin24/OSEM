<?php
// Start the session and ensure login/session details match, otherwise return to login page
session_start();
include "./php/db-config.php";
if ((!isset($_SESSION['email']) && !isset($_SESSION['id'])) || (isset($_SESSION['email']) !== true && isset($_SESSION['id']) !== true)) {
    header("Location: index.php");
    exit;
} else if ($_SESSION['position'] === 'manager') {
    header("Location: man-home.php");
} ?>

<!DOCTYPE html>
<!--Common UI and features across all pages are called from here-->
<html>
<head>
    <title>OSEM Manager Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-end">
    <p class="navbar-text text-white">Welcome,
        <?php
        $currentName = $_SESSION['name'];
        echo $currentName . " ";
        ?>

        | OSEM Employee Portal</p>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="emp-home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="php/logout.php">Log out</a>
        </li>
    </ul>
</nav>
</body>
