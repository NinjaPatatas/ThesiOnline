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
  <style>
      .back-to-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  right: 15px;
  bottom: 15px;
  z-index: 996;
  background: #23c890;
  width: 40px;
  height: 40px;
  border-radius: 50px;
  transition: all 0.4s;
}

.back-to-top i {
  font-size: 18px;
  color: #fff;
  line-height: 0;
}

.back-to-top:hover {
  background: #2990ff;
  color: #fff;
}

.back-to-top.active {
  visibility: visible;
  opacity: 1;
}
      
  </style>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php
if (isset($_POST['btnnewcriteria'])){
    $txtnewcriteria=$_POST['ncriteria'];
    if($txtnewcriteria){
        $sqladdnew="INSERT into questioncat (category) values ('".$txtnewcriteria."')";
        $resaddnew=mysqli_query($con,$sqladdnew);
        header("Refresh:0");
        echo "<script type='text/javascript'>alert('New Criteria: '".$txtnewcriteria." is added to the system')</script>";

    }else{
        echo "<script type='text/javascript'>alert('Invalid Input')</script>";
    }
    
    
}





$sqlcriteria1="SELECT * from questioncat";
$rescriteria1=mysqli_query($con,$sqlcriteria1);
while($rowcriteria1=mysqli_fetch_array($rescriteria1)){
    $num1=$rowcriteria1['id'];
    if(isset($_POST['newq'.$num1])){
        $txtnewquestion=$_POST['txtnew'.$num1];
        if($txtnewquestion){
            $sqladdnew="INSERT into questionbank (questiontext,catid) values ('".$txtnewquestion."',".$rowcriteria1['id'].")";
            $resaddnew=mysqli_query($con,$sqladdnew);
            
            header("Refresh:0");
            echo "<script type='text/javascript'>alert('New Quetion is added to the system')</script>";
        }else{
           echo "<script type='text/javascript'>alert('Invalid Input')</script>";
        }
        
        
    }
    
     if(isset($_POST['btnremovec'.$num1])){
        
        echo "<script>
            var result3 = confirm('All Questions and options corresponding to this criteria will be deleted. Are you sure you want to delete this criteria ?');

            if (result3) {
                window.location.href = 'evalsetting.php?mainremove=' + encodeURIComponent(".$num1.");
            } else {
                window.location.href = 'evalsetting.php'
            }
          </script>";
          
          

    }
    
    if(isset($_GET['mainremove'])) {
        $cID=$_GET['mainremove'];
        $sqlremovec2="DELETE from questioncat where ID=".$cID;
        $resremovec2=mysqli_query($con,$sqlremovec2);


        
        echo "<script type='text/javascript'>alert('Criteria Removed Sucessfully')</script>";
        header('Location: https://thesi.online/Login/admin/evalsetting.php');
    }
}


$sqlque1="SELECT * from questionbank";
$resque1=mysqli_query($con,$sqlque1);
while($rowque1=mysqli_fetch_array($resque1)){
    $num2=$rowque1['questionid'];
    if(isset($_POST['btnupdateq'.$num2])){
        $txt=$_POST['Q'.$num2];
        
        if($txt){
             $sqlupdate = "UPDATE questionbank SET questiontext = '". $txt ."' WHERE questionid = '". $num2. "'";
             $resupdate = mysqli_query($con,$sqlupdate);
        }else{
            echo "<script type='text/javascript'>alert('Invalid Input')</script>";
        }
        
        
    }
    
    if(isset($_POST['btnremoveq'.$num2])){
        
        echo "<script>
            var result = confirm('Are you sure you want to delete this question ?');

            if (result) {
                window.location.href = 'evalsetting.php?resremove=' + encodeURIComponent(".$num2.");
            } else {
                window.location.href = 'evalsetting.php'
            }
          </script>";
          
          

    }
    
    if(isset($_GET['resremove'])) {
        $qID=$_GET['resremove'];
        $sqlremoveo="DELETE from choices where questionid=".$qID;
        $resremoveo=mysqli_query($con,$sqlremoveo);
        $sqlremoveq="DELETE from questionbank where questionid=".$qID;
        $resremoveq=mysqli_query($con,$sqlremoveq);

        
        echo "<script type='text/javascript'>alert('Question Removed Sucessfully')</script>";
        header('Location: https://thesi.online/Login/admin/evalsetting.php');
    }
    
    
    if(isset($_POST['newo'.$num2])){
        $txtoption=$_POST['newoption'.$num2];
        $txtrecommend=$_POST['newrel'.$num2];
        if($txtoption){
             $sqladdoption = "INSERT into choices (questionid,choice,recommend) values ('".$num2."','".$txtoption."','".$txtrecommend."')";
             $resaddoption = mysqli_query($con,$sqladdoption);
             
             echo "<script type='text/javascript'>alert('New Option Registered Sucessfully')</script>";
        }else{
            echo "<script type='text/javascript'>alert('Invalid Input')</script>";
        }
        
        
    }
    
}





