<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];

if (isset($_POST['update_vehicle'])) 
{
    $transporter = mysqli_real_escape_string($con, $_POST['transporter']);
    
    $volume = mysqli_real_escape_string($con, $_POST['volume']);

    $model = mysqli_real_escape_string($con, $_POST['model']);

    $mfg = mysqli_real_escape_string($con, $_POST['mfg']);

    $product = mysqli_real_escape_string($con, $_POST['product']);

    $status = mysqli_real_escape_string($con, $_POST['status']);

    $plate_no = mysqli_real_escape_string($con, $_POST['plate_no']);

    $type = mysqli_real_escape_string($con, $_POST['type']);

    $vId = mysqli_real_escape_string($con, $_POST['vId']);

    $gps_fitted = mysqli_real_escape_string($con, $_POST['gps_fitted']);

    $remark = mysqli_real_escape_string($con, $_POST['remark']);

    $update = "UPDATE fleet_master SET
                
                company = '$transporter', 
                vId = '$vId',
                model = '$model', 
                type = '$type', 
                mfg = '$mfg', 
                product = '$product',
                volume = '$volume',
                gps_fitted = '$gps_fitted',
                statuss = '$status', 
                remark = '$remark'
                WHERE plate_no = '$plate_no'
                ";

    $result = mysqli_query($con, $update);
    if($result > 0){
        $sql = "UPDATE drivers SET statuss = '$status' WHERE plate_number = '$plate_no'";
        $res = mysqli_query($con, $sql);

        header('Location: view_vehicles.php?message='.$plate_no.' Updated Successfully!');
    } else {
        echo mysqli_error($con);
    }
}

?>