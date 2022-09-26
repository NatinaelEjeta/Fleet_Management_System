<?php
include('../session_control.php');
$current_user = $_SESSION['username'];
$branch = $_SESSION['branch'];
$district =  $_SESSION['district'];
echo "<html><script type='text/javascript' src='sweetAlert/js/sweetalert.min.js'></script></html>";
if (isset($_GET['id']) and $_GET['id']) 
{
    $Id  = $_GET['id'];
}
if (isset($_POST['updateBeneficiary'])) 
{
    $recieverName = mysqli_real_escape_string($con, $_POST['recieverName']);

    $paymentDate = mysqli_real_escape_string($con, $_POST['paymentDate']);

    $recieverPhoneNumber = mysqli_real_escape_string($con, $_POST['recieverPhoneNumber']);

    $city = mysqli_real_escape_string($con, $_POST['city']);

    $subCity = mysqli_real_escape_string($con, $_POST['subCity']);

    $wereda = mysqli_real_escape_string($con, $_POST['wereda']);

    $senderName = mysqli_real_escape_string($con, $_POST['senderName']);

    $senderPhoneNumber = mysqli_real_escape_string($con, $_POST['senderPhoneNumber']);

    $moneyTransferAgent = mysqli_real_escape_string($con, $_POST['moneyTransferAgent']);

    $senderCountry = mysqli_real_escape_string($con, $_POST['senderCountry']);

    $currency = mysqli_real_escape_string($con, $_POST['currency']);

    $amountSent = mysqli_real_escape_string($con, $_POST['amountSent']);

    $lastDateContacted = mysqli_real_escape_string($con, $_POST['lastDateContacted']);

    if($lastDateContacted == "")
    {

        $query = "UPDATE remittance_beneficiary
                  SET 
                  recieverName = '$recieverName', 
                  paymentDate = '$paymentDate', 
                  recieverPhoneNumber = '$recieverPhoneNumber', 
                  city = '$city', 
                  subCity = '$subCity', 
                  wereda = '$wereda' , 
                  senderName = '$senderName', 
                  senderPhoneNumber = '$senderPhoneNumber', 
                  moneyTransferAgent = '$moneyTransferAgent', 
                  senderCountry = '$senderCountry', 
                  currency = '$currency', 
                  amountSent = '$amountSent',
                  lastDateContacted = '$lastDateContacted',
                  lastDateEdited = concat(lastDateEdited,', $lastDateContacted')
                  WHERE beneficiaryId = '$Id'
                 ";

        $results = mysqli_query($con, $query);

        if ($results > 0) 
        {
            echo "<script>swal('Good','successfully Updated!','success');</script>"; header('location: dashboard.php'); }
        else
        {
            echo "Error inserting record: " . mysqli_error($con);
        }
    }
    else
    {

        $query = "UPDATE remittance_beneficiary
                  SET 
                  recieverName = '$recieverName', 
                  paymentDate = '$paymentDate', 
                  recieverPhoneNumber = '$recieverPhoneNumber', 
                  city = '$city', 
                  subCity = '$subCity', 
                  wereda = '$wereda' , 
                  senderName = '$senderName', 
                  senderPhoneNumber = '$senderPhoneNumber', 
                  moneyTransferAgent = '$moneyTransferAgent', 
                  senderCountry = '$senderCountry', 
                  currency = '$currency', 
                  amountSent = '$amountSent', 
                  lastDateContacted = '$lastDateContacted',
                  lastDateEdited = concat(lastDateEdited,', $lastDateContacted')
                  WHERE beneficiaryId = '$Id'
                 ";

        $results = mysqli_query($con, $query);

        if ($results > 0) 
        {
            echo "<script>swal('Good','successfully Updated!','success');</script>";
        //header('location: dashboard.php');
        }
        else
        {
            echo "Error inserting record: " . mysqli_error($con);
        }
    }
}

?>