$sqloption="SELECT * from choices";
$resoption=mysqli_query($con,$sqloption);
while($rowoption=mysqli_fetch_array($resoption)){
    $num3=$rowoption['ID'];
    if(isset($_POST['optupdate'.$num3])){
        $txtoption1=$_POST['O'.$num3];
        $old1=$rowoption['choice'];
        if($txtoption1){
            if($txtoption1==$old1){
                
            }else{
                 $sqlupdateo = "UPDATE choices SET choice = '". $txtoption1 ."' WHERE ID = '". $num3. "'";
                 $resupdateo = mysqli_query($con,$sqlupdateo);
                
                //header("Refresh:0");
                echo "<script type='text/javascript'>alert('Option changed ".$old1." to ".$txtoption1."')</script>";
            }
            
        }else{
           echo "<script type='text/javascript'>alert('Invalid Input')</script>";
        }
        
        $txtreco1=$_POST['R'.$num3];
        $old2=$rowoption['recommend'];
        if($txtreco1){
            if($txtreco1==$old2){
            }else{
            $sqlupdater1 = "UPDATE choices SET recommend = '". $txtreco1 ."' WHERE ID = '". $num3. "'";
             $resupdater1 = mysqli_query($con,$sqlupdater1);
            
           // header("Refresh:0");
            }
             
        }
        
    }
    
    
    if(isset($_POST['optremove'.$num3])){
        
        echo "<script>
            var result2 = confirm('Are you sure you want to delete this option ?');

            if (result2) {
                window.location.href = 'evalsetting.php?optremoveoption=' + encodeURIComponent(".$num3.");
            } else {
                window.location.href = 'evalsetting.php'
            }
          </script>";
          
          

    }
    
    if(isset($_GET['optremoveoption'])) {
        $oID=$_GET['optremoveoption'];
        $sqlremoveo2="DELETE from choices where ID=".$oID;
        $resremoveo2=mysqli_query($con,$sqlremoveo2);


        
        echo "<script type='text/javascript'>alert('Option Removed Sucessfully')</script>";
        header('Location: https://thesi.online/Login/admin/evalsetting.php');
    }
}



?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #ffffff !Important;">

      <div class="col-sm-12">
            <h2 class="" style="font-weight:bold;">Modify Questionnaire</h2>
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

