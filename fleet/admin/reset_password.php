<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];
$branch = $_SESSION['branch'];
$district =  $_SESSION['district'];
@$userId = $_POST['userId'];
@$newPassword = $_POST['newPassword'];
@$confirmNewPassword = $_POST['confirmNewPassword'];
echo "<html><script type='text/javascript' src='sweetAlert/js/sweetalert.min.js'></script></html>";
if (isset($_POST['resetPassword'])) 
{
    $userId = mysqli_real_escape_string($con, $_POST['userId']);

    $newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);

    $confirmNewPassword = mysqli_real_escape_string($con, $_POST['confirmNewPassword']);

    if (empty($userId))
    {
        echo "<script>swal('Oops','Please Type User Id!','error')</script>";
    }
    else if (empty($newPassword))
    {
        echo "<script>swal('Oops','Please Type Password!','error')</script>";
    }
    else if (empty($confirmNewPassword))
    {
        echo "<script>swal('Oops','Please Re-type Password!','error')</script>";
    }
    else
    {  if($newPassword == $confirmNewPassword)
        {
            $password = base64_encode($newPassword);

             $query = "UPDATE users

                  SET 

                  passwords = '$password'
                  
                  WHERE userId = '$userId'";

            $results = mysqli_query($con, $query);

            if ($results > 0) 
            {
               echo "<script>swal('Good','Password has been successfully Changed!','success')</script>";
            }
            else
            {
               echo "Error inserting record: " . mysqli_error($con);
            }
        }
        else
        {
            echo "<script>swal('Oops','Password doesn't match!','error')</script>";
        }
            
    }
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
                            <div class="card-header" style="text-align: center;">
                                <h3> Reset Password
                                </h3>
                            </div>
                            <div class="card-body">

                                <form method="post">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="card card-default">

                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">User Id
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="text" name="userId"
                                                                value="<?php echo $userId; ?>" class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">New Password
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="text" name="newPassword"
                                                                value="<?php echo $newPassword; ?>"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">
                                                            Confirm New Password</label>

                                                        <div class="input-group">
                                                            <input type="text" name="confirmNewPassword"
                                                                value="<?php echo $confirmNewPassword; ?>"
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
                                                    <br><br><br><br><br><br>
                                                    <!-- Date -->
                                                    <div class="form-group" style="float: right;">
                                                        <label></label>
                                                        <div class="input-group">
                                                            <input type="submit" name="resetPassword"
                                                                value="Reset Password" class="btn btn-default"
                                                                style="background-color: #33BFF2;">

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