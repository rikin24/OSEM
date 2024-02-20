<?php
session_start();
include "db-config.php";
if (isset($_SESSION['email']) && isset($_SESSION['id'])) {
    echo "hello";
} else{
    header("Location: index.php");
} ?>