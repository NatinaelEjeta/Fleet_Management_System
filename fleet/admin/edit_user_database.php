<?php
include('../session_control.php');
$current_user = $_SESSION['username'];
$branch = $_SESSION['branch'];
$district =  $_SESSION['district'];
if (isset($_GET['id']) and $_GET['id']) 
{
    $Id  = $_GET['id'];
}
if (isset($_POST['updateUser'])) 
{
    $username = mysqli_real_escape_string($con, $_POST['username']);

    $userType = mysqli_real_escape_string($con, $_POST['userType']);

    $district = mysqli_real_escape_string($con, $_POST['district']);

    $branch = mysqli_real_escape_string($con, $_POST['branch']);

        $query = "UPDATE users
                  SET 
                  username = '$username', 
                  userType = '$userType', 
                  district = '$district', 
                  branch = '$branch'
                  WHERE userId = '$Id'
                 ";

        $results = mysqli_query($con, $query);

        if ($results > 0) 
        { ?>
<script>
alert('Updated Successfully!')
</script>

<?php 
header('location: view_user.php');
}
        else
        {
            echo "Error inserting record: " . mysqli_error($con);
        }
}

?>