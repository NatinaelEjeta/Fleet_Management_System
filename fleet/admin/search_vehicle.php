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
                                <h5 class="card-title" style="text-align: center;">Add Driver Detail</h5>
                            </div>

                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card card-user">

                                        <div class="card-body">

                                            <form action="search_vehicle_id.php" method="post">
                                                <div class="row">
                                                    <div class="col-md-7 pr-1">
                                                        <div class="form-group">
                                                            <input type="text" name="vehicle_id" class="form-control"
                                                                placeholder="Vehicle Id or Side number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 pr-1">

                                                        <div class="form-group">
                                                            <button type="submit" name="search"
                                                                style="background-color: #3b7bbf; color: orange;"
                                                                class=" form-control">Search
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>

                                            <?php
                                            if(isset($_GET['error'])){
                                            ?>
                                            <div class="alert alert-warning alert-dismissible fade show">
                                                <button type="button" aria-hidden="true" class="close"
                                                    data-dismiss="alert" aria-label="Close">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                                <span><b> Warning - </b> <?php echo $_GET['error']; ?>
                                                </span>
                                            </div>
                                            <?php 
                                            }
                                             ?>

                                            <?php
                                            if(isset($_GET['message'])){
                                            ?>
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <button type="button" aria-hidden="true" class="close"
                                                    data-dismiss="alert" aria-label="Close">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                                <span><b> Success - </b> <?php echo $_GET['message']; ?>
                                                </span>
                                            </div>
                                            <?php 
                                            }
                                             ?>

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