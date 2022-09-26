<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];

echo "<html><script type='text/javascript' src='sweetAlert/js/sweetalert.min.js'></script></html>";
if (isset($_POST['add_driver'])) 
{
    $transporter = mysqli_real_escape_string($con, $_POST['transporter']);
    
    $driver_id = mysqli_real_escape_string($con, $_POST['driver_id']);

    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);

    $middle_name = mysqli_real_escape_string($con, $_POST['middle_name']);

    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);

    $full_name = "$first_name  $middle_name  $last_name";

    $plate_no = mysqli_real_escape_string($con, $_POST['plate_no']);

    $vId = mysqli_real_escape_string($con, $_POST['vId']);

    $training_date = mysqli_real_escape_string($con, $_POST['training_date']);

    $medical_date = mysqli_real_escape_string($con, $_POST['medical_date']);

    $birth_date = mysqli_real_escape_string($con, $_POST['birth_date']);

    $employment_date = mysqli_real_escape_string($con, $_POST['employment_date']);

    $education = mysqli_real_escape_string($con, $_POST['education']);

    $marital_status = mysqli_real_escape_string($con, $_POST['marital_status']);

    $experience = mysqli_real_escape_string($con, $_POST['experience']);

    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $next_ddc_refresh_date = mysqli_real_escape_string($con, $_POST['next_ddc_refresh_date']);

    $next_medical_date = mysqli_real_escape_string($con, $_POST['next_medical_date']);

    $remark = mysqli_real_escape_string($con, $_POST['remark']);

    $driver_photo = $_FILES["driver_photo"]["name"];

    $tempname = $_FILES["driver_photo"]["tmp_name"];

    $folder = "./image/" . $driver_photo;

    $insert = "INSERT INTO drivers 
               VALUES 
               ('','$transporter', '$full_name', '$vId', '$plate_no', 
                '$driver_id', '$training_date', '$medical_date', '$birth_date',
                '$education', '$marital_status', '$employment_date', '$experience',
                '$phone', '$next_ddc_refresh_date', '$next_medical_date', '$remark','Active',
                '$driver_photo'
                )";

    $result = mysqli_query($con, $insert);
    if($result > 0){
        move_uploaded_file($tempname, $folder);
        header('Location: search_vehicle.php?message='.$full_name.' Added Successfully!');
    } else {
        echo mysqli_error($con);
    }
}

?>