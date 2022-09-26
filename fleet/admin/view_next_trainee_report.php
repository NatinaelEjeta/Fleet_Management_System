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
                                <button class="btn btn-default"
                                    style="background-color: #33BFF2; border-radius: 20px; float:right;"
                                    onclick="printContent('print')">Export to Pdf
                                </button>
                                <button class="btn btn-default"
                                    style="background-color: #33BFF2; border-radius: 20px; float:right;"
                                    onclick="ExportToExcel('xlsx')">Export to
                                    Excel
                                </button>
                            </div>

                            <div class="card-body" id="print">
                                <div class="table-responsive">
                                    <table id="tbl_exporttable_to_xls" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th colspan="8">List of drivers next ddc refresh take</th>
                                            </tr>
                                            <tr style="font-size: smaller; font-weight:bolder;">
                                                <td>Transporter</td>
                                                <td>Driver Name</td>
                                                <td>Side Number</td>
                                                <td>Plate No</td>
                                                <td>Driver Id</td>
                                                <td>Phone</td>
                                                <td>Training Date</td>
                                                <td>Medical Date</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                              $query = "SELECT * FROM drivers WHERE next_ddc_refresh_date BETWEEN '01/09/22' AND '30/09/22'";
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
                                                
                                                ?>

                                            <tr style="font-size: smaller;">
                                                <td> <?php echo $company; ?> </td>
                                                <td> <?php echo $driverName; ?> </td>
                                                <td> <?php echo $sideNumber; ?> </td>
                                                <td> <?php echo $plate_number; ?> </td>
                                                <td> <?php echo $driverId; ?> </td>
                                                <td> <?php echo $phone; ?> </td>
                                                <td> <?php echo $next_ddc_refresh_date; ?> </td>
                                                <td> <?php echo $next_medical_date; ?> </td>
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



            <!-- end main bar -->
        </div>

        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top btn-hover">
            <i class="lni lni-chevron-up"></i>
        </a>
</body>

</html>


<script>
function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('tbl_exporttable_to_xls');
    var wb = XLSX.utils.table_to_book(elt, {
        sheet: "sheet1"
    });
    return dl ?
        XLSX.write(wb, {
            bookType: type,
            bookSST: true,
            type: 'base64'
        }) :
        XLSX.writeFile(wb, fn || ('Report.' + (type || 'xlsx')));
}
</script>

<script type="text/javascript">
function printContent(e1) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(e1).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>


<style>
body {
    font-size: smaller;
}

nav {
    font-size: smaller;
}

.sidebar {
    font-size: smaller;
}
</style>