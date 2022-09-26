<?php 
include('../session_control.php'); 
if (isset($_GET['id']) and $_GET['id']) 
{
    $Id  = $_GET['id'];
}
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <p style="text-align: left;"> <a href="dashboard.php" style="color: #33BFF2;"
                                    title="Return to Home">
                                    <i style="font-weight: bolder;" class="fa fa-arrow-left" aria-hidden="true">
                                        Back</i> </a></p>
                            <h5 style="text-align: center;"> Remittance Beneficiary Details
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-default" style="font-size: smaller;">

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

                                            $amountSent = $row['amountSent'];

                                            $amountInBirr = $row['amountInBirr'];

                                            $lastDateContacted = $row['lastDateContacted']; 

                                            $lastDateEdited = $row['lastDateEdited'];

                                            $district = $row['district'];

                                            $branch = $row['branch']; ?>

                                        <div class="card-body">
                                            <p><strong>Branch:</strong> <?php echo $branch; ?> </p>
                                            <p><strong>District:</strong> <?php echo $district; ?> </p>
                                        </div>

                                        <div class="card-body">
                                            <p><strong>Receiver Name:</strong> <?php echo $recieverName; ?> </p>
                                            <p><strong>Payment Date:</strong> <?php echo $paymentDate; ?> </p>
                                            <p><strong>Phone Number:</strong> <?php echo $recieverPhoneNumber; ?> </p>
                                            <p><strong>City:</strong> <?php echo $city; ?> </p>
                                            <p><strong>Sub City:</strong> <?php echo $subCity; ?> </p>
                                            <p><strong>Wereda / Kebele:</strong> <?php echo $wereda; ?> </p>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- /.col (left) -->
                                <div class="col-md-6">
                                    <div class="card card-default" style="font-size: smaller;">

                                        <div class="card-body">
                                            <p><strong>Sender Name:</strong> <?php echo $senderName; ?> </p>
                                            <p><strong>Sender Phone Number:</strong> <?php echo $senderPhoneNumber; ?>
                                            </p>
                                            <p><strong>Sender Country:</strong> <?php echo $senderCountry; ?> </p>
                                        </div>

                                        <div class="card-body">
                                            <p><strong>Money Transfer Agent:</strong> <?php echo $moneyTransferAgent; ?>
                                            </p>
                                            <p><strong>Amount in USD:</strong>
                                                <?php echo "$amountSent   $currency"; ?></p>
                                            <p><strong>Amount in ETB:</strong>
                                                <?php echo "$amountInBirr  ETB"; ?>
                                                <span style="color:#33BFF2; font-weight:bolder;"> (Calculated by
                                                    Exchange Rate Applied
                                                    during
                                                    <?php echo $paymentDate; ?>
                                                    day)</span>
                                            </p>
                                            <p><strong>Last Date Contacted:</strong>
                                                <?php echo $lastDateContacted; ?>
                                            </p>
                                            <p><strong>previous Contacts:</strong>
                                                <?php echo $lastDateEdited; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>

                                <?php 
                  }
                                ?>
                            </div>
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