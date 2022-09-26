<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];


echo "<html><script type='text/javascript' src='sweetAlert/js/sweetalert.min.js'></script></html>";
if (isset($_GET['id'])) 
{
    $driver_id = $_GET['id'];

    $search = "SELECT * FROM drivers WHERE driverId = '$driver_id'";

    $result = mysqli_query($con, $search);

    $count = mysqli_num_rows($result);

    if($count > 0){

        while($row = mysqli_fetch_array($result)){
            $transporter = $row['company'];
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

                                            <form
                                                action="update_driver_details_database.php?id=<?php echo $driverId; ?>"
                                                method="POST" enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-md-8 pr-1">
                                                        <div class="form-group">
                                                            <label>Transporter</label>
                                                            <input type="text" name="transporter"
                                                                value="<?php echo $transporter; ?>" class="form-control"
                                                                placeholder="Transporter">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label>Driver Photo</label>

                                                            <input type="file" name="driver_photo"
                                                                value="<?php echo $image; ?>" class="form-control">

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input type="text" name="full_name" class="form-control"
                                                                value="<?php echo $driverName; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>status</label>
                                                            <select name="status" class="form-control">
                                                                <option selected value="<?php echo $status; ?>">
                                                                    <?php echo $status; ?></option>
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
                                                            <input type="text" name="plate_no"
                                                                value="<?php echo $plate_number; ?>"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>Side Number</label>
                                                            <input type="text" name="vId"
                                                                value="<?php echo $sideNumber; ?>" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label>Training Date</label>
                                                            <input type="date" class="form-control" name="training_date"
                                                                value="<?php echo $training_date; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Medical Date</label>
                                                            <input type="date" class="form-control" name="medical_date"
                                                                value="<?php echo $medical_date; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>Birth Date</label>
                                                            <input type="date" class="form-control" name="birth_date"
                                                                value="<?php echo $birth_date; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label>Employment Date</label>
                                                            <input type="date" class="form-control"
                                                                name="employment_date"
                                                                value="<?php echo $employment_date; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Education</label>
                                                            <input type="text" name="education" class="form-control"
                                                                value="<?php echo $education; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>Marital Status</label>
                                                            <select name="marital_status" class="form-control">
                                                                <option selected value="<?php echo $marital_status; ?>">
                                                                    <?php echo $marital_status; ?></option>

                                                                <option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Divorced">Divorced</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 pr-1">
                                                        <div class="form-group">
                                                            <label>Experience</label>
                                                            <input type="text" name="experience" class="form-control"
                                                                value="<?php echo $experience; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                value="<?php echo $phone; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                            <label>Next DDC Refresh Date</label>
                                                            <input type="date" name="next_ddc_refresh_date"
                                                                class="form-control"
                                                                value="<?php echo $next_ddc_refresh_date; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                            <label>Next Medical Date</label>
                                                            <input type="date" name="next_medical_date"
                                                                class="form-control"
                                                                value="<?php echo $next_medical_date; ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Remark</label>
                                                            <textarea name="remark"
                                                                class="form-control textarea"><?php echo $remarks; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="update ml-auto mr-auto">
                                                        <button type="submit" name="update_driver"
                                                            style="background-color: #3b7bbf; color: orange;"
                                                            class="btn btn-default btn-round">Update Driver Info
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