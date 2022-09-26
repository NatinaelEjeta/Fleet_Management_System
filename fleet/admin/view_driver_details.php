<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];

if(isset($_GET['id'])){
    $driver_id = $_GET['id'];
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
            <?php

            $query = "SELECT * FROM drivers WHERE driverId = '$driver_id'";
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
            }
              ?>
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-header">
                                <a href="view_drivers.php" style="color: #3b7bbf; font-size:17px;"><i
                                        class="nc-icon nc-bullet-list-67">
                                        &nbsp; Drivers List</i></a>
                                <h5 class="card-title text-center">Profile</h5>
                            </div>
                            <div class="card-body">
                                <div class="author" style="color: #3b7bbf;">

                                    <img class="avatar border-gray" src="./image/<?php echo $image; ?>" alt="...">
                                    <h6 class="title">
                                        <?php 
                                            if($status == "Active"){ ?>
                                        <i class="nc-icon nc-check-2" style="color: darkgreen; font-weight:bolder;">
                                            <?php echo $status; ?></i>
                                        <?php } else { ?>
                                        <i class="nc-icon nc-simple-remove" style="color: orange; font-weight:bolder;">
                                            <?php echo $status; ?></i>
                                        <?php }
                                             ?>
                                        <br><br>
                                        <?php echo $driverName; ?><br><br>
                                        <?php echo "Driver Id: $driverId"; ?> <br><br>
                                        <?php echo "Side Number: $sideNumber"; ?> <br><br>
                                        <?php echo "Plate Number: $plate_number"; ?>
                                    </h6>

                                </div>
                                <p class="description text-center">

                                </p>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="button-container">

                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                            <?php

                                        $query = "SELECT * FROM training WHERE trainee = '$driverName'";
                                        $results = mysqli_query($con, $query);
                                        $count = mysqli_num_rows($results);
                                        ?>
                                            <h5><?php echo $count; ?><br><small><a href="#" data-toggle="modal"
                                                        data-target="#trainingModal">Training</a></small></h5>
                                        </div>
                                        <?php

                                        $query2 = "SELECT * FROM medical WHERE driverName = '$driverName'";
                                        $results2 = mysqli_query($con, $query2);
                                        $count2 = mysqli_num_rows($results2);
                                        ?>
                                        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                            <h5><?php echo $count2; ?><br><small><a href="#" data-toggle="modal"
                                                        data-target="#medicalModal">Medical</a></small></h5>
                                        </div>
                                        <?php

                                        $query = "SELECT * FROM training WHERE trainee = '$driverName'";
                                        $results = mysqli_query($con, $query);
                                        $count = mysqli_num_rows($results);
                                        ?>
                                        <div class="col-lg-3 mr-auto">
                                            <h5><?php echo $count; ?><br><small><a href="#" data-toggle="modal"
                                                        data-target="#penalityModal">Penality</a></small></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card card-user">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Full name</label>
                                                <input type="text" class="form-control" readonly placeholder="Company"
                                                    value="<?php echo $driverName; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input type="text" class="form-control" placeholder="Username"
                                                    value="<?php echo $birth_date; ?>" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Marital Status</label>
                                                <input type="email" class="form-control"
                                                    value="<?php echo $marital_status; ?>" disabled="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" disabled=""
                                                    placeholder="Company" value="<?php echo $phone; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Medical Date</label>
                                                <input type="text" class="form-control" placeholder="Username"
                                                    value="<?php echo $medical_date; ?>" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Training Date</label>
                                                <input type="email" class="form-control"
                                                    value="<?php echo $training_date; ?>" disabled="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Employment Date</label>
                                                <input type="text" class="form-control" disabled=""
                                                    placeholder="Company" value="<?php echo $employment_date; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Education</label>
                                                <input type="text" class="form-control" placeholder="Username"
                                                    value="<?php echo $education; ?>" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Experience</label>
                                                <input type="email" class="form-control"
                                                    value="<?php echo $experience; ?>" disabled="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Next Medical date</label>
                                                <input type="text" class="form-control" disabled=""
                                                    placeholder="Company" value="<?php echo $next_medical_date; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Next DDC Refresh date</label>
                                                <input type="email" class="form-control"
                                                    value="<?php echo $next_ddc_refresh_date; ?>" disabled="">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Remark</label>
                                                <input type="text" class="form-control" placeholder="Home Address"
                                                    value="<?php echo $remarks; ?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer -->

                <?php 
                include('footer.php'); 
                ?>

                <!-- footer -->
            </div>

            <!-- end main bar -->
        </div>

        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top btn-hover">
            <i class="lni lni-chevron-up"></i>
        </a>


        <!-- training modal -->
        <div class="container">

            <!-- The Modal -->

            <div class="modal fade" id="trainingModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Trainings Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr style="font-size: smaller; font-weight:bolder;">

                                                <td>Driver Name</td>
                                                <td>Transporter</td>
                                                <td>Title</td>
                                                <td>Address</td>
                                                <td>From</td>
                                                <td>To</td>
                                                <td>Status</td>
                                                <td>Remark</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                              $query = "SELECT * FROM training WHERE trainee = '$driverName'";
                                              $results = mysqli_query($con, $query);
                                              while ($row = mysqli_fetch_array($results)) 
                                              {
                                                $trainee = $row['trainee'];
                                                $transporter = $row['transporter'];
                                                $trainingTitle = $row['trainingTitle'];
                                                $trainingAddress = $row['trainingAddress'];
                                                $fromDate = $row['fromDate'];
                                                $toDate = $row['toDate'];
                                                $trainingStatus = $row['trainingStatus'];
                                                $remark = $row['remark'];
                                                
                                                
                                                ?>

                                            <tr style="font-size: smaller;">
                                                <td> <?php echo $trainee; ?> </td>
                                                <td> <?php echo $transporter; ?> </td>
                                                <td> <?php echo $trainingTitle; ?> </td>
                                                <td> <?php echo $trainingAddress; ?> </td>
                                                <td> <?php echo $fromDate; ?> </td>
                                                <td> <?php echo $toDate; ?> </td>
                                                <td> <?php echo $trainingStatus; ?> </td>
                                                <td> <?php echo $remark; ?> </td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade" id="medicalModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Medical Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr style="font-size: smaller; font-weight:bolder;">

                                                <td>Driver Name</td>
                                                <td>Transporter</td>
                                                <td>Medical Date</td>
                                                <td>Status</td>
                                                <td>Remark</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                              $query = "SELECT * FROM medical WHERE driverName = '$driverName'";
                                              $results = mysqli_query($con, $query);
                                              while ($row = mysqli_fetch_array($results)) 
                                              {
                                                $driverName = $row['driverName'];
                                                $transporter = $row['transporter'];
                                                $medicalDate = $row['medicalDate'];
                                                $medicalStatus = $row['medicalStatus'];
                                                $remark = $row['remark'];
                                                
                                                
                                                ?>

                                            <tr style="font-size: smaller;">
                                                <td> <?php echo $driverName; ?> </td>
                                                <td> <?php echo $transporter; ?> </td>
                                                <td> <?php echo $medicalDate; ?> </td>
                                                <td> <?php echo $medicalStatus; ?> </td>
                                                <td> <?php echo $remark; ?> </td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade" id="penalityModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Penality Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr style="font-size: smaller; font-weight:bolder;">

                                                <td>Driver Name</td>
                                                <td>Transporter</td>
                                                <td>Title</td>
                                                <td>Address</td>
                                                <td>From</td>
                                                <td>To</td>
                                                <td>Status</td>
                                                <td>Remark</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                              $query = "SELECT * FROM training WHERE trainee = '$driverName'";
                                              $results = mysqli_query($con, $query);
                                              while ($row = mysqli_fetch_array($results)) 
                                              {
                                                $trainee = $row['trainee'];
                                                $transporter = $row['transporter'];
                                                $trainingTitle = $row['trainingTitle'];
                                                $trainingAddress = $row['trainingAddress'];
                                                $fromDate = $row['fromDate'];
                                                $toDate = $row['toDate'];
                                                $trainingStatus = $row['trainingStatus'];
                                                $remark = $row['remark'];
                                                
                                                
                                                ?>

                                            <tr style="font-size: smaller;">
                                                <td> <?php echo $trainee; ?> </td>
                                                <td> <?php echo $transporter; ?> </td>
                                                <td> <?php echo $trainingTitle; ?> </td>
                                                <td> <?php echo $trainingAddress; ?> </td>
                                                <td> <?php echo $fromDate; ?> </td>
                                                <td> <?php echo $toDate; ?> </td>
                                                <td> <?php echo $trainingStatus; ?> </td>
                                                <td> <?php echo $remark; ?> </td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
</body>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true
    });
    $("#example3").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true
    });
    $("#example4").DataTable({
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

</html>