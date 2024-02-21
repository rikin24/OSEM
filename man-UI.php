<?php
// Start the session and ensure login/session details match, otherwise return to login page
session_start();
include "./php/db-config.php";
if ((!isset($_SESSION['email']) && !isset($_SESSION['id'])) || (isset($_SESSION['email']) !== true && isset($_SESSION['id']) !== true)) {
    header("Location: index.php");
    exit;
} ?>

<!DOCTYPE html>
<!--Common UI features across all pages are called from here-->
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-styles.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-end">
    <p class="navbar-text text-white">Welcome User | OSEM Manager Portal</p>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="man-home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="php/logout.php">Log out</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
    </ul>
</nav>
</body>