<div class="content-wrapper " >
    <br>

      <div class="col-sm-12">
            <h5 class="" style="font-weight:bold;">Criteria</h5>
            <?php 
            $sqlnav="select * from questioncat";
            $resnav=mysqli_query($con,$sqlnav);
            while($rownav=mysqli_fetch_array($resnav)):
            ?>
            <a style="background-color: #12543b !Important; margin:2px;" class="btn btn-success" href=<?php echo "'#creteria".$rownav['id']."'";?>> <?php echo $rownav['category']?> </a>
            <?php endwhile ?>
          </div>

    
    <br>
    <!-- Main content -->
    <section class="content">

    <form action="#" class="signin-form" method="post">

        <div class="card card-primary">
              <div class="card-header" style="background-color: #12543b !Important;">
                <h3 class="card-title">New Criteria</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-12">
                    <label for="ncriteria">Enter New Criteria</label>
                    <input type="text" class="form-control form-control-border border-width-2" id="ncriteria" placeholder="New Criteria" name="ncriteria">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-12">
                    <button type="submit" class="btn btn-block btn-success col-3" style="background-color: #12543b !Important;" id="btnnewcriteria" name="btnnewcriteria">Add new Criteria</button>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
        </div>
        <?php 
        $sqlcriteria="SELECT * from questioncat";
        $rescriteria=mysqli_query($con,$sqlcriteria);
        while($rowcriteria=mysqli_fetch_array($rescriteria)):
        ?>
        <div class="card card-primary" id=<?php echo "'creteria".$rowcriteria['id']."'" ?>>
              <div class="card-header" style="background-color: #125442 !Important;">
                <h3 class="card-title">Criteria: <?php echo $rowcriteria['category']; ?></h3>
              </div>
              
              <div class="card-body">
                <div class="row">
                    
                    <div class="container-fluid">
                        <input style="background-color: rgba(255, 255, 255, 0.5);" class="form-control form-control-border border-width-2 col-12" type="text" id=<?php echo "'txtnew". $rowcriteria['id']."'"?> placeholder=<?php echo "'type new question for ". $rowcriteria['category'] ."'"?> name=<?php echo "'txtnew". $rowcriteria['id']."'"?>><br>
                        <div class="col-sm-12">
                        <button type="submit" class="btn btn-glass scrollto btn-success" style="background-color: #12543b !Important;" name=<?php echo "'newq". $rowcriteria['id'] ."'"?>>Add new question</button>
                        </div>
                        
                <hr>
                    </div>

                </div>
              </div>
              
              <?php 
              $sqlquestion="Select * from questionbank where catid =".$rowcriteria['id'];
              $resquestion=mysqli_query($con,$sqlquestion);
              while($rowquestion=mysqli_fetch_array($resquestion)):
              ?>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="row">
                    <div class="form-group col-12" >
                            <label for=<?php echo "'Q". $rowquestion['questionid'] ."'"?>>Question for <?php echo $rowcriteria['category'] ?></label>
                            <input class="form-control form-control-border border-width-2" type="text" id=<?php echo "'Q". $rowquestion['questionid'] ."'"?> value="<?php echo $rowquestion['questiontext'];?>" name=<?php echo "'Q". $rowquestion['questionid'] ."'"?>>
                    </div>
                    <div class="container-fluid">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-glass scrollto btn-success" style="background-color: #12543b !Important;" name=<?php echo "'btnupdateq". $rowquestion['questionid'] ."'"?>>update this question</button>
                            <button type="submit" class="btn btn-glass scrollto btn-success" style="background-color: #641a1c !Important;" name=<?php echo "'btnremoveq". $rowquestion['questionid'] ."'"?>>remove this question</button>
                        </div>
                        <br>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-12">
                        
                        <table id=<?php echo "'example". $rowquestion['questionid'] ."'"?> class="table table-bordered table-striped">
                            <caption><em>*change the text before clicking the update button.</em></caption>
                            <thead>
                              <tr >
                                <th>Option</th>
                                <th>Relevance</th>
                                <th></th>
                              </tr>
                              </thead>
                              
                              <tbody >
                                  <?php 
                                        $sqloption = "Select * from choices where questionid=". $rowquestion["questionid"];
                                        $resoption = mysqli_query($con,$sqloption);
                                        while($rowoption=mysqli_fetch_array($resoption)):
                                      ?>
                                  <tr>
                                    <td>
                                        <p style="display: none;"><?php echo $rowoption['choice'];?></p>
                                        <input style="background-color: rgba(255, 255, 255, 0); !important " class="form-control form-control-border border-width-2" type="text" id=<?php echo "'O". $rowoption['ID'] ."'"?> value="<?php echo $rowoption['choice'];?>" name=<?php echo "'O". $rowoption['ID'] ."'"?>></td>
                                    <td><input style="background-color: rgba(255, 255, 255, 0);  !important "  class="form-control form-control-border border-width-2" type="text" id=<?php echo "'R". $rowoption['ID'] ."'"?> value="<?php echo $rowoption['recommend'];?>" name=<?php echo "'R". $rowoption['ID'] ."'"?></td>
                                    <td>
                                        <p style="display: none;"><?php echo $rowoption['recommend'];?></p>
                                        <button type="submit" class="btn btn-glass scrollto btn-success" style="background-color: #12543b !Important;" name=<?php echo "'optupdate". $rowoption['ID'] ."'"?>>update</button>
                                        <button type="submit" class="btn btn-glass scrollto btn-success" style="background-color: #641a1c !Important;" name=<?php echo "'optremove". $rowoption['ID'] ."'"?>>remove</button>
                                    </td>
                                  </tr>
                                  <?php endwhile ?>
                                </tbody>
                        </table>
                        <div class="row">
                    
                            <div class="container-fluid">
                                <input style="background-color: rgba(255, 255, 255, 0.5);" class="form-control form-control-border border-width-2 col-12" type="text" id=<?php echo "'newoption". $rowquestion['questionid']."'"?> placeholder=<?php echo "'type new option for ". $rowquestion['questiontext'] ."'"?> name=<?php echo "'newoption". $rowquestion['questionid']."'"?>><br>
                                <input style="background-color: rgba(255, 255, 255, 0.5);" class="form-control form-control-border border-width-2 col-12" type="text" id=<?php echo "'newrel". $rowquestion['questionid']."'"?> placeholder="enter relevance of this option" name=<?php echo "'newrel". $rowquestion['questionid']."'"?>><br>
                                
                                <div class="col-sm-12">
                                <button type="submit" class="btn btn-glass scrollto btn-success" style="background-color: #12543b !Important;" name=<?php echo "'newo". $rowquestion['questionid'] ."'"?>>Add new option</button>
                                </div>
                                
                            <hr>
                            </div>

                        </div>
                        
                        
                        
                    </div>
                </div>
              </div>
              <?php endwhile ?>
              <hr>
              <br>
              <button type="submit" class="btn btn-glass scrollto btn-success" style="background-color: #641a1c !Important;" name=<?php echo "'btnremovec". $rowcriteria['id'] ."'"?>>Delete Criteria : <?php echo $rowcriteria['category'];?> </button>
              <!-- /.card-body -->
        </div>
        <br>
        <hr>
        <?php endwhile ?>
        
        </form>
         </section>
        
        
      </div>






</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="fas fa-arrow-up"></i></a>
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
   
   <?php 
   $sqlscript="SELECT * from questionbank";
   $resscript=mysqli_query($con,$sqlscript);
   while($rowscript=mysqli_fetch_array($resscript)):
   ?>
    $(<?php echo "'#example". $rowscript['questionid'] ."'"?>).DataTable({"paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    <?php endwhile ?>
    
  });
</script>

</body>
</html>
