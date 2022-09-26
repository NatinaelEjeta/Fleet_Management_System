<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="dashboard.php">RBMS Dashboard </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn-rotate" href="javascript:;">
                            <i class="nc-icon nc-settings-gear-65"></i>
                            <p>
                                <span class="d-lg-none d-md-block">Account</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> List of Remittance Beneficiaries</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>Beneficiary Id</th>
                                        <th>Branch</th>
                                        <th>District</th>
                                        <th>Receiver Name</th>
                                        <th>Payment Date</th>
                                        <th>Phone Number</th>
                                        <th>City</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            RNMS/230
                                        </td>
                                        <td>
                                            Finfine
                                        </td>
                                        <td>
                                            Central
                                        </td>
                                        <td>
                                            Tamiru Ajema
                                        </td>
                                        <td>
                                            Apr 20, 2022
                                        </td>

                                        <!-- reciver address -->

                                        <td>
                                            0912345678
                                        </td>
                                        <td>
                                            Addis Ababa
                                        </td>
                                        <!-- reciver address -->
                                        <th>
                                            <a class="btn btn-primary" href="beneficiary_details.php">
                                                Details
                                            </a>
                                        </th>

                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Beneficiary Id</th>
                                        <th>Branch</th>
                                        <th>District</th>
                                        <th>Receiver Name</th>
                                        <th>Payment Date</th>
                                        <th>Phone Number</th>
                                        <th>City</th>
                                        <th>Details</th>

                                    </tr>
                                </tfoot>
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