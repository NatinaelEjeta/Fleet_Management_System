<?php
include('../session_control.php');
$current_user = $_SESSION['username'];
$branch = $_SESSION['branch'];
$district =  $_SESSION['district'];
echo "<html><script type='text/javascript' src='sweetAlert/js/sweetalert.min.js'></script></html>";
if (isset($_POST['addBeneficiary'])) 
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

    $beneficiaryId = substr($recieverName, 0, 3).'-'.date('His').'-'.date('dMY');  
    
    $dateDisplay = date("F j, Y", strtotime($lastDateContacted));
    
    if(preg_match("/^[a-zA-Z]+$/",$recieverName))
    {
        if(preg_match("/^[0-9]+$/",$recieverPhoneNumber))
        {
          if(preg_match("/^[a-zA-Z]+$/",$city))
          {
              if(preg_match("/^[a-zA-Z]+$/",$subCity))
              {
                  if(preg_match("/^[a-zA-Z0-9]+$/",$wereda))
                  {
                      if(preg_match("/^[a-zA-Z]+$/",$senderName))
                      {
                          if(preg_match("/^[0-9]+$/",$senderPhoneNumber))
                          {
                              if(preg_match("/^[a-zA-Z]+$/",$moneyTransferAgent))
                              {
                                  if(preg_match("/^[a-zA-Z]+$/",$senderCountry))
                                  {
                                    $query = "INSERT INTO remittance_beneficiary

                                    VALUES 
                  
                                    ('$beneficiaryId', '$recieverName', '$paymentDate', '$recieverPhoneNumber', 
                                    
                                    '$city', '$subCity', '$wereda' , '$senderName' , '$senderPhoneNumber', '$moneyTransferAgent', 
                                    
                                    '$senderCountry', '$currency', '$amountSent', '$dateDisplay', '$district', '$branch',  CURRENT_TIMESTAMP(), '')";
                  
                          $results = mysqli_query($con, $query);
                  
                          if ($results > 0) 
                          {  
                              echo "<script>swal('Good','Successfully Registered!','success');</script>";
                              //header('location: dashboard.php');
                          }
                          else
                          {
                              echo "Error inserting record: " . mysqli_error($con);
                          }  
                                }
                                  else{
                                    echo "<script>swal('OOPS','Please enter sender countr name','error');</script>";
                                  }
                              }
                              else{
                                echo "<script>swal('OOPS','Please enter correct money transfer agent','error');</script>";
                              }
                          }
                          else{
                            echo "<script>swal('OOPS','Please enter correct sender phone number','error');</script>";
                          }
                      }
                      else{
                        echo "<script>swal('OOPS','Please enter correct sender name','error');</script>";
                      }
                  }
                  else{
                    echo "<script>swal('OOPS','Please enter correct wereda name','error');</script>";
                  }
              }
              else{
                echo "<script>swal('OOPS','Please enter correct sub- city name','error');</script>";
              }
          }  
          else{
            echo "<script>swal('OOPS','Please enter correct city name','error');</script>";
          }
        }
        else{
            echo "<script>swal('OOPS','Please enter correct receiver phone number','error');</script>";
        }
    }
        else{
            echo "<script>swal('OOPS','Please enter correct receiver name','error');</script>";
            header('Location:dashboard.php');
        }
    
}

?>