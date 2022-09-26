<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];
$district = $_SESSION['district'];
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
                                <h4 class="card-title" style="text-align: center;"> List of Remittance Beneficiaries for
                                    branches under <?php echo $district; ?> District.
                                </h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Beneficiary Id</th>
                                                <th>Receiver Name</th>
                                                <th>Payment Date</th>
                                                <th>District</th>
                                                <th>Branch</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                $query = "SELECT * FROM remittance_beneficiary WHERE district = '$district'";
                                                $results = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_array($results)) 
                                                {

                                                    $beneficiaryId = $row['beneficiaryId'];

                                                    $recieverName = $row['recieverName'];

                                                    $paymentDate = $row['paymentDate'];

                                                    $district = $row['district'];

                                                    $branch = $row['branch']; ?>

                                            <tr>
                                                <td> <?php echo $beneficiaryId; ?> </td>
                                                <td> <?php echo $recieverName; ?> </td>
                                                <td> <?php echo $paymentDate; ?> </td>
                                                <td> <?php echo $district; ?> </td>
                                                <td> <?php echo $branch; ?> </td>
                                                <th>
                                                    <a class="btn btn-default" style="background-color: #33BFF2;"
                                                        href="beneficiary_details.php?id=<?php echo $beneficiaryId ?>">
                                                        Details
                                                    </a>
                                                </th>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Beneficiary Id</th>
                                                <th>Receiver Name</th>
                                                <th>Payment Date</th>
                                                <th>District</th>
                                                <th>Branch</th>
                                                <th>Details</th>
                                            </tr>
                                        </tfoot>

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