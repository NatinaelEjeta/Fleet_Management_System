<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];
$branch = $_SESSION['branch'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php include('header.php'); ?>

<!-- header -->

<body>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr style="text-align: center; font-size: smaller; font-weight: bolder;">
                                                <td>List of Districts</td>
                                                <td>Details</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               $query = "SELECT districtName  FROM district WHERE districtName != 'Head Office'";
                                               $results = mysqli_query($con, $query);                                             
                                               while($row = mysqli_fetch_array($results)) { 
                                               $districtName = $row['districtName'];  ?>
                                            <tr style="text-align: center; font-size: smaller;">
                                                <td>
                                                    <?php 
                                                    if($districtName == 'Mekele Relationship Office' || $districtName == 'Bahirdar Relationship Office')
                                                    {
                                                        echo $districtName;
                                                    }
                                                    else
                                                    {
                                                        echo "$districtName District";
                                                    }
                                                    ?>
                                                </td>
                                                <th>
                                                    <a style="color: #33BFF2;"
                                                        title="View details, <?php echo $districtName ?>"
                                                        href="districts.php?id=<?php echo $districtName ?>">
                                                        <i style="font-weight: bolder;" class="fa fa-info-circle"
                                                            aria-hidden="true">
                                                            Details</i>
                                                    </a>
                                                </th>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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