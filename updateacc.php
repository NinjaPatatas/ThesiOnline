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
            <h2 class="" style="font-weight:bold;">New Account</h2>
            <a class="text-secondary"href="index.php"> Dashbord |</a>
            <a class="text-secondary"href="strand.php"> Strand Management |</a>
            <a class="text-success"href="account.php"> Account Management |</a>
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
            <a href="strand.php" class="nav-link " >
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Strand Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="account.php" class="nav-link active" style="background-color: #ffffff; color:#12543b; font-weight:bold;">
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
function validatePassword($password) {
    // Define the regular expression pattern
    $pattern = '/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/';
    return preg_match($pattern, $password);
}


if (isset($_POST['btnreset'])) {
    if($_POST['password']==$_POST['cpassword']){
        $password=$_POST['password'];
        if (validatePassword($password)) {
        $sqlfind="select * from userid where userid =".$_SESSION['userid'];
        $resfind=mysqli_query($con,$sqlfind);
        $count=mysqli_num_rows($resfind);
        
        
        if($count==1){
             $sqladd="UPDATE userid SET password ='".$_POST['password']."' where userid =".$_SESSION['userid'];
             echo $sqladd;
            $resadd=mysqli_query($con,$sqladd);  
            ob_start();
            echo "<script type='text/javascript'>alert('Password Changed')</script>";
            // Redirect to the login page or any other page after logout
            $_SESSION = array();

            // Destroy the session
            session_destroy();
            echo "<script language='javascript' type='text/javascript'> location.href='account.php' </script>";
            ob_end_flush(); // Flush the output buffer and send the content to the browser
            exit();
        }else{
           echo "<script type='text/javascript'>alert('Invalid username or password')</script>";
        }
   
        
        } else {
            echo "<script type='text/javascript'>alert('Password is not valid. Please make sure it is at least 8 characters long and includes at least one number and one special character.')</script>";
        }
    }else{
        echo "<script type='text/javascript'>alert('Passwords do not match.')</script>";
    }
    

}

if(isset($_POST['btnupdate'])){
    $sqlupdate1="UPDATE userid SET displayname ='".$_POST['fname']."', role='".$_POST['des']."', campus='".$_POST['campus']."', status='".$_POST['status']."'  where userid =".$_SESSION['userid'];
    $resupdate1=mysqli_query($con, $sqlupdate1);
    echo "<script type='text/javascript'>alert('Saved Changes')</script>";
    echo "<script language='javascript' type='text/javascript'> location.href='account.php' </script>";
}
?>











<div class="content-wrapper " >
    <br>
    <!-- Main content -->
    <section class="content">
    <form action="#" class="signin-form" method="post">
        <?php
        $uID=$_SESSION['userid'];
        $sqladmin="Select * from userid where userid =".$uID;
        $resadmin=mysqli_query($con,$sqladmin);
        $rowadmin=mysqli_fetch_array($resadmin);
        ?>
        <div class="card card-primary">
              <div class="card-header" style="background-color: #12543b !Important;">
                <h3 class="card-title">Update Account Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-6">
                    <label for="fname"><span style="color:red;">*</span>Full Name </label>
                    <input type="text" class="form-control form-control-border border-width-2" id="fname" value="<?php echo $rowadmin['displayname']?>" name="fname" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="fname"><span style="color:red;">*</span>Username</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="uname" name="uname"  value="<?php echo $rowadmin['username']?>" readonly>
                  </div>
                </div>
                
                <div class="row">
                  
                  <div class="form-group col-6">
                    <label for="Campus"><span style="color:red;">*</span>Campus</label>
                    <select class="custom-select form-control-border border-width-2" id="campus" name="campus" required>
                    <option></option>
                    <option value="Sariaya" <?php echo ($rowadmin['campus'] == 'Sariaya') ? 'selected' : ''; ?>>Sariaya</option>
                    <option value="Lucena" <?php echo ($rowadmin['campus'] == 'Lucena') ? 'selected' : ''; ?>>Lucena</option>
                    <option value="Atimonan" <?php echo ($rowadmin['campus'] == 'Atimonan') ? 'selected' : ''; ?>>Atimonan</option>
                    </select>
                  </div>
                  
                  <div class="form-group col-6">
                    <label for="Campus"><span style="color:red;">*</span>Designation</label>
                    <select class="custom-select form-control-border border-width-2" id="des" name="des" required>
                    <option></option>
                    <option value="Principal" <?php echo ($rowadmin['role'] == 'Principal') ? 'selected' : ''; ?>>Principal</option>
                    <option value="Registrar" <?php echo ($rowadmin['role'] == 'Registrar') ? 'selected' : ''; ?>>Registrar</option>
                    </select>
                  </div>
                  
                  <div class="form-group col-6">
                    <label for="Campus"><span style="color:red;">*</span>Status</label>
                    <select class="custom-select form-control-border border-width-2" id="status" name="status" required>
                    <option></option>
                    <option value="active" <?php echo ($rowadmin['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                    <option value="inactive" <?php echo ($rowadmin['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                  </div>
                </div>


              </div>
              <!-- /.card-body -->
        </div>
         <hr>
          <button name="btnupdate" type="submit" class="btn btn-block btn-success col-4" style="background-color: #12543b !Important;">Update Information</button>
    
        <br>
        <br>
        <br>
        
        
        
        <div class="card card-primary">
              <div class="card-header" style="background-color: #12543b !Important;">
                <h3 class="card-title">Reset Password</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-6">
                    <label for="uname">Password</label>
                    <input type="password" class="form-control form-control-border border-width-2" id="password" name="password">
                   
                  </div>
                  
                  <div class="form-group col-6">
                    <label for="uname">Confirm Password</label>
                    <input type="password" class="form-control form-control-border border-width-2" id="cpassword" name="cpassword">
                  </div>
 
                </div>
                 <p><em>Please make sure the password is at least 8 characters long and includes at least one number and one special character. </em></p>
                
                
                

              </div>
              <!-- /.card-body -->
        </div>
         <button name="btnreset" type="submit" class="btn btn-block btn-success col-4" style="background-color: #12543b !Important;">Reset password</button>
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