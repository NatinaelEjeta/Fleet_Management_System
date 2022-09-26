<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];
$branch = $_SESSION['branch'];
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
                            <div class="card-header">
                                <a href="dashboard.php" style="color: #33BFF2; text-align: left;"
                                    title="Return to Home">
                                    <i style="font-weight: bolder;" class="fa fa-arrow-left" aria-hidden="true">
                                        Back</i> </a>
                                <button class="btn btn-default"
                                    style="background-color: #33BFF2; border-radius: 20px; float:right;"
                                    onclick="printContent('print')">Export to Pdf
                                </button>
                                <button class="btn btn-default"
                                    style="background-color: #33BFF2; border-radius: 20px; float:right;"
                                    onclick="ExportToExcel('xlsx')">Export to
                                    Excel
                                </button>
                            </div>
                            <div>
                                <div class="card-header">
                                    <?php

                                if (isset($_POST['generateReport'])) 
                                {
                                  $from = strtotime(mysqli_real_escape_string($con, $_POST['fromDate']));

                                  $from_date = date("F j, Y", $from);

                                  $to = strtotime(mysqli_real_escape_string($con, $_POST['toDate']));

                                  $to_date = date("F j, Y", $to); ?>
                                </div>
                                <div class="card-body" id="print">
                                    <div class="table-responsive">
                                        <table id="tbl_exporttable_to_xls" class="table table-striped "
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <td colspan="14" style="text-align: center; font-weight:bolder;">
                                                        Report on Remittance
                                                        Beneficiaries
                                                        from
                                                        <?php echo "<span style='color: #33BFF2; font-weight:bolder;'>$from_date</span>"; ?>
                                                        to
                                                        <?php echo "<span style='color: #33BFF2; font-weight:bolder;'>$to_date</span>"; ?>
                                                        for all
                                                        Districts
                                                        <?php }  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: smaller; font-weight:bolder;">Branch</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">District</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Receiver Name
                                                    </td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Receiver Phone
                                                        Number</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">City</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Sub City</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Wereda</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Payment Date
                                                    </td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Sender Name</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Sender Phone
                                                        Number</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Sender Country
                                                    </td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Money Transfer
                                                        Agent</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Amount</td>
                                                    <td style="font-size: smaller; font-weight:bolder;">Date Contacted
                                                    </td>
                                                </tr>
                                            </thead>
                                            <?php

                                            $from = mysqli_real_escape_string($con, $_POST['fromDate']);

                                            $to = mysqli_real_escape_string($con, $_POST['toDate']); 

                                            $query = "SELECT * FROM remittance_beneficiary
                                            WHERE paymentDate
                                            BETWEEN '" . $from . "' AND '" . $to . "'";

                                            $results = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($results))
                                            {

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

                                            $lastDateContacted = $row['lastDateContacted'];

                                            $districtes = $row['district'];

                                            $branches = $row['branch']; ?>

                                            <tbody>
                                                <tr>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $branches; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $districtes; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $recieverName; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $recieverPhoneNumber; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $city; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $subCity; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $wereda; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $paymentDate; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $senderName; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $senderPhoneNumber; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $senderCountry; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $moneyTransferAgent; ?>
                                                    </td>

                                                    <td style="font-size: smaller;">
                                                        <?php echo "$amountSent $currency"; ?>
                                                    </td>
                                                    <td style="font-size: smaller;">
                                                        <?php echo $lastDateContacted; ?>
                                                    </td>

                                                </tr>

                                            </tbody>
                                            <?php } ?>

                                        </table>
                                    </div>
                                </div>
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