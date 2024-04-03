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
            <h2 class="" style="font-weight:bold;">Demographic Report</h2>
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
$sqldelete="DELETE FROM demography";
$resdelete=mysqli_query($con,$sqldelete);

$sqldates="SELECT * FROM student";
$resdates=mysqli_query($con,$sqldates);
while($rowdates=mysqli_fetch_array($resdates)){
    
    //age
    $sqlage="SELECT * from demography where content='".$rowdates['age']."' and category ='age'";
    $resage=mysqli_query($con,$sqlage);
    $rowage=mysqli_fetch_array($resage);
    $countage=mysqli_num_rows($resage);
    if($countage>=1){
        $age1=0;
        if($rowdates['gender']=='Male'){
            $age1=$rowage['MaleCount']+1;
            $updatedemo="UPDATE demography Set MaleCount=".$age1." where content='".$rowdates['age']."' and category='age'";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $age1=$rowage['FemaleCount']+1;
            $updatedemo="UPDATE demography Set FemaleCount=".$age1." where content='".$rowdates['age']."' and category='age'";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
           
        }
    }else{
        if($rowdates['gender']=='Male'){
            $updatedemo="INSERT into demography (Content,MaleCount,Category)values('".$rowdates['age']."', 1,'age')";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $updatedemo="INSERT into demography (Content,FemaleCount,Category)values('".$rowdates['age']."', 1,'age')";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
           
        }
    }
    
    //gender
    $sqlage="SELECT * from demography where content='".$rowdates['gender']."' and category ='gender'";
    $resage=mysqli_query($con,$sqlage);
    $rowage=mysqli_fetch_array($resage);
    $countage=mysqli_num_rows($resage);
    if($countage>=1){
        $num1=0;
        if($rowdates['gender']=='Male'){
            $num1=$rowage['MaleCount']+1;
            $updatedemo="UPDATE demography Set MaleCount=".$num1." where content='".$rowdates['gender']."' and category='gender'";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $num1=$rowage['FemaleCount']+1;
            $updatedemo="UPDATE demography Set FemaleCount=".$num1." where content='".$rowdates['gender']."' and category='gender'";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }else{
        if($rowdates['gender']=='Male'){
            $updatedemo="INSERT into demography (Content,MaleCount,Category)values('".$rowdates['gender']."', 1,'gender')";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $updatedemo="INSERT into demography (Content,FemaleCount,Category)values('".$rowdates['gender']."', 1,'gender')";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }
    
    //religion
    $sqlage="SELECT * from demography where content='".$rowdates['religion']."' and category ='religion'";
    $resage=mysqli_query($con,$sqlage);
    $rowage=mysqli_fetch_array($resage);
    $countage=mysqli_num_rows($resage);
    if($countage>=1){
        $num1=0;
        if($rowdates['gender']=='Male'){
            $num1=$rowage['MaleCount']+1;
            $updatedemo="UPDATE demography Set MaleCount=".$num1." where content='".$rowdates['religion']."' and category='religion'";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $num1=$rowage['FemaleCount']+1;
            $updatedemo="UPDATE demography Set FemaleCount=".$num1." where content='".$rowdates['religion']."' and category='religion'";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }else{
        if($rowdates['gender']=='Male'){
            $updatedemo="INSERT into demography (Content,MaleCount,Category)values('".$rowdates['religion']."', 1,'religion')";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $updatedemo="INSERT into demography (Content,FemaleCount,Category)values('".$rowdates['religion']."', 1,'religion')";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }
    
    //municipality
    $sqlage="SELECT * from demography where content='".$rowdates['municipality']."' and category ='municipality'";
    $resage=mysqli_query($con,$sqlage);
    $rowage=mysqli_fetch_array($resage);
    $countage=mysqli_num_rows($resage);
    if($countage>=1){
        $num1=0;
        if($rowdates['gender']=='Male'){
            $num1=$rowage['MaleCount']+1;
            $updatedemo="UPDATE demography Set MaleCount=".$num1." where content='".$rowdates['municipality']."' and category='municipality'";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $num1=$rowage['FemaleCount']+1;
            $updatedemo="UPDATE demography Set FemaleCount=".$num1." where content='".$rowdates['municipality']."' and category='municipality'";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }else{
        if($rowdates['gender']=='Male'){
            $updatedemo="INSERT into demography (Content,MaleCount,Category)values('".$rowdates['municipality']."', 1,'municipality')";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $updatedemo="INSERT into demography (Content,FemaleCount,Category)values('".$rowdates['municipality']."', 1,'municipality')";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }
    
    //guardian
    $sqlage="SELECT * from demography where content='".$rowdates['relationship']."' and category ='relationship'";
    $resage=mysqli_query($con,$sqlage);
    $rowage=mysqli_fetch_array($resage);
    $countage=mysqli_num_rows($resage);
    if($countage>=1){
        $num1=0;
        if($rowdates['gender']=='Male'){
            $num1=$rowage['MaleCount']+1;
            $updatedemo="UPDATE demography Set MaleCount=".$num1." where content='".$rowdates['relationship']."' and category='relationship'";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $num1=$rowage['FemaleCount']+1;
            $updatedemo="UPDATE demography Set FemaleCount=".$num1." where content='".$rowdates['relationship']."' and category='relationship'";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }else{
        if($rowdates['gender']=='Male'){
            $updatedemo="INSERT into demography (Content,MaleCount,Category)values('".$rowdates['relationship']."', 1,'relationship')";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $updatedemo="INSERT into demography (Content,FemaleCount,Category)values('".$rowdates['relationship']."', 1,'relationship')";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }
    
    
    //lastschoolattended
    $sqlage="SELECT * from demography where content='".$rowdates['lastschoolattended']."' and category ='lastschoolattended'";
    $resage=mysqli_query($con,$sqlage);
    $rowage=mysqli_fetch_array($resage);
    $countage=mysqli_num_rows($resage);
    if($countage>=1){
        $num1=0;
        if($rowdates['gender']=='Male'){
            $num1=$rowage['MaleCount']+1;
            $updatedemo="UPDATE demography Set MaleCount=".$num1." where content='".$rowdates['lastschoolattended']."' and category='lastschoolattended'";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $num1=$rowage['FemaleCount']+1;
            $updatedemo="UPDATE demography Set FemaleCount=".$num1." where content='".$rowdates['lastschoolattended']."' and category='lastschoolattended'";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }else{
        if($rowdates['gender']=='Male'){
            $updatedemo="INSERT into demography (Content,MaleCount,Category)values('".$rowdates['lastschoolattended']."', 1,'lastschoolattended')";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $updatedemo="INSERT into demography (Content,FemaleCount,Category)values('".$rowdates['lastschoolattended']."', 1,'lastschoolattended')";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }
    
    
    //campus
    $sqlage="SELECT * from demography where content='".$rowdates['campus']."' and category ='campus'";
    $resage=mysqli_query($con,$sqlage);
    $rowage=mysqli_fetch_array($resage);
    $countage=mysqli_num_rows($resage);
    if($countage>=1){
        $num1=0;
        if($rowdates['gender']=='Male'){
            $num1=$rowage['MaleCount']+1;
            $updatedemo="UPDATE demography Set MaleCount=".$num1." where content='".$rowdates['campus']."' and category='campus'";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $num1=$rowage['FemaleCount']+1;
            $updatedemo="UPDATE demography Set FemaleCount=".$num1." where content='".$rowdates['campus']."' and category='campus'";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }else{
        if($rowdates['gender']=='Male'){
            $updatedemo="INSERT into demography (Content,MaleCount,Category)values('".$rowdates['campus']."', 1,'campus')";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $updatedemo="INSERT into demography (Content,FemaleCount,Category)values('".$rowdates['campus']."', 1,'campus')";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }
    
    //feedback
    $sqlage="SELECT * from demography where content='".$rowdates['feedback']."' and category ='feedback'";
    $resage=mysqli_query($con,$sqlage);
    $rowage=mysqli_fetch_array($resage);
    $countage=mysqli_num_rows($resage);
    if($countage>=1){
        $num1=0;
        if($rowdates['gender']=='Male'){
            $num1=$rowage['MaleCount']+1;
            $updatedemo="UPDATE demography Set MaleCount=".$num1." where content='".$rowdates['feedback']."' and category='feedback'";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $num1=$rowage['FemaleCount']+1;
            $updatedemo="UPDATE demography Set FemaleCount=".$num1." where content='".$rowdates['feedback']."' and category='feedback'";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }else{
        if($rowdates['gender']=='Male'){
            $updatedemo="INSERT into demography (Content,MaleCount,Category)values('".$rowdates['feedback']."', 1,'feedback')";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $updatedemo="INSERT into demography (Content,FemaleCount,Category)values('".$rowdates['feedback']."', 1,'feedback')";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }
    
    
    //strand
    $sqlage="SELECT * from demography where content='".$rowdates['strand']."' and category ='strand'";
    $resage=mysqli_query($con,$sqlage);
    $rowage=mysqli_fetch_array($resage);
    $countage=mysqli_num_rows($resage);
    if($countage>=1){
        $num1=0;
        if($rowdates['gender']=='Male'){
            $num1=$rowage['MaleCount']+1;
            $updatedemo="UPDATE demography Set MaleCount=".$num1." where content='".$rowdates['strand']."' and category='strand'";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $num1=$rowage['FemaleCount']+1;
            $updatedemo="UPDATE demography Set FemaleCount=".$num1." where content='".$rowdates['strand']."' and category='strand'";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }else{
        if($rowdates['gender']=='Male'){
            $updatedemo="INSERT into demography (Content,MaleCount,Category)values('".$rowdates['strand']."', 1,'strand')";
            $resdemo=mysqli_query($con,$updatedemo);
            
        }elseif($rowdates['gender']=='Female'){
            $updatedemo="INSERT into demography (Content,FemaleCount,Category)values('".$rowdates['strand']."', 1,'strand')";
            $resdemo=mysqli_query($con,$updatedemo);
        }else{
            
        }
    }
    
    
    
}

$sqltotal="SELECT * from demography";
$restotal=mysqli_query($con,$sqltotal);
while($rowtotal=mysqli_fetch_array($restotal)){
    $total=$rowtotal['MaleCount']+$rowtotal['FemaleCount'];
    
     $updatedemo="UPDATE demography Set TotalCount=".$total." where ID=".$rowtotal['ID'];
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
        
        <div class="col-sm-12">
            <h4> Male: <?php 
            $g="SELECT * from student where gender = 'Male'";
            $resg=mysqli_query($con,$g);
            echo $rowg=mysqli_num_rows($resg)." || ";
            ?>
            
            Female: <?php 
            $g="SELECT * from student where gender = 'Female'";
            $resg=mysqli_query($con,$g);
            echo $rowg=mysqli_num_rows($resg)." || ";
            ?>
            
            </H4>
            
        </div>
        
        <section class="content" id="mySection">
            <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header" style="background-color:#12543b;">
                <h3 class="card-title">Gender</h3>

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
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
              <div class="card-header" style="background-color:#12543b;">
                <h3 class="card-title">Age</h3>

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
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
                <div class="col-12">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Age</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from demography where Category='age'";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <tr>
                        <td style=" text-align: center;"><?php echo $row['Content'];?></td>
                        <td style=" text-align: center;"><?php echo $row['MaleCount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['FemaleCount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['TotalCount'];?></td>
                      </tr>
                      <?php endwhile ?>
                      </tbody>
                    </table>
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
              <div class="card-header" style="background-color:#12543b;">
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
                <div class="chart">
                  <canvas id="stackedBarChart0" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
                <div class="col-12">
                    <table id="example0" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Strand</th>
                        <th>Male</th>
                        <th>Female</th>
  
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from demography where Category='Strand'";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <tr>
                        <td  style=" text-align: center;"><?php echo $row['Content'];?></td>
                        <td style=" text-align: center;"><?php echo $row['MaleCount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['FemaleCount'];?></td>

                        <td style=" text-align: center;"><?php echo $row['TotalCount'];?></td>
                      </tr>
                      <?php endwhile ?>
                      </tbody>
                    </table>
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
              <div class="card-header" style="background-color:#12543b;">
                <h3 class="card-title">Religion</h3>

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
                  <canvas id="stackedBarChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
                <div class="col-12">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Religion</th>
                        <th>Male</th>
                        <th>Female</th>

                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from demography where Category='religion'";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <tr>
                        <td  style=" text-align: center;"><?php echo $row['Content'];?></td>
                        <td style=" text-align: center;"><?php echo $row['MaleCount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['FemaleCount'];?></td>

                        <td style=" text-align: center;"><?php echo $row['TotalCount'];?></td>
                      </tr>
                      <?php endwhile ?>
                      </tbody>
                    </table>
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
              <div class="card-header" style="background-color:#12543b;">
                <h3 class="card-title">Municipality</h3>

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
                  <canvas id="stackedBarChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
                <div class="col-12">
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Municipality</th>
                        <th>Male</th>
                        <th>Female</th>

                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from demography where Category='municipality'";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <tr>
                        <td  style=" text-align: center;"><?php echo $row['Content'];?></td>
                        <td style=" text-align: center;"><?php echo $row['MaleCount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['FemaleCount'];?></td>

                        <td style=" text-align: center;"><?php echo $row['TotalCount'];?></td>
                      </tr>
                      <?php endwhile ?>
                      </tbody>
                    </table>
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
              <div class="card-header" style="background-color:#12543b;">
                <h3 class="card-title">Relationship</h3>

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
                  <canvas id="stackedBarChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  
                  
                  <div class="col-12">
                    <table id="example4" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Relationship</th>
                        <th>Male</th>
                        <th>Female</th>

                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from demography where Category='relationship'";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <tr>
                        <td  style=" text-align: center;"><?php echo $row['Content'];?></td>
                        <td style=" text-align: center;"><?php echo $row['MaleCount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['FemaleCount'];?></td>

                        <td style=" text-align: center;"><?php echo $row['TotalCount'];?></td>
                      </tr>
                      <?php endwhile ?>
                      </tbody>
                    </table>
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
              <div class="card-header" style="background-color:#12543b;">
                <h3 class="card-title">School Attended</h3>

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
                  <canvas id="stackedBarChart4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
                
                
                <div class="col-12">
                    <table id="example5" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>School Attended</th>
                        <th>Male</th>
                        <th>Female</th>

                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from demography where Category='lastschoolattended'";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <tr>
                        <td  style=" text-align: center;"><?php echo $row['Content'];?></td>
                        <td style=" text-align: center;"><?php echo $row['MaleCount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['FemaleCount'];?></td>

                        <td style=" text-align: center;"><?php echo $row['TotalCount'];?></td>
                      </tr>
                      <?php endwhile ?>
                      </tbody>
                    </table>
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
              <div class="card-header" style="background-color:#12543b;">
                <h3 class="card-title">Campus</h3>

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
                  <canvas id="stackedBarChart5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
                
                <div class="col-12">
                    <table id="example6" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Campus</th>
                        <th>Male</th>
                        <th>Female</th>

                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from demography where Category='campus'";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <tr>
                        <td  style=" text-align: center;"><?php echo $row['Content'];?></td>
                        <td style=" text-align: center;"><?php echo $row['MaleCount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['FemaleCount'];?></td>

                        <td style=" text-align: center;"><?php echo $row['TotalCount'];?></td>
                      </tr>
                      <?php endwhile ?>
                      </tbody>
                    </table>
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
              <div class="card-header" style="background-color:#12543b;">
                <h3 class="card-title">Feedback</h3>

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
                  <canvas id="stackedBarChart6" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
                <div class="col-12">
                    <table id="example7" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Feedback</th>
                        <th>Male</th>
                        <th>Female</th>

                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT * from demography where Category='feedback'";
                        $res=mysqli_query($con,$query1);
                        while($row=mysqli_fetch_array($res)):
                      ?>
                      <tr>
                        <td  style=" text-align: center;"><?php echo $row['Content'];?></td>
                        <td style=" text-align: center;"><?php echo $row['MaleCount'];?></td>
                        <td style=" text-align: center;"><?php echo $row['FemaleCount'];?></td>

                        <td style=" text-align: center;"><?php echo $row['TotalCount'];?></td>
                      </tr>
                      <?php endwhile ?>
                      </tbody>
                    </table>
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
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
    
    $('#example5').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');
    
    $('#example6').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example6_wrapper .col-md-6:eq(0)');
    
    $('#example7').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example7_wrapper .col-md-6:eq(0)');
    
    $('#example0').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example0_wrapper .col-md-6:eq(0)');
  });
</script>







<script>
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////GENDER
  $(function () {
   
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Male',
          'Female',
      ],
      datasets: [
        {
          data: [<?php 
            $g="SELECT * from student where gender = 'Male'";
            $resg=mysqli_query($con,$g);
            echo $rowg=mysqli_num_rows($resg).", ";

            $g="SELECT * from student where gender = 'Female'";
            $resg=mysqli_query($con,$g);
            echo $rowg=mysqli_num_rows($resg).",";



          ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
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
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////GENDER
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////AGE
    
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData =  {
      labels  : [<?php
      $query1="SELECT * from demography where Category='age' order by Content";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Content']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Male',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='age' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['MaleCount']."',";
          }
          
          ?>'']
        },
        {
          label               : 'Female',
          backgroundColor     : 'rgba(236,105,53,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='age' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['FemaleCount']."',";
          }
          
          ?>'']
        },
        
      ]
     
      
      
    }

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
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////AGE
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////strand
    
    var stackedstrand = $('#stackedBarChart0').get(0).getContext('2d')
    var stackedstrandData =  {
      labels  : [<?php
      $query1="SELECT * from demography where Category='strand' order by Content";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Content']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Male',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='strand' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['MaleCount']."',";
          }
          
          ?>'']
        },
        {
          label               : 'Female',
          backgroundColor     : 'rgba(236,105,53,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='strand' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['FemaleCount']."',";
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

    new Chart(stackedstrand, {
      type: 'bar',
      data: stackedstrandData,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////strand    
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Religion
    
    var stackedreligion = $('#stackedBarChart1').get(0).getContext('2d')
    var stackedreligiontData =  {
      labels  : [<?php
      $query1="SELECT * from demography where Category='religion' order by Content";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Content']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Male',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='religion' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['MaleCount']."',";
          }
          
          ?>'']
        },
        {
          label               : 'Female',
          backgroundColor     : 'rgba(236,105,53,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='religion' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['FemaleCount']."',";
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

    new Chart(stackedreligion, {
      type: 'bar',
      data: stackedreligiontData,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Religion

    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Municipality
    
    var stackedmun = $('#stackedBarChart2').get(0).getContext('2d')
    var stackedmuntData =  {
      labels  : [<?php
      $query1="SELECT * from demography where Category='municipality' order by Content";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Content']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Male',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='municipality' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['MaleCount']."',";
          }
          
          ?>'']
        },
        {
          label               : 'Female',
          backgroundColor     : 'rgba(236,105,53,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='municipality' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['FemaleCount']."',";
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

    new Chart(stackedmun, {
      type: 'bar',
      data: stackedmuntData,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Municipality
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Gurdian
    
    var stackedgur = $('#stackedBarChart3').get(0).getContext('2d')
    var stackedgurtData =  {
      labels  : [<?php
      $query1="SELECT * from demography where Category='relationship' order by Content";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Content']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Male',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='relationship' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['MaleCount']."',";
          }
          
          ?>'']
        },
        {
          label               : 'Female',
          backgroundColor     : 'rgba(236,105,53,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='relationship' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['FemaleCount']."',";
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

    new Chart(stackedgur, {
      type: 'bar',
      data: stackedgurtData,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Guardian
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////School
    
    var school = $('#stackedBarChart4').get(0).getContext('2d')
    var schooldata =  {
      labels  : [<?php
      $query1="SELECT * from demography where Category='lastschoolattended' order by Content";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Content']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Male',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='lastschoolattended' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['MaleCount']."',";
          }
          
          ?>'']
        },
        {
          label               : 'Female',
          backgroundColor     : 'rgba(236,105,53,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='lastschoolattended' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['FemaleCount']."',";
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

    new Chart(school, {
      type: 'bar',
      data: schooldata,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////School
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////campus
    
    var campus = $('#stackedBarChart5').get(0).getContext('2d')
    var campusdata =  {
      labels  : [<?php
      $query1="SELECT * from demography where Category='campus' order by Content";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Content']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Male',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='campus' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['MaleCount']."',";
          }
          
          ?>'']
        },
        {
          label               : 'Female',
          backgroundColor     : 'rgba(236,105,53,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='campus' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['FemaleCount']."',";
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

    new Chart(campus, {
      type: 'bar',
      data: campusdata,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////campus
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////feedback
    
    var feedback = $('#stackedBarChart6').get(0).getContext('2d')
    var feedbackdata =  {
      labels  : [<?php
      $query1="SELECT * from demography where Category='feedback' order by Content";
      $res=mysqli_query($con,$query1);
      while($row=mysqli_fetch_array($res)){
          echo "'".$row['Content']."',";
      }
      
      ?>''],
      datasets: [
        {
          label               : 'Male',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='feedback' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['MaleCount']."',";
          }
          
          ?>'']
        },
        {
          label               : 'Female',
          backgroundColor     : 'rgba(236,105,53,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
          $query1="SELECT * from demography where Category='feedback' order by Content";
          $res=mysqli_query($con,$query1);
          while($row=mysqli_fetch_array($res)){
              echo "'".$row['FemaleCount']."',";
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

    new Chart(feedback, {
      type: 'bar',
      data: feedbackdata,
      options: stackedBarChartOptions1
    })
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Feedback
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
