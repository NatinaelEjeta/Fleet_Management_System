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
                                <h5 class="card-title" style="text-align: center;">
                                </h5>
                            </div>

                            <div class="card-body" id="print">
                                <div class="table-responsive">
                                    <table id="tbl_exporttable_to_xls" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th colspan="11">List of Inactive Vehicles</th>
                                            </tr>
                                            <tr style="font-size: smaller; font-weight:bolder;">
                                                <td>Transporter</td>
                                                <td>Vehicle Id</td>
                                                <td>Plate No</td>
                                                <td>Model</td>
                                                <td>Type</td>
                                                <td>MFG</td>
                                                <td>Product</td>
                                                <td>Volume</td>
                                                <td>GPS Fitted</td>
                                                <td>Status</td>
                                                <td>Remark</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                              $query = "SELECT * FROM fleet_master WHERE statuss = 'Inactive'";
                                              $results = mysqli_query($con, $query);
                                              while ($row = mysqli_fetch_array($results)) 
                                              {
                                                $company = $row['company'];
                                                $vId = $row['vId'];
                                                $plate_no = $row['plate_no'];
                                                $model = $row['model'];
                                                $type = $row['type'];
                                                $mfg = $row['mfg'];
                                                $product = $row['product'];
                                                $volume = $row['volume'];
                                                $gps_fitted = $row['gps_fitted'];
                                                $statuss = $row['statuss'];
                                                $remark = $row['remark'];
                                                ?>

                                            <tr style="font-size: smaller;">
                                                <td> <?php echo $company; ?> </td>
                                                <td> <?php echo $vId; ?> </td>
                                                <td> <?php echo $plate_no; ?> </td>
                                                <td> <?php echo $model; ?> </td>
                                                <td> <?php echo $type; ?> </td>
                                                <td> <?php echo $mfg; ?> </td>
                                                <td> <?php echo $product; ?> </td>
                                                <td> <?php echo $volume; ?> </td>
                                                <td> <?php echo $gps_fitted; ?> </td>
                                                <td> <?php echo $statuss; ?> </td>
                                                <td> <?php echo $remark; ?> </td>
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