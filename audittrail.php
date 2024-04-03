<?php
session_start();
$con = mysqli_connect("localhost", "u766365105_user", "@Gemson21", "u766365105_thesi");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thesi | Dashboard</title>
  <link href="dist/img/ico.png" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #ffffff !Important;">

      <div class="col-sm-12">
            <h2 class="" style="font-weight:bold;">Autdit Trail</h2>
            <a class="text-secondary"href="index.php"> Dashbord |</a>
            <a class="text-secondary"href="strand.php"> Strand Management |</a>
            <a class="text-secondary"href="account.php"> Account Management |</a>
            <a class="text-success"href="report.php"> Report |</a>
            <a class="text-secondary"href="../index.php"> Logout |</a>
          </div>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #12543b !Important;">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link text-center">
      <img src="dist/img/logo.png" alt="AdminLTE Logo" class="text-center" style="width: 100px;">
      <br><p style="font-size: 0.6rem;">CSTC || Pre-enrollment and Strand Recommendation System</p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info col-12">
          <a href="#" class="d-block" style="text-align: center;">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="strand.php" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Strand Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="account.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Account Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report.php" class="nav-link active" style="background-color: #ffffff; color:#12543b; font-weight:bold;">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Report
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-circle-right"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php

?>

<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="col-sm-6">
            <button id="printButton" class="btn btn-glass scrollto" style="background-color: #12543b; color: #ffffff;" onclick="printContent()">Print to PDF</button>
            <hr>
        </div>
        
        <section class="content" id="mySection">
            
            
            <div class="col-12">

                    <table id="example1" class="table table-bordered table-striped">
                      <thead>

                      <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Date</th>
                        <th>Time</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from audittrail order by LoggedDate DESC";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>

                      <tr>
                        <td  style=" text-align: center;"><?php echo $row['UserName'];?></td>
                        <td style=" text-align: center;"><?php echo $row['ActionTaken'];?></td>
                        <td style=" text-align: center;"><?php echo $row['LoggedDate'];?></td>
                        <td style=" text-align: center;"><?php echo $row['LoggedTime'];?></td>

                      </tr>


                      <?php endwhile ?>

                      
                      </tbody>
                    </table>


                <!-- /.card -->
              </div>
        </section>
    </div>
    </section>
</div>


    <!-- /.content -->
  </div>

<!-- ./wrapper -->

<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->

<!-- Page specific script -->
<script>
  $(function table() {
    $("#example1").DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



<script>
    // Function to trigger print
    function printContent() {
        document.getElementById("printButton").style.display = "none";
        window.print();
        window.onafterprint = function() {
            document.getElementById("printButton").style.display = "block";
        };
    }
</script>

</body>
</html>
