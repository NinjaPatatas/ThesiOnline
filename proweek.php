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
            <h2 class="" style="font-weight:bold;">Enrollment Projection</h2>
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
if(isset($_POST['generate'])){
    if($_POST['starting']>$_POST['Ending']){
         echo "<script type='text/javascript'>alert('Invalid Date Range');
                </script>";
                
    }else{
    $sqldelete="DELETE FROM projectionweek";
    $resdelete=mysqli_query($con,$sqldelete);
    
    $sqldates="SELECT WEEK(dateregister) as week_number, MIN(dateregister) as startweek, MAX(dateregister) as endweek FROM student where dateregister>='".$_POST['starting']."' and dateregister<='".$_POST['Ending']."' GROUP BY week_number HAVING  week_number BETWEEN 1 AND 10 order by week_number";
    $resdates=mysqli_query($con,$sqldates);
    
    while($rowdates=mysqli_fetch_array($resdates)){
        $sqlstudent="SELECT * from student where dateregister>='".$rowdates['startweek']."' and dateregister<='".$rowdates['endweek']."'";
        $resstudent=mysqli_query($con,$sqlstudent);
        $countstudent=mysqli_num_rows($resstudent);
        $dateregister=$rowdates['week_number'];
        $weekrange=$rowdates['startweek']." to ".$rowdates['endweek'];
        
        $adddate="INSERT into projectionweek (Week,Registered_Week,Registered_Count)values('".$dateregister."','".$weekrange."','".$countstudent."')";
        $resdate=mysqli_query($con,$adddate);
    }
    
    $sqldates="SELECT WEEK(dateenrolled) as week_number, MIN(dateenrolled) as startweek, MAX(dateenrolled) as endweek FROM student where dateenrolled>='".$_POST['starting']."' and dateenrolled<='".$_POST['Ending']."' GROUP BY week_number HAVING  week_number BETWEEN 1 AND 10 order by week_number";
    $resdates=mysqli_query($con,$sqldates);
    
    while($rowdates=mysqli_fetch_array($resdates)){
        $checksql="SELECT * from projectionweek where week='".$rowdates['week_number'] ."'";
        $checkres=mysqli_query($con,$checksql);
        if($checkcount=mysqli_num_rows($checkres)){
        $sqlstudent="SELECT * from student where dateenrolled>='".$rowdates['startweek']."' and dateenrolled<='".$rowdates['endweek']."'";
        $resstudent=mysqli_query($con,$sqlstudent);
        $countstudent=mysqli_num_rows($resstudent);
        $dateregister=$rowdates['week_number'];
        $weekrange=$rowdates['startweek']." to ".$rowdates['endweek'];
        
        $adddate="UPDATE projectionweek set Enrolled_Count=".$countstudent.", Enrolled_Week='".$weekrange."' where Week='".$rowdates['week_number']."'";
        $resdate=mysqli_query($con,$adddate); 
            
        }else{
        $sqlstudent="SELECT * from student where dateenrolled>='".$rowdates['startweek']."' and dateenrolled<='".$rowdates['endweek']."'";
        $resstudent=mysqli_query($con,$sqlstudent);
        $countstudent=mysqli_num_rows($resstudent);
        $dateregister=$rowdates['week_number'];
        $weekrange=$rowdates['startweek']." to ".$rowdates['endweek'];
        
        $adddate="INSERT into projectionweek (Week,Enrolled_Week,Enrolled_Count)values('".$dateregister."','".$weekrange."','".$countstudent."')";
        $resdate=mysqli_query($con,$adddate);
        
        
         
            
        }
        
    }
    
               
                
                echo "<script type='text/javascript'>
                window.history.back();
                </script>";
                exit;
    }
}
?>
<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
          
        <div class="col-sm-6">
            <a href="projection.php" id="printButton1" class="btn btn-glass scrollto" style="background-color: #12543b; color: #ffffff;">Daily</a>
            <a href="proweek.php" id="printButton2" class="btn btn-glass scrollto" style="background-color: white; color: #12543b;">Weekly</a>
            <a href="promonth.php" id="printButton3" class="btn btn-glass scrollto" style="background-color: #12543b; color: #ffffff;">Monthly</a>
            <a href="proyear.php" id="printButton4" class="btn btn-glass scrollto" style="background-color: #12543b; color: #ffffff;">Annually</a>
            <button id="printButton" class="btn btn-glass scrollto" style="background-color: #0f6294; color: #ffffff;" onclick="printContent()">Print to PDF</button>
           
        </div>
         <br>
        <section class="content" id="mySection">
            <div class="col-sm-12">
                <div class="card card-suceess" >
                  <div class="card-header" >
                        <form method="POST">
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <label for="starting">Starting date</label>
                                <input type="date" pattern="\d{2}/\d{2}/\d{2}" class="form-control form-control-border border-width-2" id="starting" placeholder="starting" onchange="redraw()" name="starting"> 
                            </div>
                            
                            <div class="col-5">
                                <label for="Ending">Ending date</label>
                                <input type="date" pattern="\d{2}/\d{2}/\d{2}" class="form-control form-control-border border-width-2" id="Ending" placeholder="Ending" onchange="redraw()" name="Ending">
                            </div>
                            
                            <div class="col-2">
                                <button id="generate" name="generate" class="btn btn-glass scrollto" style="background-color: #0f6294; color: #ffffff;">Generate</button>
                            </div>
                        </div>
                        </form>
                    
                    
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <div class="chart" style="display: none; ">
                      <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;" ></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
            </div>
            
            <div class="col-12">

                    <table id="example1" class="table table-bordered table-striped">
                      <thead>

                      <tr>
                        <th>Week</th>
                        <th></th>
                        <th>Registered</th>
                        <th></th>
                        <th>Enrolled</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from projectionweek ORDER BY Week DESC";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>

                      <tr>
                        <td  style=" text-align: center;"><?php echo $row['Week'];?></td>
                        <td  style=" text-align: center;"><?php echo $row['Registered_Week'];?></td>
                        <td style=" text-align: center;"><?php echo $row['Registered_Count'];?></td>
                        <td  style=" text-align: center;"><?php echo $row['Enrolled_Week'];?></td>
                        <td style=" text-align: center;"><?php echo $row['Enrolled_Count'];?></td>
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
    $("#example2").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,"paging": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example1').DataTable({
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
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : [<?php 
      $sqlpro="SELECT * from projectionweek order by week";
      $respro=mysqli_query($con,$sqlpro);
      while($rowpro=mysqli_fetch_array($respro)){
          echo "'Week".$rowpro['Week']."',";
      }
      
      
      ?>],
      datasets: [
        {
          label               : 'Registered Student',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php 
              $sqlpro="SELECT * from projectionweek order by week";
              $respro=mysqli_query($con,$sqlpro);
              while($rowpro=mysqli_fetch_array($respro)){
            echo "'".$rowpro['Registered_Count']."',";
      }
      
      
      ?>]
        },
        {
          label               : 'Enrolled Student',
          backgroundColor     : 'rgba(15,108,30,0.9)',
          borderColor         : 'rgba(15,108,30,0.9)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php 
              $sqlpro="SELECT * from projectionweek order by week";
              $respro=mysqli_query($con,$sqlpro);
              while($rowpro=mysqli_fetch_array($respro)){
            echo "'".$rowpro['Enrolled_Count']."',";
      }
      
      
      ?>]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
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

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
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
