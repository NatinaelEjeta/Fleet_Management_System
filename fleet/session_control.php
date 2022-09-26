<?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();
include("database_info.php");
//include("sweetalert2/sweetalert2.php");

if (isset($_SESSION['username']) && isset($_SESSION['userId'])) {
} else {
    // Redirect them to the login page
    header("Location: ../index.php");
}