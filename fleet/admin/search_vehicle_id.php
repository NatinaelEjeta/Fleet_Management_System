<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];


echo "<html><script type='text/javascript' src='sweetAlert/js/sweetalert.min.js'></script></html>";
if (isset($_POST['search'])) 
{
    $vehicle_id = mysqli_real_escape_string($con, $_POST['vehicle_id']);

    $search = "SELECT * FROM fleet_master WHERE vId = '$vehicle_id'";

    $result = mysqli_query($con, $search);

    $count = mysqli_num_rows($result);

    if($count > 0){

        while($row = mysqli_fetch_array($result)){
            $transporter = $row['company'];
            $vId = $row['vId'];
            $plate_no = $row['plate_no'];
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

                                            <form action="driver_details_database.php" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>Transporter</label>
                                                            <input type="text" name="transporter"
                                                                value="<?php echo $transporter; ?>" class="form-control"
                                                                readonly placeholder="Transporter">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 pr-1">
                                                        <div class="form-group">
                                                            <label>Driver Id</label>
                                                            <input type="text" name="driver_id" class="form-control"
                                                                placeholder="Driver Id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 pr-1">
                                                        <div class="form-group">
                                                            <label>Driver Photo</label>

                                                            <input type="file" name="driver_photo" value=""
                                                                class="form-control">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" name="first_name" class="form-control"
                                                                placeholder="first name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Middle Name</label>
                                                            <input type="text" name="middle_name" class="form-control"
                                                                placeholder="middle name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" name="last_name" class="form-control"
                                                                placeholder="last name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>Plate Number</label>
                                                            <input type="text" name="plate_no"
                                                                value="<?php echo $plate_no; ?>" class="form-control"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>Side Number</label>
                                                            <input type="text" name="vId" value="<?php echo $vId; ?>"
                                                                class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label>Training Date</label>
                                                            <input type="date" class="form-control"
                                                                name="training_date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Medical Date</label>
                                                            <input type="date" class="form-control" name="medical_date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>Birth Date</label>
                                                            <input type="date" class="form-control" name="birth_date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label>Employment Date</label>
                                                            <input type="date" class="form-control"
                                                                name="employment_date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Education</label>
                                                            <input type="text" name="education" class="form-control"
                                                                placeholder="Education">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>Marital Status</label>
                                                            <select name="marital_status" class="form-control">
                                                                <option selected disabled>Select Marital Status</option>

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
                                                                placeholder="Experience">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                placeholder="Phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                            <label>Next DDC Refresh Date</label>
                                                            <input type="date" name="next_ddc_refresh_date"
                                                                class="form-control"
                                                                placeholder="Next DDC Refresh Date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                            <label>Next Medical Date</label>
                                                            <input type="date" name="next_medical_date"
                                                                class="form-control" placeholder="Next Medical Date">
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
                                                        <button type="submit" name="add_driver"
                                                            style="background-color: #3b7bbf; color: orange;"
                                                            class="btn btn-default btn-round">Add Driver Info
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