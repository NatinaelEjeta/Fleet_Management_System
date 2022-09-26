<?php 
include('../session_control.php'); 
$user = $_SESSION['username'];
$date = $_SESSION['lastDateSignedIn'];
$districtes = $_SESSION['district'];
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <td style="font-size:smaller; font-weight: bolder;">
                                                    Branch Name</td>
                                                <td style="font-size:smaller; font-weight: bolder;">
                                                    District</td>
                                                <td style="font-size:smaller; font-weight: bolder;">
                                                    User Name</td>
                                                <td style="font-size:smaller; font-weight: bolder;">
                                                    Last Date Signed on
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                $query = "SELECT * FROM users WHERE district = '$districtes' AND branch != 'District'";
                                                $results = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_array($results)) 
                                                {

                                                    $userName = $row['username'];

                                                    $district = $row['district']; 

                                                    $branches = $row['branch'];

                                                    $lastDateSignedIn = date("F j, Y", strtotime($row['lastDateSignedIn'])); ?>
                                            <tr>
                                                <td style="font-size:smaller;">
                                                    <?php echo $branches; ?> </td>
                                                <td style="font-size:smaller;">
                                                    <?php 
                                                        if($district == 'Mekele Relationship Office' || $district == 'Bahirdar Relationship Office')
                                                        {
                                                            echo $district;
                                                        }
                                                        else
                                                        {
                                                            echo "$district District";
                                                        } ?>
                                                </td>
                                                <td style="font-size:smaller;">
                                                    <?php echo $userName; ?> </td>
                                                <td style="font-size:smaller;">
                                                    <?php echo $lastDateSignedIn; ?> </td>
                                            </tr>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
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
</body>


</html>