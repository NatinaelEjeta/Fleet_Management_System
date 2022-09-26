<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/oip__5__modified_icon.png">
    <link rel="icon" type="image/png" href="../assets/img/oip__5__modified_icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        RBMS - Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/sweetalert2/dist/sweetalert2.min.css">
</head>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../assets/js/sheet.min.js"></script>
<script src="../assets/js/jspdf.min.js"></script>
<script src="../assets/js/jspdf.plugin.autotable.min.js"></script>
<script>
$(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
});
</script>

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
function generate() {
    var doc = new jsPDF('p', 'pt', 'letter');
    var htmlstring = '';
    var tempVarToCheckPageHeight = 0;
    var pageHeight = 0;
    pageHeight = doc.internal.pageSize.height;
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector  
        '#bypassme': function(element, renderer) {
            // true = "handled elsewhere, bypass text extraction"  
            return true
        }
    };
    margins = {
        top: 150,
        bottom: 60,
        left: 40,
        right: 40,
        width: 1000,
        fontsize: 10
    };
    var y = 20;
    doc.setLineWidth(2);
    doc.text(100, y = y + 30, "");
    doc.autoTable({
        html: '#simple_table',
        startY: 70,
        columnStyles: {
            0: {
                cellWidth: 42,
            },
            1: {
                cellWidth: 42,
            },
            2: {
                cellWidth: 45,
            },
            3: {
                cellWidth: 45,
            },
            4: {
                cellWidth: 42,
            },
            5: {
                cellWidth: 40,
            },
            6: {
                cellWidth: 40,
            },
            7: {
                cellWidth: 40,
            },
            8: {
                cellWidth: 40,
            },
            9: {
                cellWidth: 40,
            },
            10: {
                cellWidth: 40,
            },
            11: {
                cellWidth: 40,
            },
            12: {
                cellWidth: 40,
            },
            13: {
                cellWidth: 40,
            }
        },
        styles: {
            minCellHeight: 20,
            minCellWidht: 10
        }
    })
    doc.save('Report.pdf');
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