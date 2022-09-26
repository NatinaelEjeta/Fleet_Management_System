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
                                <h5> Change Password
                                </h5>
                            </div>
                            <div class="card-body">

                                <form method="post">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="card card-default">

                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">New
                                                            Password
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="password" name="newPassword" value=""
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">
                                                            Confirm New Password</label>

                                                        <div class="input-group">
                                                            <input type="password" name="confirmNewPassword" value=""
                                                                class="form-control">
                                                        </div>

                                                    </div>

                                                    <!-- /.form group -->

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->


                                        </div>
                                        <!-- /.col (left) -->
                                        <div class="col-md-6">
                                            <div class="card card-default">

                                                <div class="card-body">
                                                    <!-- Date -->
                                                    <br><br><br>
                                                    <div class="form-group" style="float: right;">
                                                        <label></label>
                                                        <div class="input-group">
                                                            <input type="submit" name="changePassword"
                                                                value="Change Password" class="btn btn-default"
                                                                style="background-color: #33BFF2; border-radius: 20px;">

                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                </div>

                                            </div>

                                            <!-- /.input group -->
                                        </div>

                                        <!-- /.form group -->
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </form>
                            </div>
                            <!-- /.col (right) -->

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
$branch = $_SESSION['branch'];
$userId = $_SESSION['userId'];
$branch = $_SESSION['branch'];
$district =  $_SESSION['district'];
if (isset($_POST['changePassword'])) 
{

    echo "<html><script type='text/javascript' src='sweetAlert/js/sweetalert.min.js'></script></html>";

    $newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);

    $confirmNewPassword = mysqli_real_escape_string($con, $_POST['confirmNewPassword']);

    if(empty($newPassword) || empty($confirmNewPassword))
    {
        echo "<script>swal('Oops','Please Type Password!','error');</script>";
    }
    else if($newPassword != $confirmNewPassword)
    {
        echo "<script>swal('OOPS','Password Entered Does not match','error');</script>";
    }
    else
    {

        $password = base64_encode($newPassword);

        $query = "UPDATE users

                  SET 

                  passwords = '$password'
                  
                  WHERE userId = '$userId'";

        $results = mysqli_query($con, $query);

        if ($results > 0) 
        {
            echo "<script>swal('Good','Password Changed Successfully!','success');</script>";
        }
        else
        {
            echo "Error inserting record: " . mysqli_error($con);
        }
    }
}

?>