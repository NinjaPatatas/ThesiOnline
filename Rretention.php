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
            <h2 class="" style="font-weight:bold;">Retention Data Report</h2>
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
$sqldelete="DELETE FROM retention";
$resdelete=mysqli_query($con,$sqldelete);

$sqlstudent="SELECT * from student";
$resstudent=mysqli_query($con,$sqlstudent);
while($rowstudent=mysqli_fetch_array($resstudent)){
    $sqlstat="Select * from retention where Strand = '".$rowstudent['strand']."' and Category = '".$rowstudent['status']."'";
    $resstat=mysqli_query($con,$sqlstat);
    $rowstat=mysqli_fetch_array($resstat);
    $countstat=mysqli_num_rows($resstat);
    if($countstat>=1){
        $num1=0;
        $num1=$rowstat['Count']+1;
        $updatedemo="UPDATE retention Set Count=".$num1." where Strand='".$rowstudent['strand']."' and Category='".$rowstudent['status']."'";
        $resdemo=mysqli_query($con,$updatedemo);
     
    }else{
        $updatedemo="INSERT into retention (Count,Strand,Category)values(1,'".$rowstudent['strand']."','".$rowstudent['status']."' )";
        $resdemo=mysqli_query($con,$updatedemo);
    }
    
}
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
<hr>
        <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Graduated</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedgrad" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Transfered</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedtrans" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

            
            
              
              
<hr>

        <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Dropped</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackeddropp" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

            
            
              
              
<hr>
<div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Not Enrolled</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedne" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

            
            
              
              
<hr>
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
      "responsive": false, "lengthChange": false, "autoWidth": false,"paging": false
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////MAIN SARIAYA
  $(function () {
   
    
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////recommend
    
    var grad = $('#stackedgrad').get(0).getContext('2d')
    var graddata =  {
      labels  : [<?php
      $query1="SELECT * from retention where Category ='graduate'";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Strand']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Strand',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from retention where Category ='graduate'";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['Count']."',";
          }
          
          ?>'']
        },
      ]
     
      
      
    }

    var stackedBarChartOptions1 = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(grad, {
      type: 'bar',
      data: graddata,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Recommendation
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Similarity
    
    var trans = $('#stackedtrans').get(0).getContext('2d')
    var transdata =  {
      labels  : [<?php
      $query1="SELECT * from retention where Category ='transfered'";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Strand']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Strand',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
         $query1="SELECT * from retention where Category ='transfered'";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Count']."',";
      }
          
          ?>'']
        },
      ]
     
      
      
    }

    var stackedBarChartOptions1 = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(trans, {
      type: 'bar',
      data: transdata,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Similarity
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Similarity
    
    var drop = $('#stackeddropp').get(0).getContext('2d')
    var dropdata =  {
      labels  : [<?php
      $query1="SELECT * from retention where Category ='dropped'";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Strand']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Strand',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
         $query1="SELECT * from retention where Category ='dropped'";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Count']."',";
      }
          
          ?>'']
        },
      ]
     
      
      
    }

    var stackedBarChartOptions1 = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(drop, {
      type: 'bar',
      data: dropdata,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Similarity 
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Similarity
    
    var ne = $('#stackedne').get(0).getContext('2d')
    var nedata =  {
      labels  : [<?php
      $query1="SELECT * from retention where Category ='notenrolled'";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Strand']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Strand',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
         $query1="SELECT * from retention where Category ='notenrolled'";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Count']."',";
      }
          
          ?>'']
        },
      ]
     
      
      
    }

    var stackedBarChartOptions1 = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(ne, {
      type: 'bar',
      data: nedata,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Similarity 
  })

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
