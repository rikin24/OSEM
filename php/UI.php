<?php
session_start();
include "./php/db-config.php";
if ((!isset($_SESSION['email']) && !isset($_SESSION['id'])) || (isset($_SESSION['email']) !== true && isset($_SESSION['id']) !== true)) {
    header("Location: index.php");
    exit;
} ?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-styles.css">
</head>