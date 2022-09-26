<?php 
include('../session_control.php'); 
if (isset($_GET['id']) and $_GET['id']) {
    $Id  = $_GET['id'];
}
$user = $_SESSION['branch'];
$date = $_SESSION['lastDateSignedIn'];
$current_user = $_SESSION['username'];
$branch = $_SESSION['branch'];
$district =  $_SESSION['district'];
if (isset($_GET['id']) and $_GET['id']) 
{
    $Id  = $_GET['id'];
}
echo "<html><script type='text/javascript' src='sweetAlert/js/sweetalert.min.js'></script></html>";
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

    $amountInBirr = mysqli_real_escape_string($con, $_POST['amountInBirr']);

    $lastDateContacted = mysqli_real_escape_string($con, $_POST['lastDateContacted']);
    
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
                  amountInBirr = '$amountInBirr',
                  lastDateContacted = '$lastDateContacted',
                  lastDateEdited = concat(lastDateEdited,', $lastDateContacted')
                  WHERE beneficiaryId = '$Id'
                 ";
                  
                          $results = mysqli_query($con, $query);
                  
                          if ($results > 0) 
                          {  
                              echo "<script>swal('Good','Successfully Updated!','success');</script>";
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
        }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php include('header.php'); ?>

<!-- header -->

<body class="">
    <div class="wrapper ">
        <!-- nav start -->

        <?php include('navbar.php'); ?>

        <!-- nav end -->

        <!-- main start -->

        <div class="main-panel">
            <!-- Navbar -->
            <?php include('nav.php'); ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="text-align: center;">
                                <p style="text-align: left;"> <a href="dashboard.php" style="color: #33BFF2;"
                                        title="Return to Home">
                                        <i style="font-weight: bolder;" class="fa fa-arrow-left" aria-hidden="true">
                                            Back</i> </a></p>
                                <h5> Edit Remittance Beneficiary Details
                                </h5>
                            </div>
                            <div class="card-body">
                                <?php

                  $query = "SELECT * FROM remittance_beneficiary WHERE beneficiaryId = '$Id'";
                  $results = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_array($results)) {

                    $beneficiaryId = $row['beneficiaryId'];

                    $recieverName = $row['recieverName'];

                    $paymentDate = $row['paymentDate'];

                    $recieverPhoneNumber = $row['recieverPhoneNumber'];

                    $city = $row['city'];

                    $subCity = $row['subCity'];

                    $wereda = $row['wereda'];

                    $senderName = $row['senderName'];

                    $senderPhoneNumber = $row['senderPhoneNumber'];

                    $moneyTransferAgent = $row['moneyTransferAgent'];

                    $senderCountry = $row['senderCountry'];

                    $currency = $row['currency'];

                    $currency = $row['currency'];

                    $amountSent = $row['amountSent'];

                    $amountInBirr = $row['amountInBirr'];

                    $lastDateContacted = $row['lastDateContacted'];

                    $district = $row['district'];

                    $branch = $row['branch'];

                  ?>

                                <form action="edit_beneficiary_database.php?id=<?php echo $beneficiaryId ?>"
                                    method="post">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="card card-default">

                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Reciever
                                                            Name</label>

                                                        <div class="input-group">
                                                            <input type="text" name="recieverName"
                                                                value="<?php echo $recieverName; ?>" required="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Payment
                                                            Date</label>

                                                        <div class="input-group">
                                                            <input type="date" name="paymentDate"
                                                                value="<?php echo $paymentDate; ?>" required="true"
                                                                class="form-control">
                                                        </div>

                                                    </div>

                                                    <!-- phone mask -->
                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Reciever Phone
                                                            Number</label>

                                                        <div class="input-group">
                                                            <input type="text" name="recieverPhoneNumber"
                                                                value="<?php echo $recieverPhoneNumber; ?>"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->

                                                    <!-- phone mask -->
                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">City</label>

                                                        <div class="input-group">
                                                            <input type="text" name="city" value="<?php echo $city; ?>"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->

                                                    <!-- IP mask -->
                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Sub
                                                            City</label>

                                                        <div class="input-group">
                                                            <input type="text" name="subCity"
                                                                value="<?php echo $subCity; ?>" class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Wereda /
                                                            Kebele</label>

                                                        <div class="input-group">
                                                            <input type="text" name="wereda"
                                                                value="<?php echo $wereda; ?>" class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group" style="float: right;">
                                                        <label></label>
                                                        <div class="input-group">
                                                            <input type="submit" name="updateBeneficiary"
                                                                value="Update Beneficiary" class="btn btn-default"
                                                                style="background-color: #33BFF2; border-radius: 20px;">

                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <!-- /.form group -->

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->


                                        </div>
                                        <!-- /.col (left) -->
                                        <div class="col-md-6">
                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <!-- Date -->

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Sender
                                                            Name</label>

                                                        <div class="input-group">
                                                            <input type="text" name="senderName"
                                                                value="<?php echo $senderName; ?>" required="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Sender Phone
                                                            Number</label>

                                                        <div class="input-group">
                                                            <input type="text" name="senderPhoneNumber"
                                                                value="<?php echo $senderPhoneNumber; ?>"
                                                                required="true" class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Money Transfer
                                                            Agent</label>

                                                        <div class="input-group">
                                                            <input type="text" name="moneyTransferAgent"
                                                                value="<?php echo $moneyTransferAgent; ?>"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Sender
                                                            Country</label>

                                                        <div class="input-group">
                                                            <input type="text" name="senderCountry"
                                                                value="<?php echo $senderCountry; ?>"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            style="color: black; font-weight: bolder;">Currency</label>

                                                        <div class="input-group">
                                                            <input type="text" name="currency"
                                                                value="<?php echo $currency; ?>" class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Amount
                                                            Sent</label>

                                                        <div class="input-group">
                                                            <input type="text" name="amountSent"
                                                                value="<?php echo $amountSent; ?>" class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Amount
                                                            In ETB</label>

                                                        <div class="input-group">
                                                            <input type="text" name="amountInBirr"
                                                                value="<?php echo $amountInBirr; ?>"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Last Date
                                                            Contacted</label>

                                                        <div class="input-group">
                                                            <input type="date" name="lastDateContacted"
                                                                value="<?php echo $lastDateContacted; ?>"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                </div>

                                            </div>

                                            <!-- /.input group -->
                                        </div>

                                        <!-- /.form group -->
                                        <!-- /.card-body -->
                                    </div>
                                    <?php
                  } 
                                    ?>
                                    <!-- /.card -->
                                </form>
                            </div>
                            <!-- /.col (right) -->

                        </div>
                    </div>

                </div>
                <!-- footer -->

                <?php include('footer.php'); ?>

                <!-- footer -->

            </div>


            <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": true
                });
                $('#example2').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
            </script>

            <!-- end main bar -->
        </div>


</body>

</html>