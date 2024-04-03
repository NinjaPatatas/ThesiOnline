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
            <h2 class="" style="font-weight:bold;">School Fee Manager</h2>
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
            <a href="strand.php" class="nav-link " >
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



if (isset($_POST['btncreate'])) {


    $sqladd="INSERT into schoolfee (SchoolType,Amount,Description,StudentType,feetype,campus,gradelevel) values ('".$_POST['school']."','".$_POST['amount']."','".$_POST['des']."','".$_POST['stype']."','".$_POST['feetype']."','".$_POST['campus']."','".$_POST['grade']."')";
    $resadd=mysqli_query($con,$sqladd);  
    echo "<script type='text/javascript'>alert('New School Fee Added')</script>";
    echo "<script type='text/javascript'>
    window.history.back();
    </script>";
    exit;

}


$sqloption="SELECT * from schoolfee";
$resoption=mysqli_query($con,$sqloption);
while($rowoption=mysqli_fetch_array($resoption)){
    $num1=$rowoption['ID'];
    if(isset($_POST['update'.$num1])){
        $_SESSION['feeID']=$num1;
        //echo "<script type='text/javascript'>alert('Option Removed Sucessfully ".$num1." 11')</script>";
        echo  "<script language='javascript' type='text/javascript'> location.href='feeupdate.php' </script>";
    }
    
    
    if(isset($_POST['delete'.$num1])){
        
        echo "<script>
            var result1 = confirm(' Are you sure you want to remove this fee?');

            if (result1) {
                window.location.href = 'fee.php?ID=' + encodeURIComponent('".$num1."');
            } else {
                window.location.href = 'fee.php'
            }
          </script>";
          
          
    }
    
    if(isset($_GET['ID'])) {
        $oID=$_GET['ID'];
        
        
        $sqlremoveo2="DELETE from schoolfee where ID='".$oID."'";
        $resremoveo2=mysqli_query($con,$sqlremoveo2);
        
       
        echo "<script type='text/javascript'>alert('School Fee Removed Sucessfully')</script>";
        echo  "<script language='javascript' type='text/javascript'> location.href='fee.php' </script>";
         exit();
    }
}



?>











<div class="content-wrapper " >
    <br>
    <!-- Main content -->
    <section class="content">
    

        <div class="card card-primary">
              <div class="card-header" style="background-color: #12543b !Important;">
                <h3 class="card-title">School Fee Information</h3>
              </div>
              <form action="#" class="signin-form" method="post">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-4">
                    <label for="des"><span style="color:red;">*</span>Description: </label>
                    <input type="text" class="form-control form-control-border border-width-2" id="des" placeholder="Tuition QVR SGFUND" name="des" required>
                  </div>
                  <div class="form-group col-4">
                    <label for="feetype"><span style="color:red;">*</span>Fee Type</label>
                    <select class="custom-select form-control-border border-width-2" id="feetype" name="feetype" required>
                    <option></option>
                    <option value="additional">additional</option>
                    <option value="discount">discount</option>
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label for="amount"><span style="color:red;">*</span>Amount: </label>
                    <input type="number" class="form-control form-control-border border-width-2" id="amount"  name="amount" required>
                  </div>
                </div>
                
                <div class="row">
                  
                  <div class="form-group col-3">
                    <label for="Campus"><span style="color:red;">*</span>Campus</label>
                    <select class="custom-select form-control-border border-width-2" id="campus" name="campus" required>
                    <option></option>
                    <option value="Sariaya">Sariaya</option>
                    <option value="Lucena">Lucena</option>
                    <option value="Atimonan">Atimonan</option>
                    </select>
                  </div>
                  
                  <div class="form-group col-3">
                    <label for="stype"><span style="color:red;">*</span>Student Type</label>
                    <select class="custom-select form-control-border border-width-2" id="stype" name="stype" required>
                    <option></option>
                    <option value="New Student">New Student</option>
                    <option value="Old Student">Old Student</option>
                    <option value="Transferee">Transferee</option>
                    <option value="Returning Student">Returning Student</option>
                    </select>
                  </div>
                  
                  <div class="form-group col-3">
                    <label for="grade"><span style="color:red;">*</span>GradeLevel</label>
                    <select class="custom-select form-control-border border-width-2" id="grade" name="grade" required>
                    <option></option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>
                  </div>
                  
                  <div class="form-group col-3">
                    <label for="school"><span style="color:red;">*</span>From</label>
                    <select class="custom-select form-control-border border-width-2" id="school" name="school" required>
                    <option></option>
                    <option value="Public">Public</option>
                    <option value="Private">Private</option>
                    </select>
                  </div>
                </div>
                
                  <button name="btncreate" type="submit" class="btn btn-block btn-success col-3" style="background-color: #12543b !Important;">Add New School Fee </button>
                  <hr>
                </form>
               
               
                

              </div>
              <!-- /.card-body -->
        </div>
        <div class="col-12">
                    <form method="POST">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>

                      <tr>
                        <th>Description</th>
                        <th>Fee Type</th>
                        <th>Amount</th>
                        <th>Campus</th>
                        <th>Student Type</th>
                        <th>GradeLevel</th>
                        <th>From</th>
                        <th></th>
                        
                       
                        
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from schoolfee Order by campus";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>

                      <tr>
                        <td style=" text-align: center;"><?php echo $row['Description'];?></td>
                        <td style=" text-align: center;"><?php echo $row['feetype'];?></td>
                        <td style=" text-align: center;"><?php echo $row['Amount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['campus'];?></td>
                        <td style=" text-align: center;"><?php echo $row['StudentType'];?></td>
                        <td style=" text-align: center;"><?php echo $row['gradelevel'];?></td>
                        <td style=" text-align: center;"><?php echo $row['SchoolType'];?></td>
                        <td><button type="submit" class="btn btn-glass scrollto btn-success" style="background-color: #12543b !Important;" name=<?php echo "'update". $row['ID'] ."'"?>>update</button>
                              <button type="submit" class="btn btn-glass scrollto btn-success" style="background-color: #641a1c !Important;" name=<?php echo "'delete". $row['ID'] ."'"?>>remove</button></td>
                      </tr>


                      <?php endwhile ?>

                      
                      </tbody>
                    </table>
                    </form>

                <!-- /.card -->
              </div> 

     

        <hr>


    
        
    
        <br>
        <br>
        <br>
        
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
