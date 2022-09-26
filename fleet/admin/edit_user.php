<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];
$branch = $_SESSION['branch'];
if (isset($_GET['id']) and $_GET['id']) {
    $Id  = $_GET['id'];
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
                                <h3> New Remittance Beneficiary User
                                </h3>
                            </div>
                            <div class="card-body">

                                <?php

$query = "SELECT * FROM users WHERE userId = '$Id'";
$results = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($results)) 
{

  $userId = $row['userId'];

  $userName = $row['username'];

  $password = $row['passwords'];

  $userType = $row['userType'];

  $district = $row['district'];

  $branch = $row['branch'];

  $lastDateSignedIn = $row['lastDateSignedIn'];

?>

                                <form action="edit_user_database.php?id=<?php echo $userId;  ?>" method="post">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="card card-default">

                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">User
                                                            Name</label>

                                                        <div class="input-group">
                                                            <input type="text" name="username"
                                                                value="<?php echo $userName; ?>" required="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <!-- phone mask -->
                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">User Type
                                                        </label>

                                                        <div class="input-group">
                                                            <select name="userType" value="<?php echo $userType; ?>"
                                                                class="form-control">
                                                                <option selected="true"
                                                                    value="<?php echo $userType; ?>">
                                                                    <?php echo $userType; ?>
                                                                </option>
                                                                <option value="branch">Branch</option>
                                                                <option value="IBD">IBD</option>
                                                                <option value="admin">Admin</option>
                                                            </select>
                                                        </div>
                                                        <!-- /.input group -->
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
                                                        <label style="color: black; font-weight: bolder;">District
                                                        </label>

                                                        <div class="input-group">
                                                            <select name="district" value="<?php echo $district; ?>"
                                                                class="form-control">
                                                                <?php
                $query = "SELECT districtName  FROM district";
                $results = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($results)) {
                  echo "<option value='" . $row['districtName'] . "'>" . $row['districtName'] . "</option>";
                }

                ?>
                                                            </select>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black; font-weight: bolder;">Branch
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="text" name="branch"
                                                                value="<?php echo $branch; ?>" required="true"
                                                                class="form-control">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group" style="float: right;">
                                                        <label></label>
                                                        <div class="input-group">
                                                            <input type="submit" name="updateUser" value="Update User"
                                                                class="btn btn-default"
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
                                <?php 
}
                                ?>
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