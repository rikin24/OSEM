<?php
// Start the session and ensure login/session details match
session_start();
include "./php/db-config.php";
if ((!isset($_SESSION['email']) && !isset($_SESSION['id'])) || (isset($_SESSION['email']) !== true && isset($_SESSION['id']) !== true)) {
    // Return user to login page if details don't match
    header("Location: index.php");
    exit;
} else if ($_SESSION['position'] === 'manager') {
    // Return user to home of correct portal if they attempt to access the wrong one
    header("Location: man-home.php");
} else if ($_SESSION['position'] === 'admin') {
    header("Location: adm-home.php");
}

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$currentID = input ($_SESSION['id']);
?>

<!DOCTYPE html>
<!--Common UI and features across all pages are called from here-->
<html>
<head>
    <title>OSEM Employee Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-end">
    <div class="d-flex justify-content-between w-100 mx-3">
        <p class="navbar-text text-white">Welcome,
            <?php
            // Display name of current session user
            $currentName = $_SESSION['name'];
            echo $currentName . " ";
            ?>

            | OSEM Employee Portal</p>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="emp-home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="emp-skills.php">Skills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="emp-teams.php">Teams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="php/logout.php">Log out</a>
            </li>
        </ul>
    </div>
</nav>
</body>
