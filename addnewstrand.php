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

      <div class="col-sm-6">
            <h2 class="" style="font-weight:bold;">Modify Strand</h2>
            <a class="text-secondary"href="index.php"> Dashbord |</a>
            <a class="text-success"href="strand.php"> Strand Management |</a>
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
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="strand.php" class="nav-link active" style="background-color: #ffffff; color:#12543b; font-weight:bold;">
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
if (isset($_POST['updatedValue'])) {
$strandname=$_POST['sname'];
$description=$_POST['sdes'];



$content=$_POST['updatedValue'];

if (isset($_POST['a11'])) {
    $a11="yes";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','11','Atimonan','yes')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}else{
    $a11="no";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','11','Atimonan','no')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}

if(isset($_POST['a12'])){
    $a12="yes";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','12','Atimonan','yes')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}else{
    $a12="no";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','12','Atimonan','no')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}

if(isset($_POST['l11'])){
    $l11="yes";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','11','Lucena','yes')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}else{
    $l11="no";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','11','Lucena','no')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}
if(isset($_POST['l12'])){
    $l12="yes";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','12','Lucena','yes')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}else{
    $l12="no";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','12','Lucena','no')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}
if(isset($_POST['s11'])){
    $s11="yes";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','11','Sariaya','yes')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}else{
    $s11="no";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','11','Sariaya','no')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}
if(isset($_POST['s12'])){
    $s12="yes";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','12','Sariaya','yes')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}else{
    $s12="no";
    $sqlcatstrand="INSERT INTO strand (strandname,stranddescription,blocks,studentperblock,gradelevel,campus,status) VALUES ('$strandname', '$description','1','0','12','Sariaya','no')";
    $rescatstrand=mysqli_query($con,$sqlcatstrand);
}

$sqlcatstrand="INSERT INTO catstrand (strand, strandname,atimonan11,atimonan12,lucena11,lucena12,sariaya11,sariaya12,content) VALUES ('$strandname', '$description','$a11','$a12','$l11','$l12','$s11','$s12','$content')";
$rescatstrand=mysqli_query($con,$sqlcatstrand);

 
$sqlchoices="ALTER TABLE choices ADD COLUMN ". $strandname. " INTEGER DEFAULT 0";
$reschoices=mysqli_query($con,$sqlchoices);

$sqlchoices="ALTER TABLE strandreg ADD COLUMN ". $strandname . " INTEGER DEFAULT 0";
$reschoices=mysqli_query($con,$sqlchoices);
    
    
echo "<script type='text/javascript'>alert('New Strand is Added to the system.')</script>";
echo "<script language='javascript' type='text/javascript'> location.href='strand.php' </script>";
}
?>
<div class="content-wrapper " >
    <br>
    <!-- Main content -->
    <section class="content">
    <form action="#" class="signin-form" method="post">

        <div class="card card-primary">
              <div class="card-header" style="background-color: #12543b !Important;">
                <h3 class="card-title">Strand Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-4">
                    <label for="sname"><span style="color:red;">*</span>Strand Name</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="sname" placeholder="ex. ABM/GAS/ICT" name="sname" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-12">
                    <label for="sdes"><span style="color:red;">*</span>Strand Desciption</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="sdes"  placeholder="ex. Acounting and Business Management" name="sdes" required>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
        </div>

        <div class="card card-primary">
              <div class="card-header" style="background-color: #12543b !Important;">
                <h3 class="card-title">Strand Availability</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-4">
                    <label for="HouseNumber">Atimonan</label>
                    <div class="custom-control custom-checkbox col-xm-3 col-sm-6" >
                              <input class="custom-control-input" type="checkbox" id="a11" value="atimonan11" name="a11">
                              <label for="a11" class="custom-control-label" style="font-weight: normal; !important" >Grade 11 </label>
                    </div>
                    <div class="custom-control custom-checkbox col-xm-3 col-sm-6" >
                              <input class="custom-control-input" type="checkbox" id="a12" value="atimonan12" name="a12">
                              <label for="a12" class="custom-control-label" style="font-weight: normal; !important" >Grade 12 </label>
                    </div>
                  </div>
                  <div class="form-group col-4">
                    <label for="HouseNumber">Sariaya</label>
                    <div class="custom-control custom-checkbox col-xm-3 col-sm-6" >
                              <input class="custom-control-input" type="checkbox" id="s11" value="sariaya11" name="s11">
                              <label for="s11" class="custom-control-label" style="font-weight: normal; !important" >Grade 11 </label>
                    </div>
                    <div class="custom-control custom-checkbox col-xm-3 col-sm-6" >
                              <input class="custom-control-input" type="checkbox" id="s12" value="sariaya12" name="s12">
                              <label for="s12" class="custom-control-label" style="font-weight: normal; !important" >Grade 12 </label>
                    </div>
                  </div>
                  <div class="form-group col-4">
                    <label for="HouseNumber">Lucena</label>
                    <div class="custom-control custom-checkbox col-xm-3 col-sm-6" >
                              <input class="custom-control-input" type="checkbox" id="l11" value="lucena11" name="l11">
                              <label for="l11" class="custom-control-label" style="font-weight: normal; !important" >Grade 11 </label>
                    </div>
                    <div class="custom-control custom-checkbox col-xm-3 col-sm-6" >
                              <input class="custom-control-input" type="checkbox" id="l12" value="lucena12" name="l12">
                              <label for="l12" class="custom-control-label" style="font-weight: normal; !important" >Grade 12 </label>
                    </div>
                  </div>
                </div>

                
              </div>
              <!-- /.card-body -->
      </div>

      <div class="card card-primary">
              <div class="card-header" style="background-color: #12543b !Important;">
                <h3 class="card-title">Content</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  
                  <div class="form-group col-12">
                    <label for="gfirstname"><span style="color:red;">*</span>Entere words to describe the strand </label>
                    <textarea id="textArea" class="form-control" rows="10" cols="50"  name="updatedValue" style="margin:0;">
                            
                        
                    </textarea>
                  </div>
                </div>
            </div>
      </div>

        <hr>


          &nbsp;&nbsp;&nbsp;&nbsp;
          <button type="submit" class="btn btn-block btn-success col-4" style="background-color: #12543b !Important;">Save as New Strand</button>
    
        <br>
        <br>
        <br>
        </form>
         </section>
        
        
      </div>






</div>
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
