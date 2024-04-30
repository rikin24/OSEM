<?php
// Start the session and ensure login/session details match
session_start();
include "./php/db-config.php";
if ((!isset($_SESSION['email']) && !isset($_SESSION['id'])) || (isset($_SESSION['email']) !== true && isset($_SESSION['id']) !== true)) {
    // Return user to login page if details don't match
    header("Location: index.php");
    exit;
} else if ($_SESSION['position'] === 'employee') {
    // Return user to home of correct portal if they attempt to access the wrong one
    header("Location: emp-home.php");
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
    <title>OSEM Manager Portal</title>

    <!-- FullCalendar API -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <!-- Chart.js API -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap, Favicon & CSS -->
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

            | OSEM Manager Portal</p>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="man-home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="man-employees.php">Employees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="man-teams.php">Teams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="man-stats.php">Statistics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="man-change-pass.php">Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="php/logout.php">Log out</a>
            </li>
        </ul>
    </div>
</nav>
</body>