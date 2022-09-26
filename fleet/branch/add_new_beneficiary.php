<!DOCTYPE html>
<html lang="en">

<?php 
include('../session_control.php'); 
$user = $_SESSION['branch'];
$date = $_SESSION['lastDateSignedIn'];

$current_user = $_SESSION['username'];
$branch = $_SESSION['branch'];
$district =  $_SESSION['district'];

$query = "SELECT exchangeRate FROM exchange_rate";
$results = mysqli_query($con, $query);                                             
$row = mysqli_fetch_array($results);                                             
$exchangeRate = $row['exchangeRate']; 

@$recieverName = $_POST['recieverName'];

@$paymentDate = $_POST['paymentDate'];

@$recieverPhoneNumber = $_POST['recieverPhoneNumber'];

@$city = $_POST['city'];

@$subCity = $_POST['subCity'];

@$wereda = $_POST['wereda'];

@$senderName = $_POST['senderName'];

@$senderPhoneNumber = $_POST['senderPhoneNumber'];

@$moneyTransferAgent = $_POST['moneyTransferAgent'];

@$senderCountry = $_POST['senderCountry'];

@$currency = "USD";

@$amountSent = $_POST['amountSent'];

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

    $currency = "USD";

    $amountSent = mysqli_real_escape_string($con, $_POST['amountSent']);

    $amount = (int)$amountSent;

    $rate = (int)$exchangeRate;

    $amountInBirr = $amount * $rate;

    $lastDateContacted = $paymentDate;

    $beneficiaryId = substr($recieverName, 0, 3).'-'.date('His').'-'.date('dMY');  
     
    if(preg_match("/^[a-zA-Z\s]+$/",$recieverName))
    {
        if(preg_match("/^[0-9]+$/",$recieverPhoneNumber))
        {
          if(preg_match("/^[a-zA-Z\s]+$/",$city))
          {
              if(preg_match("/^[a-zA-Z\s]+$/",$subCity))
              {
                  if(preg_match("/^[a-zA-Z0-9\s]+$/",$wereda))
                  {
                      if(preg_match("/^[a-zA-Z\s]+$/",$senderName))
                      {
                          if(preg_match("/^[0-9]+$/",$senderPhoneNumber))
                          {
                              if(preg_match("/^[a-zA-Z\s]+$/",$moneyTransferAgent))
                              {
                                  if(preg_match("/^[a-zA-Z\s]+$/",$senderCountry))
                                  {                                   

                                    $query = "INSERT INTO remittance_beneficiary

                                    VALUES 
                  
                                    ('$beneficiaryId', '$recieverName', '$paymentDate', '$recieverPhoneNumber', 
                                    
                                    '$city', '$subCity', '$wereda' , '$senderName' , '$senderPhoneNumber', '$moneyTransferAgent', 
                                    
                                    '$senderCountry', '$currency', '$amountSent', '$amountInBirr', '$lastDateContacted', '$district', '$branch',  CURRENT_TIMESTAMP(), '$paymentDate')";
                  
                          $results = mysqli_query($con, $query);
                  
                          if ($results > 0) 
                          {
                            echo "<script>swal('Good','successfully registered','success');</script>";

                            @$recieverName = "";

                            @$paymentDate = "";

                            @$recieverPhoneNumber = "";

                            @$city = "";

                            @$subCity = "";

                            @$wereda = "";

                            @$senderName = "";

                            @$senderPhoneNumber = "";

                            @$moneyTransferAgent ="";

                            @$senderCountry = "";

                            @$currency = "USD";

                            @$amountSent ="";
                              
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
<!-- header -->
<?php include('header.php'); ?>
<!-- header -->
<script type="text/javascript" src="branch/sweetAlert/js/sweetalert.min.js"></script>

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
                                <h6> New Remittance Beneficiary Details
                                </h6>
                            </div>
                            <div class="card-body">

                                <form method="post" autocomplete="off">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="card card-default">

                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Reciever
                                                            Name</label>

                                                        <div class="input-group">
                                                            <input type="text" name="recieverName"
                                                                value="<?php echo $recieverName;?>" required="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Payment
                                                            Date</label>

                                                        <div class="input-group">
                                                            <input type="date" name="paymentDate"
                                                                value="<?php echo $paymentDate;?>" required="true"
                                                                class="form-control">
                                                        </div>

                                                    </div>

                                                    <!-- phone mask -->
                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Reciever Phone
                                                            Number</label>

                                                        <div class="input-group">
                                                            <input type="number" name="recieverPhoneNumber"
                                                                value="<?php echo $recieverPhoneNumber;?>"
                                                                class="form-control" required="true">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->

                                                    <!-- phone mask -->
                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">City</label>

                                                        <div class="input-group">
                                                            <input type="text" name="city" value="<?php echo $city;?>"
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
                                                                value="<?php echo $subCity;?>" class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Wereda /
                                                            Kebele</label>

                                                        <div class="input-group">
                                                            <input type="text" name="wereda"
                                                                value="<?php echo $wereda;?>" class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group" style="float: right;">
                                                        <label></label>
                                                        <div class="input-group">
                                                            <input type="submit" name="addBeneficiary"
                                                                value="Add Beneficiary" class="btn btn-default"
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
                                                                value="<?php echo $senderName;?>" required="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Sender Phone
                                                            Number</label>

                                                        <div class="input-group">
                                                            <input type="text" name="senderPhoneNumber"
                                                                value="<?php echo $senderPhoneNumber;?>" required="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Money Transfer
                                                            Agent</label>

                                                        <div class="input-group">
                                                            <input type="text" name="moneyTransferAgent"
                                                                value="<?php echo $moneyTransferAgent;?>"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Sender
                                                            Country</label>

                                                        <div class="input-group">
                                                            <input type="text" name="senderCountry"
                                                                value="<?php echo $senderCountry;?>"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            style="color: black; font-weight: bolder;">Currency</label>

                                                        <div class="input-group">
                                                            <input type="text" name="currency" id="input_currency"
                                                                readonly="true" value="USD" class="form-control">
                                                            <input type="text" name="currency" id="output_currency"
                                                                readonly="true" value="ETB" class="form-control"
                                                                style="display: none;">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Amount
                                                            Sent</label>

                                                        <div class="input-group">
                                                            <input type="text" name="amountSent" id="input_amount"
                                                                value="<?php echo $amountSent;?>" class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="result">
                                                            <div style="color:#33BFF2; font-weight:bolder;" class="rate"
                                                                id="rate"><?php echo "1 USD = $exchangeRate ETB"; ?>
                                                            </div>
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