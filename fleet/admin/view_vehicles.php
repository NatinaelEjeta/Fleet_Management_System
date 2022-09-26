<?php 
include('../session_control.php'); 
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <?php
                            if(isset($_GET['message'])){ ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </button>
                                <span><b> Success - </b> <?php echo $_GET['message']; ?>
                                </span>
                            </div>
                            <?php  } ?>

                            <div class="card-header">
                                <h5 class="card-title" style="text-align: center;"> List of Vehicles
                                </h5>
                                <h6><a style="background-color: #3b7bbf; color: white;" class="btn btn-default"
                                        href="add_vehicle.php">
                                        <i class="nc-icon nc-simple-add" style="color: orange;"> <strong>
                                                New Vehicle</strong>
                                        </i>
                                    </a>
                                </h6>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr style="font-size: smaller; font-weight:bolder;">
                                                <td>Transporter</td>
                                                <td>Vehicle Id</td>
                                                <td>Plate No</td>
                                                <td>Model</td>
                                                <td>Type</td>
                                                <td>MFG</td>
                                                <td>Product</td>
                                                <td>Volume</td>
                                                <td>GPS Fitted</td>
                                                <td>Status</td>
                                                <td>Remark</td>
                                                <td>Edit</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                              $query = "SELECT * FROM fleet_master";
                                              $results = mysqli_query($con, $query);
                                              while ($row = mysqli_fetch_array($results)) 
                                              {
                                                $company = $row['company'];
                                                $vId = $row['vId'];
                                                $plate_no = $row['plate_no'];
                                                $model = $row['model'];
                                                $type = $row['type'];
                                                $mfg = $row['mfg'];
                                                $product = $row['product'];
                                                $volume = $row['volume'];
                                                $gps_fitted = $row['gps_fitted'];
                                                $statuss = $row['statuss'];
                                                $remark = $row['remark'];
                                                ?>

                                            <tr style="font-size: smaller;">
                                                <td> <?php echo $company; ?> </td>
                                                <td> <?php echo $vId; ?> </td>
                                                <td> <?php echo $plate_no; ?> </td>
                                                <td> <?php echo $model; ?> </td>
                                                <td> <?php echo $type; ?> </td>
                                                <td> <?php echo $mfg; ?> </td>
                                                <td> <?php echo $product; ?> </td>
                                                <td> <?php echo $volume; ?> </td>
                                                <td> <?php echo $gps_fitted; ?> </td>
                                                <td> <?php echo $statuss; ?> </td>
                                                <td> <?php echo $remark; ?> </td>
                                                <td>
                                                    <a style="color: #33BFF2; font-weight:bolder;"
                                                        href="edit_vehicle.php?id=<?php echo $plate_no ?>">
                                                        <i style="font-weight:bolder;" class="fa fa-edit"> Edit</i>
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