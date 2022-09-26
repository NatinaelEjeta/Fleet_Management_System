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
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-bank"></i>
                                        </div>
                                    </div>
                                    <?php 
                                    

                                     ?>

                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Transporter</p>
                                            <p class="card-title">
                                                <?php 
                                                $query = "SELECT * FROM transporter";
                                                $result = mysqli_query($con, $query);
                                                $transporter = mysqli_num_rows($result);
                                                echo $transporter;
                                                ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="view_transporter.php" class="btn btn-default"
                                        style="background-color: #3b7bbf; color: white;"><i
                                            class="nc-icon nc-alert-circle-i" style="color: orange;">
                                            <strong>Transporter</strong> </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-delivery-fast"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Total Vehicles</p>
                                            <p class="card-title">
                                                <?php 
                                                $query = "SELECT * FROM fleet_master";
                                                $result = mysqli_query($con, $query);
                                                $vehicles = mysqli_num_rows($result);
                                                echo $vehicles;
                                                ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="view_vehicles.php" class="btn btn-default"
                                        style="background-color: #3b7bbf; color: white;"><i
                                            class="nc-icon nc-alert-circle-i" style="color: orange;"> <strong>
                                                Vehicles</strong>
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-delivery-fast"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Active Vehicles</p>
                                            <p class="card-title">
                                                <?php 
                                                $query = "SELECT * FROM fleet_master WHERE statuss = 'Active'";
                                                $result = mysqli_query($con, $query);
                                                $vehicles = mysqli_num_rows($result);
                                                echo $vehicles;
                                                ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="view_active_vehicles.php" class="btn btn-default"
                                        style="background-color: #3b7bbf; color: white;"><i
                                            class="nc-icon nc-alert-circle-i" style="color: orange;"> <strong>
                                                Vehicles</strong>
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-delivery-fast"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Inactive Vehicles</p>
                                            <p class="card-title">
                                                <?php 
                                                $query = "SELECT * FROM fleet_master WHERE statuss = 'Inactive'";
                                                $result = mysqli_query($con, $query);
                                                $vehicles = mysqli_num_rows($result);
                                                echo $vehicles;
                                                ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="view_inactive_vehicles.php" class="btn btn-default"
                                        style="background-color: #3b7bbf; color: white;"><i
                                            class="nc-icon nc-alert-circle-i" style="color: orange;"> <strong>
                                                Vehicles</strong>
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-single-02"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Drivers</p>
                                            <p class="card-title">
                                                <?php 
                                                $query = "SELECT * FROM drivers";
                                                $result = mysqli_query($con, $query);
                                                $drivers = mysqli_num_rows($result);
                                                echo $drivers;
                                                ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="view_drivers.php" class="btn btn-default"
                                        style="background-color: #3b7bbf; color: white;"><i
                                            class="nc-icon nc-alert-circle-i" style="color: orange;"><strong>
                                                Drivers</strong>
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-bullet-list-67"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Next Trainees</p>
                                            <p class="card-title">
                                                <?php 
                                                $query = "SELECT * FROM drivers WHERE next_ddc_refresh_date BETWEEN '01/09/22' AND '30/09/22'";
                                                $result = mysqli_query($con, $query);
                                                $training = mysqli_num_rows($result);
                                                echo $training;
                                                ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="view_next_trainee.php" class="btn btn-default"
                                        style="background-color: #3b7bbf; color: orange;"><i
                                            class="nc-icon nc-simple-add" style="color: orange;"> <strong>
                                                Next Trainees</strong>
                                        </i>
                                    </a>
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