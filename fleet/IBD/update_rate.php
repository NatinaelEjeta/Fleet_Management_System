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
                            <div class="card-header" style="text-align: center;">
                                <h5> Update Exchange Rate
                                </h5>
                            </div>
                            <div class="card-body">

                                <?php
                                               $query = "SELECT * FROM exchange_rate";
                                               $results = mysqli_query($con, $query);                                             
                                               while($row = mysqli_fetch_array($results)) { 
                                               $country = $row['country'];
                                               $currency = $row['currency'];
                                               $exchangeRate = $row['exchangeRate'];  ?>

                                <form method="post">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="card card-default">

                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Country
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="text" name="country"
                                                                value="<?php echo $country; ?>" readonly="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">
                                                            Currency</label>

                                                        <div class="input-group">
                                                            <input type="text" name="currency"
                                                                value="<?php echo $currency; ?>" readonly="true"
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
                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">
                                                            Exchange Rate</label>

                                                        <div class="input-group">
                                                            <input type="text" name="rate"
                                                                value="<?php echo $exchangeRate; ?>"
                                                                class="form-control">
                                                        </div>

                                                    </div>

                                                    <div class="form-group" style="float: right;">
                                                        <label></label>
                                                        <div class="input-group">
                                                            <input type="submit" name="updateRate"
                                                                value="Update Exchange Rate" class="btn btn-default"
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
                                <?php } ?>
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
if (isset($_POST['updateRate'])) 
{

    echo "<html><script type='text/javascript' src='sweetAlert/js/sweetalert.min.js'></script></html>";

    $rate = mysqli_real_escape_string($con, $_POST['rate']);

        $query = "UPDATE exchange_rate

                  SET 

                  exchangeRate = '$rate'

                  ";

        $results = mysqli_query($con, $query);

        if ($results > 0) 
        {
            echo "<script>swal('Good','Exchange Rate Updated Successfully!','success');</script>";
        }
        else
        {
            echo "Error inserting record: " . mysqli_error($con);
        }
}

?>