<?php
session_start();
if (($_SESSION['login_user']===$uname)){
    // Unset all session variables

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or another appropriate page
    
    echo "<script language='javascript' type='text/javascript'> location.href='https://thesi.online/' </script>";
    exit;
    
    
}


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

  <!-- Preloader
 <div class="preloader flex-column justify-content-center align-items-center">
  <img src="dist/img/logo1.png" alt="ThesiLogo"  width="20%">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #ffffff !Important;">

      <div class="col-sm-6">
            <h2 class="" style="font-weight:bold;">Pre-Enrollment Status</h2>
            <a class="text-success"href="index.php"> Dashbord |</a>
            <a class="text-secondary"href="strand.php"> Strand Management |</a>
            <a class="text-secondary"href="account.php"> Account Management |</a>
            <a class="text-secondary"href="report.php"> Report |</a>
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
            <a href="index.php" class="nav-link active" style="background-color: #ffffff; color:#12543b; font-weight:bold;">
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
            <a href="report.php" class="nav-link">
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
  $strand="SELECT * from catstrand";
  $restrand=mysqli_query($con,$strand);
  while($rowstrand=mysqli_fetch_array($restrand)){
      $sqlAregstrand="select * from student where status = 'registered' and campus='Atimonan' and strand = '".$rowstrand['strand']."'";
      $resAregstrand=mysqli_query($con,$sqlAregstrand);
      $regAcountstrand=mysqli_num_rows($resAregstrand);

      
      
      $sqlLregstrand="select * from student where status = 'registered' and campus='Lucena' and strand = '".$rowstrand['strand']."'";
      $resLregstrand=mysqli_query($con,$sqlLregstrand);
      $regLcountstrand=mysqli_num_rows($resLregstrand);
      
      $sqlSregstrand="select * from student where status = 'registered' and campus='Sariaya' and strand = '".$rowstrand['strand']."'";
      $resSregstrand=mysqli_query($con,$sqlSregstrand);
      $regScountstrand=mysqli_num_rows($resSregstrand);
      
      
      $sqlAenrollstrand="select * from student where status = 'enrolled' and campus='Atimonan' and strand = '".$rowstrand['strand']."'";
      $resAenrollstrand=mysqli_query($con,$sqlAenrollstrand);
      $enrollAcountstrand=mysqli_num_rows($resAenrollstrand);
      
      $sqlLenrollstrand="select * from student where status = 'enrolled' and campus='Lucena' and strand = '".$rowstrand['strand']."'";
      $resLenrollstrand=mysqli_query($con,$sqlLenrollstrand);
      $enrollLcountstrand=mysqli_num_rows($resLenrollstrand);
      
      $sqlSenrollstrand="select * from student where status = 'enrolled' and campus='Sariaya' and strand = '".$rowstrand['strand']."'";
      $resSenrollstrand=mysqli_query($con,$sqlSenrollstrand);
      $enrollScount=mysqli_num_rows($resSenrollstrand);
      
            
      $sqlupdate="Update catstrand set atimonanregister=". $regAcountstrand . ", lucenaregister=".$regLcountstrand. ", sariayaregister=". $regScountstrand . ", atimonanenroll=".$enrollAcountstrand.", lucenaenroll=".$enrollLcountstrand.", sariayaenroll=".$enrollScount.",totalregister=".$regAcountstrand+$regLcountstrand+$regScountstrand.",totalenroll=".$enrollAcountstrand+$enrollLcountstrand+$enrollScount." where strand = '".$rowstrand['strand']."'";
      $resupdate=mysqli_query($con,$sqlupdate);
      
      
  }
  
  //$count1="UPDATE catstrand set totalregister =".$studentcount.;
  
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content" >
        <div class="row">
            <div class="col-12">
                <a href="fee.php" id="fee" class="btn btn-glass scrollto" style="background-color: #0f6294; color: #ffffff;">School Fee Manager</a>
               
            </div>
        </div>
        <hr>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-8 col-8" >
            <!-- small box -->
            <div class="small-box bg-info" style="background-color: #12543b !Important;">
              <div class="inner">
                      <?php  
                        $query1="SELECT *  from catstrand";
                        $res=mysqli_query($con,$query1);
                        $total=0;
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <?php 
                      $total=$total+$row['totalregister']+$row['totalenroll'];
                      ?>

                      <?php endwhile ?>
                <h3><?php echo $total ?></h3>

                <p>Overall Registered Student</p>
              </div>
              <div class="icon">
                <i class="far fa-address-card"></i>
              </div>
            </div>
          </div>
          
          
        </div>

        <div class="row">
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-info" style="background-color: #12543b !Important;">
              <div class="inner">
                <?php  
                        $query1="SELECT *  from catstrand";
                        $res=mysqli_query($con,$query1);
                        $stotal=0;
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <?php 
                      $stotal=$stotal+$row['sariayaregister']+$row['sariayaenroll'];
                      ?>

                      <?php endwhile ?>
                <h3><?php echo $stotal ?></h3>

                <p>Sariaya</p>
              </div>
              <div class="icon">
                <i class="far fa-address-card"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-info" style="background-color: #12543b !Important;">
              <div class="inner">
                <?php  
                        $query1="SELECT *  from catstrand";
                        $res=mysqli_query($con,$query1);
                        $ltotal=0;
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <?php 
                      $ltotal=$ltotal+$row['lucenaregister']+$row['lucenaenroll'];
                      ?>

                      <?php endwhile ?>
                <h3><?php echo $ltotal ?></h3>

                <p>Lucena</p>
              </div>
              <div class="icon">
                <i class="far fa-address-card"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-info" style="background-color: #12543b !Important;">
              <div class="inner">
                <?php  
                        $query1="SELECT *  from catstrand";
                        $res=mysqli_query($con,$query1);
                        $atotal=0;
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <?php 
                      $atotal=$atotal+$row['atimonanregister']+$row['atimonanenroll'];
                      ?>

                      <?php endwhile ?>
                <h3><?php echo $atotal ?></h3>

                <p>Atimonan</p>
              </div>
              <div class="icon">
                <i class="far fa-address-card"></i>
              </div>
            </div>
          </div>
        </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Strand</th>
                    <th>Sariaya</th>
                    <th>Lucena</th>
                    <th>Atimonan</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php  
                        $query1="SELECT *  from catstrand";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>


                  <tr>
                    <td><?php echo $row['strandname'] ?></td>
                    <td><?php echo $row['sariayaregister']+$row['sariayaenroll']; ?></td>
                    <td><?php echo $row['lucenaregister']+$row['lucenaenroll']; ?></td>
                    <td><?php echo $row['atimonanregister']+$row['atimonanenroll']; ?></td>
                    <td><?php echo $row['totalregister']+$row['totalenroll']; ?></td>
                  </tr>
                      <?php endwhile ?>

                  </tbody>
                  
                  
                </table>


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
        <!-- /.row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
