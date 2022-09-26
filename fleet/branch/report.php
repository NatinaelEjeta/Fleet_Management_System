<?php 
include('../session_control.php'); 
$user = $_SESSION['branch'];
$date = $_SESSION['lastDateSignedIn'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php include('header.php'); ?>

<!-- header -->

<body class="">
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->
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
                                <h6> Pick Date Range & Generate Report </h6>
                            </div>
                            <div class="card-body">

                                <form action="generate_report.php" method="post">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h5 class="card-title" style="text-align: center;">Date Range
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Date dd/mm/yyyy -->
                                                    <div class="form-group">
                                                        <label style="color:black;"><strong>From</strong></label>

                                                        <div class="input-group">
                                                            <input type="date" name="fromDate" value="" required="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->

                                                    <div class="form-group">
                                                        <label style="color:black;"><strong>To</strong></label>

                                                        <div class="input-group">
                                                            <input type="date" name="toDate" value="" required="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->


                                        </div>
                                        <div class="col-md-6">

                                            <div class="card card-default">
                                                <br><br><br><br><br><br><br><br>
                                                <div class="card-body">
                                                    <div class="form-group" style="float: right;">
                                                        <div class="input-group">
                                                            <input type="submit" name="generateReport"
                                                                value="Generate Report" required="true"
                                                                class="btn btn-default"
                                                                style="background-color: #33BFF2; border-radius: 20px;">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->


                                        </div>
                                        <!-- /.col (left) -->
                                    </div>
                                </form>
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