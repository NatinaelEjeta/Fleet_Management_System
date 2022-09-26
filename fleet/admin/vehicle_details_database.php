<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];

if (isset($_POST['add_vehicle'])) 
{
    $transporter = mysqli_real_escape_string($con, $_POST['transporter']);
    
    $volume = mysqli_real_escape_string($con, $_POST['volume']);

    $model = mysqli_real_escape_string($con, $_POST['model']);

    $mfg = mysqli_real_escape_string($con, $_POST['mfg']);

    $product = mysqli_real_escape_string($con, $_POST['product']);

    $status = "Active";

    $plate_no = mysqli_real_escape_string($con, $_POST['plate_no']);

    $type = mysqli_real_escape_string($con, $_POST['type']);

    $vId = mysqli_real_escape_string($con, $_POST['vId']);

    $gps_fitted = mysqli_real_escape_string($con, $_POST['gps_fitted']);

    $remark = mysqli_real_escape_string($con, $_POST['remark']);

    $insert = "INSERT INTO fleet_master 
               VALUES 
               ('$transporter', '$vId', '$plate_no', 
                '$model', '$type', '$mfg', '$product',
                '$volume', '$gps_fitted', '$status', '$remark'
                )";

    $result = mysqli_query($con, $insert);
    if($result > 0){
        header('Location: view_vehicles.php?message='.$vId.' Added Successfully!');
    } else {
        echo mysqli_error($con);
    }
}

?>