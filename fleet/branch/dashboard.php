<?php 
include('../session_control.php'); 
$user = $_SESSION['branch'];
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
                                <h6 class="card-title" style="text-align: center;"> List of Remittance Beneficiaries
                                </h6>
                                <p> <a style="background-color: #33BFF2; color:white; border-radius: 20px;"
                                        href="add_new_beneficiary.php" class="btn btn-default"
                                        title="Register new beneficiary" title="Return to Home">
                                        <i style="font-weight: bolder;" class="fa fa-plus-circle" aria-hidden="true">
                                            New Beneficiary</i></a>
                                </p>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <td style="font-size: smaller; font-weight:bolder;">Beneficiary Id</td>
                                                <td style="font-size: smaller; font-weight:bolder;">Receiver Name</td>
                                                <td style="font-size: smaller; font-weight:bolder;">Payment Date</td>
                                                <td style="font-size: smaller; font-weight:bolder;">Sender Name</td>
                                                <td style="font-size: smaller; font-weight:bolder;">Amount</td>
                                                <td style="font-size: smaller; font-weight:bolder;">Details</td>
                                                <td style="font-size: smaller; font-weight:bolder;">Edit</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $query = "SELECT * FROM remittance_beneficiary WHERE branch = '$branch'";
                                            $results = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($results)) {

                                                $beneficiaryId = $row['beneficiaryId'];  

                                                $recieverName = $row['recieverName'];

                                                $paymentDate = $row['paymentDate'];

                                                $senderName = $row['senderName'];

                                                $currency = $row['currency'];

                                                $amountSent = $row['amountSent']; ?>
                                            <tr>
                                                <td style="font-size: smaller;"> <?php echo $beneficiaryId; ?> </td>
                                                <td style="font-size: smaller;"> <?php echo $recieverName; ?> </td>
                                                <td style="font-size: smaller;"> <?php echo $paymentDate; ?> </td>
                                                <td style="font-size: smaller;"> <?php echo $senderName; ?>
                                                </td>
                                                <td style="font-size: smaller;"> <?php echo "$amountSent $currency"; ?>
                                                </td>
                                                <td style="font-size: smaller; ">
                                                    <a style="color: #33BFF2;"
                                                        href="beneficiary_details.php?id=<?php echo $beneficiaryId ?>"
                                                        title="See beneficiary detail">
                                                        <i style="font-weight: bolder;" class="fa fa-info-circle"
                                                            aria-hidden="true">
                                                            Details</i>
                                                    </a>
                                                </td>
                                                <td style="font-size: smaller; ">
                                                    <a style="color: #33BFF2; "
                                                        href="edit_beneficiary.php?id=<?php echo $beneficiaryId ?>"
                                                        title="Edit beneficiary detail">
                                                        <i style="font-weight: bolder;" class="fa fa-edit"
                                                            aria-hidden="true">
                                                            Edit</i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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

        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top btn-hover">
            <i class="lni lni-chevron-up"></i>
        </a>
</body>

</html>