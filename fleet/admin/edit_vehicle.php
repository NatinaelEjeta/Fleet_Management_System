<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];


if (isset($_GET['id'])) 
{
    $plateNumber = $_GET['id'];

    $search = "SELECT * FROM fleet_master WHERE plate_no = '$plateNumber'";

    $result = mysqli_query($con, $search);

    $count = mysqli_num_rows($result);

    if($count > 0){

        while($row = mysqli_fetch_array($result)){
            $transporter = $row['company'];
            $vId = $row['vId'];
            $plate_number = $row['plate_no'];
            $model = $row['model'];
            $type = $row['type'];
            $mfg = $row['mfg'];
            $product = $row['product'];
            $volume = $row['volume'];
            $gps_fitted = $row['gps_fitted'];
            $status = $row['statuss'];
            $remark = $row['remark'];
        }
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
                                <h5 class="card-title" style="text-align: center;">Add Driver Detail</h5>
                            </div>

                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card card-user">

                                        <div class="card-body">

                                            <form action="update_vehicle_details_database.php" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-md-8 pr-1">
                                                        <div class="form-group">
                                                            <label>Transporter</label>
                                                            <select name="transporter" class="form-control">
                                                                <option selected value="<?php echo $transporter; ?>">
                                                                    <?php echo $transporter; ?></option>
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

                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select name="status" class="form-control">
                                                                <option selected value="<?php echo $status; ?>">
                                                                    <?php echo $status; ?>
                                                                </option>
                                                                <option value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>Plate Number</label>
                                                            <input type="text" name="plate_no" class="form-control"
                                                                placeholder="Plate Number"
                                                                value="<?php echo $plate_number; ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>Side Number</label>
                                                            <input type="text" name="vId" value="<?php echo $vId; ?>"
                                                                placeholder="Side Number or Vehicle Id"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label>Model</label>
                                                            <input type="text" class="form-control" name="model"
                                                                value="<?php echo $model; ?>" placeholder="Model">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Type</label>
                                                            <input type="text" class="form-control" name="type"
                                                                value="<?php echo $type; ?>" placeholder="Type">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>MFG</label>
                                                            <input type="text" class="form-control" name="mfg"
                                                                value="<?php echo $mfg; ?>" placeholder="MFG">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label> Product</label>
                                                            <input type="text" class="form-control" name="product"
                                                                value="<?php echo $product; ?>" placeholder="Product">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Volume</label>
                                                            <input type="text" name="volume" class="form-control"
                                                                value="<?php echo $volume; ?>" placeholder="Volume">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>GPS Fitted</label>
                                                            <select name="gps_fitted" class="form-control">
                                                                <option selected value="<?php echo $gps_fitted; ?>">
                                                                    <?php echo $gps_fitted; ?></option>

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
                                                                class="form-control textarea"><?php echo $remark; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="update ml-auto mr-auto">
                                                        <button type="submit" name="update_vehicle"
                                                            style="background-color: #3b7bbf; color: orange;"
                                                            class="btn btn-default btn-round">Update Vehicle Info
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





<?php 

    } else {
        header('Location: search_vehicle.php?error=Vehicle Id or Side number not found!');
    }
    
    

   
    

                 
        
}


?>