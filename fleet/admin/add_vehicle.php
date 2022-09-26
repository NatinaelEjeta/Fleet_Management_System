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
                            <div class="card-header">
                                <h5 class="card-title" style="text-align: center;">Add Vehicle Detail</h5>
                            </div>

                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card card-user">

                                        <div class="card-body">

                                            <form action="vehicle_details_database.php" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-md-12 pr-1">
                                                        <div class="form-group">
                                                            <label>Transporter</label>
                                                            <select name="transporter" class="form-control">
                                                                <option selected disabled>Select Transporter</option>
                                                                <?php 
                                                                $select = "SELECT * FROM transporter";
                                                                $result = mysqli_query($con, $select);
                                                                while($row = mysqli_fetch_array($result)){ ?>
                                                                <option value="<?php echo $row['company']; ?>">
                                                                    <?php echo $row['company']; ?></option>
                                                                <?php }
                                                                ?>


                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>Plate Number</label>
                                                            <input type="text" name="plate_no" class="form-control"
                                                                placeholder="Plate Number" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>Side Number</label>
                                                            <input type="text" name="vId"
                                                                placeholder="Side Number or Vehicle Id"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label>Model</label>
                                                            <input type="text" class="form-control" name="model"
                                                                placeholder="Model">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Type</label>
                                                            <input type="text" class="form-control" name="type"
                                                                placeholder="Type">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>MFG</label>
                                                            <input type="text" class="form-control" name="mfg"
                                                                placeholder="MFG">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label> Product</label>
                                                            <input type="text" class="form-control" name="product"
                                                                placeholder="Product">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Volume</label>
                                                            <input type="text" name="volume" class="form-control"
                                                                placeholder="Volume">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>GPS Fitted</label>
                                                            <select name="gps_fitted" class="form-control">
                                                                <option selected disabled>Select GPS Status</option>

                                                                <option value="Fitted">Fitted</option>
                                                                <option value="Not Fitted">Not Fitted</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Remark</label>
                                                            <textarea name="remark"
                                                                class="form-control textarea"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="update ml-auto mr-auto">
                                                        <button type="submit" name="add_vehicle"
                                                            style="background-color: #3b7bbf; color: orange;"
                                                            class="btn btn-default btn-round">Add Vehicle Info
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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

        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top btn-hover">
            <i class="lni lni-chevron-up"></i>
        </a>
</body>

</html>