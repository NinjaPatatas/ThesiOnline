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
            <h2 class="" style="font-weight:bold;">Strand Recommendation Report</h2>
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
$sqldelete="DELETE FROM strandaverage";
$resdelete=mysqli_query($con,$sqldelete);


$sqlcat="select * from catstrand";
$rescat=mysqli_query($con,$sqlcat);
while($rowcat=mysqli_fetch_array($rescat)){
    $sqlrecomend="select * from strandreg where RegisteredStrand ='".$rowcat['strand']."'";
    $resrecomend=mysqli_query($con,$sqlrecomend);
    $rowrecomend=mysqli_fetch_array($resrecomend);
    $countrecomend=mysqli_num_rows($resrecomend);
    
    $updatedemo="INSERT into strandaverage (strand,recommendation)values('".$rowcat['strand']."',".$countrecomend .")";
    $resdemo=mysqli_query($con,$updatedemo);
    
    
    
}

$sqlave="select * from strandaverage";
$resave=mysqli_query($con,$sqlcat);
while($rowave=mysqli_fetch_array($resave)){
    $sqlreg="Select FORMAT(AVG(".$rowave['strand']."),2) as average_value from strandreg";
    $resreg=mysqli_query($con,$sqlreg);
    $rowreg=mysqli_fetch_array($resreg);
    
    $updatedemo="UPDATE strandaverage Set average=".$rowreg['average_value']." where strand='".$rowave['strand']."'";
    $resdemo=mysqli_query($con,$updatedemo);
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
            <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Strand</h3>

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
                 <div class="row">
                <div class="chart col-4">
                    <h5>Sariaya</h5>
                  <canvas id="donutChartA" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
                <div class="chart  col-4">
                    <h5>Lucena</h5>
                  <canvas id="donutChartB" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <div class="chart  col-4">
                    <h5>Atimonan</h5>
                  <canvas id="donutChartC" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
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
                <h3 class="card-title">Strand Recommendation Frequency</h3>

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
                  <canvas id="stackedrecommendation" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

            
            
              
              
<hr>
        <hr>
        <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Strand Similarity Average</h3>

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
                  <canvas id="stackedsimilarity" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
   
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var Sariaya = $('#donutChartA').get(0).getContext('2d')
    var Sariayadata        = {
      labels: [
          <?php
          $sqlstrand="Select * from catstrand";
          $restrand=mysqli_query($con,$sqlstrand);
          while($rowstrand=mysqli_fetch_array($restrand)){
          echo "'".$rowstrand['strand']."',";
          }
          ?>""
      ],
      datasets: [
        {
          data: [
            <?php
          $sqlstrand="Select * from catstrand";
          $restrand=mysqli_query($con,$sqlstrand);
          while($rowstrand=mysqli_fetch_array($restrand)){
          echo "'".$rowstrand['sariayaregister']+$rowstrand['sariayaenroll']."',";
          }
          ?>""

          ],
          backgroundColor : ['#f56954', '#f5a454', '#f5d554', '#d5f554', '#85f554', '#54f594','#54f5e8','#54baf5','#546bf5','#a054f5'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(Sariaya, {
      type: 'doughnut',
      data: Sariayadata,
      options: donutOptions
    })
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////MAIN SARIAYA
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////MAIN Lucena

   
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var lucena = $('#donutChartB').get(0).getContext('2d')
    var lucenadata        = {
      labels: [
          <?php
          $sqlstrand="Select * from catstrand";
          $restrand=mysqli_query($con,$sqlstrand);
          while($rowstrand=mysqli_fetch_array($restrand)){
          echo "'".$rowstrand['strand']."',";
          }
          ?>""
      ],
      datasets: [
        {
          data: [
            <?php
          $sqlstrand="Select * from catstrand";
          $restrand=mysqli_query($con,$sqlstrand);
          while($rowstrand=mysqli_fetch_array($restrand)){
          echo "'".$rowstrand['lucenaregister']+$rowstrand['lucenaenroll']."',";
          }
          ?>""

          ],
          backgroundColor : ['#f56954', '#f5a454', '#f5d554', '#d5f554', '#85f554', '#54f594','#54f5e8','#54baf5','#546bf5','#a054f5'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(lucena, {
      type: 'doughnut',
      data: lucenadata,
      options: donutOptions
    })
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////MAIN Lucena
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////MAIN Atimonan

   
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var atimonan = $('#donutChartC').get(0).getContext('2d')
    var atimonandata        = {
      labels: [
          <?php
          $sqlstrand="Select * from catstrand";
          $restrand=mysqli_query($con,$sqlstrand);
          while($rowstrand=mysqli_fetch_array($restrand)){
          echo "'".$rowstrand['strand']."',";
          }
          ?>""
      ],
      datasets: [
        {
          data: [
            <?php
          $sqlstrand="Select * from catstrand";
          $restrand=mysqli_query($con,$sqlstrand);
          while($rowstrand=mysqli_fetch_array($restrand)){
          echo "'".$rowstrand['atimonanregister']+$rowstrand['atimonanenroll']."',";
          }
          ?>""

          ],
          backgroundColor : ['#f56954', '#f5a454', '#f5d554', '#d5f554', '#85f554', '#54f594','#54f5e8','#54baf5','#546bf5','#a054f5'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(atimonan, {
      type: 'doughnut',
      data: atimonandata,
      options: donutOptions
    })
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////MAIN Atimonan
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////recommend
    
    var strandrem = $('#stackedrecommendation').get(0).getContext('2d')
    var strandremdata =  {
      labels  : [<?php
      $query1="SELECT * from strandaverage";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['strand']."',";
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
          $query1="SELECT * from strandaverage";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['recommendation']."',";
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

    new Chart(strandrem, {
      type: 'bar',
      data: strandremdata,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Recommendation
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Similarity
    
    var strandsimi = $('#stackedsimilarity').get(0).getContext('2d')
    var strandsimidata =  {
      labels  : [<?php
      $query1="SELECT * from strandaverage";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['strand']."',";
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
          $query1="SELECT * from strandaverage";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['average']."',";
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

    new Chart(strandsimi, {
      type: 'bar',
      data: strandsimidata,
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
