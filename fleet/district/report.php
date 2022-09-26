<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];
$branch = $_SESSION['branch'];
$district = $_SESSION['district'];
?>
<!DOCTYPE html>
<html lang="en">
<style>
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    text-align: center;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: center;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
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
                                <h3> Generate Report </h3>
                            </div>
                            <div class="card-body">
                                <div class="tab">
                                    <button style="color: #33BFF2; font-size:smaller;" class="tablinks"
                                        onclick="openCity(event, 'London')"> <strong> For All
                                            Branches </strong></button>
                                    <button style="color: #33BFF2; font-size:smaller;" class="tablinks"
                                        onclick="openCity(event, 'Tokyo')">
                                        <strong> For Specific
                                            Branch </strong> </button>
                                </div>

                                <div id="London" class="tabcontent">
                                    <form action="generate_report.php" method="post">
                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h5 class="card-title" style="text-align: center;">Date Range
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- Date dd/mm/yyyy -->
                                                        <div class="form-group">
                                                            <label style="color:black;"><strong>From</strong></label>

                                                            <div class="input-group">
                                                                <input type="date" name="fromDate" value=""
                                                                    required="true" class="form-control">
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->

                                                        <div class="form-group">
                                                            <label style="color:black;"><strong>To</strong></label>

                                                            <div class="input-group">
                                                                <input type="date" name="toDate" value=""
                                                                    required="true" class="form-control">
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->


                                            </div>
                                            <div class="col-md-6">

                                                <div class="card card-default">
                                                    <br><br><br><br><br><br><br><br>
                                                    <div class="card-body">
                                                        <div class="form-group" style="float: right;">
                                                            <div class="input-group">
                                                                <input type="submit" name="generateReport"
                                                                    value="Generate Report" required="true"
                                                                    class="btn btn-default"
                                                                    style="background-color: #33BFF2; border-radius: 20px;">
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->


                                            </div>
                                            <!-- /.col (left) -->
                                        </div>
                                    </form>
                                </div>

                                <div id="Tokyo" class="tabcontent">
                                    <form action="generate_branch_report.php" method="post">
                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h5 class="card-title" style="text-align: center;">Date Range
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- Date dd/mm/yyyy -->
                                                        <div class="form-group">
                                                            <label style="color:black;"><strong>From</strong></label>

                                                            <div class="input-group">
                                                                <input type="date" name="fromDate" value=""
                                                                    required="true" class="form-control">
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->

                                                        <div class="form-group">
                                                            <label style="color:black;"><strong>To</strong></label>

                                                            <div class="input-group">
                                                                <input type="date" name="toDate" value=""
                                                                    required="true" class="form-control">
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->


                                            </div>
                                            <!-- /.col (left) -->

                                            <div class="col-md-6">

                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h5 class="card-title" style="text-align: center;"> Branch
                                                            Selection
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">

                                                        <div class="form-group">
                                                            <label style="color: black; font-weight: bolder;">Branch
                                                            </label>

                                                            <div class="input-group">
                                                                <select name="branch" id="branch" required="true"
                                                                    class="form-control">
                                                                    <option selected="true">Select Branch</option>
                                                                    <?php
                                                                   $query = "SELECT branchName  FROM branch WHERE districtName = '$district'";
                                                                   $results = mysqli_query($con, $query);
                                                                   while ($row = mysqli_fetch_array($results)) {
                                                                      echo "<option value='" . $row['branchName'] . "'>" . $row['branchName'] . "</option>";
                                                                    }
                                                                 ?>
                                                                </select>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>

                                                        <div class="form-group" style="float: right;">
                                                            <label></label>

                                                            <div class="input-group">
                                                                <input type="submit" name="generateReport"
                                                                    value="Generate Report" required="true"
                                                                    class="btn btn-default"
                                                                    style="background-color: #33BFF2; border-radius: 20px;">
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>



                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                </div>

                            </div>
                            </form>
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
</body>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

</html>