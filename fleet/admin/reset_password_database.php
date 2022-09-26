<?php
include('../session_control.php');
$current_user = $_SESSION['username'];
$branch = $_SESSION['branch'];
$district =  $_SESSION['district'];
if (isset($_POST['resetPassword'])) 
{
    $userId = mysqli_real_escape_string($con, $_POST['userId']);

    $newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);

    $confirmNewPassword = mysqli_real_escape_string($con, $_POST['confirmNewPassword']);

    $password = base64_encode($newPassword);

        $query = "UPDATE users

                  SET 

                  passwords = '$password'
                  
                  WHERE userId = '$userId'";

        $results = mysqli_query($con, $query);

        if ($results > 0) 
        {
            header('location: dashboard.php');
        }
        else
        {
            echo "Error inserting record: " . mysqli_error($con);
        }
}

?>