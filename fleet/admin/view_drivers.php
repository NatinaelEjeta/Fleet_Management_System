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
                            <?php } ?>
                            <div class="card-header">
                                <h5 class="card-title" style="text-align: center;"> List of Drivers
                                </h5>
                                <h6><a style="background-color: #3b7bbf; color: white;" class="btn btn-default"
                                        href="search_vehicle.php">
                                        <i class="nc-icon nc-simple-add" style="color: orange;"> <strong>
                                                New Driver</strong>
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
                                                <td>Driver Name</td>
                                                <td>Side Number</td>
                                                <td>Plate No</td>
                                                <td>Driver Id</td>
                                                <td>Phone</td>
                                                <td>Status</td>
                                                <td>Details</td>
                                                <td>Edit</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                              $query = "SELECT * FROM drivers";
                                              $results = mysqli_query($con, $query);
                                              while ($row = mysqli_fetch_array($results)) 
                                              {
                                                $company = $row['company'];
                                                $driverName = $row['driverName'];
                                                $sideNumber = $row['sideNumber'];
                                                $plate_number = $row['plate_number'];
                                                $driverId = $row['driverId'];
                                                $training_date = $row['training_date'];
                                                $medical_date = $row['medical_date'];
                                                $birth_date = $row['birth_date'];
                                                $education = $row['education'];
                                                $marital_status = $row['marital_status'];
                                                $employment_date = $row['employment_date'];
                                                $experience = $row['experience'];
                                                $phone = $row['phone'];
                                                $next_ddc_refresh_date = $row['next_ddc_refresh_date'];
                                                $next_medical_date = $row['next_medical_date'];
                                                $remarks = $row['remarks'];
                                                $status = $row['statuss'];
                                                $image = $row['image'];
                                                
                                                ?>

                                            <tr style="font-size: smaller;">
                                                <td> <?php echo $company; ?> </td>
                                                <td> <?php echo $driverName; ?> </td>
                                                <td> <?php echo $sideNumber; ?> </td>
                                                <td> <?php echo $plate_number; ?> </td>
                                                <td> <?php echo $driverId; ?> </td>
                                                <td> <?php echo $phone; ?> </td>

                                                <?php 
                                                    if($status == "Active"){ ?>
                                                <td style="color: darkgreen; font-weight: bolder;">
                                                    <?php echo $status; ?></td>
                                                <?php } else {?>
                                                <td style="color: orange; font-weight: bolder;"> <?php echo $status; ?>
                                                </td>
                                                <?php } ?>

                                                <td>
                                                    <a style="color: #33BFF2; font-weight:bolder;"
                                                        href="view_driver_details.php?id=<?php echo $driverId ?>">
                                                        <i style="font-weight:bolder;" class="fa fa-eye"> Details</i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a style="color: #33BFF2; font-weight:bolder;"
                                                        href="edit_driver_details.php?id=<?php echo $driverId ?>">
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