<?php
// Always start this first
include('session_control.php');
$current_user = $_SESSION['username'];
$insert = 
        "UPDATE users 
         SET lastDateSignedIn = CURRENT_TIMESTAMP()
         WHERE username = '$current_user'";
         $results = mysqli_query($con, $insert);

// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
session_destroy();
header('location: index.php');
?>