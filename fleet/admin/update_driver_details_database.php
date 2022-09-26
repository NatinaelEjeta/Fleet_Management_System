<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];

if (isset($_GET['id']) && isset($_POST['update_driver'])) 
{
    $id = $_GET['id'];

    $transporter = mysqli_real_escape_string($con, $_POST['transporter']);
    
    $driver_id = mysqli_real_escape_string($con, $_POST['driver_id']);

    $full_name = $_POST['full_name'];

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

    $status = mysqli_real_escape_string($con, $_POST['status']);

    $driver_photo = $_FILES["driver_photo"]["name"];

    $tempname = $_FILES["driver_photo"]["tmp_name"];

    $folder = "./image/" . $driver_photo;

    if($driver_photo == ""){
        $insert = "UPDATE drivers SET
                
                company =  '$transporter', 
                driverName = '$full_name', 
                sideNumber = '$vId', 
                plate_number = '$plate_no', 
                training_date = '$training_date', 
                medical_date = '$medical_date', 
                birth_date = '$birth_date',
                education = '$education', 
                marital_status = '$marital_status', 
                employment_date = '$employment_date', 
                experience = '$experience',
                phone = '$phone', 
                next_ddc_refresh_date = '$next_ddc_refresh_date', 
                next_medical_date = '$next_medical_date', 
                remarks = '$remark',
                statuss = '$status'
                WHERE driverId = '$id'
                ";
    } else {
               $insert = "UPDATE drivers SET
                
                company =  '$transporter', 
                driverName = '$full_name', 
                sideNumber = '$vId', 
                plate_number = '$plate_no', 
                training_date = '$training_date', 
                medical_date = '$medical_date', 
                birth_date = '$birth_date',
                education = '$education', 
                marital_status = '$marital_status', 
                employment_date = '$employment_date', 
                experience = '$experience',
                phone = '$phone', 
                next_ddc_refresh_date = '$next_ddc_refresh_date', 
                next_medical_date = '$next_medical_date', 
                remarks = '$remark',
                statuss = '$status',
                image = '$driver_photo'
                WHERE driverId = '$id'
                ";
    }

    $result = mysqli_query($con, $insert);
    if($result > 0){
        move_uploaded_file($tempname, $folder);
        header('Location: view_drivers.php?message='.$full_name.' Data Updated Successfully!');
    } else {
        echo mysqli_error($con);
    }
}
?>