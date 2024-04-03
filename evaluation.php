<?php
session_start();
$con = mysqli_connect("localhost", "u766365105_user", "@Gemson21", "u766365105_thesi");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

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
            <h2 class="" style="font-weight:bold;">Content Settings</h2>
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

// Function to tokenize a sentence
function tokenize($sentence)
{
    // Use a simple whitespace tokenizer
    return explode(' ', strtolower($sentence));
}

// Function to calculate term frequencies for a document
function calculateTermFrequency($tokens)
{
    $termFrequency = [];

    foreach ($tokens as $token) {
        if (!isset($termFrequency[$token])) {
            $termFrequency[$token] = 1;
        } else {
            $termFrequency[$token]++;
        }
    }

    // Normalize term frequencies
    $totalTokens = count($tokens);
    foreach ($termFrequency as &$count) {
        $count /= $totalTokens;
    }

    return $termFrequency;
}

// Function to calculate inverse document frequencies
function calculateInverseDocumentFrequency($documents)
{
    $documentFrequency = [];

    foreach ($documents as $document) {
        foreach (array_unique($document) as $term) {
            if (!isset($documentFrequency[$term])) {
                $documentFrequency[$term] = 1;
            } else {
                $documentFrequency[$term]++;
            }
        }
    }

    $totalDocuments = count($documents);
    $inverseDocumentFrequency = [];

    foreach ($documentFrequency as $term => $count) {
        $inverseDocumentFrequency[$term] = log($totalDocuments / $count, 2);
    }

    return $inverseDocumentFrequency;
}

// Function to calculate TF-IDF scores for a document
function calculateTfIdf($termFrequency, $inverseDocumentFrequency)
{
    $tfIdf = [];
    
    foreach ($termFrequency as $term => $tf) {
        $tfIdf[$term] = $tf * $inverseDocumentFrequency[$term];
    }

    return $tfIdf;
}









if (isset($_POST['calculate'])) {

$calculatesql="SELECT * from catstrand";    
$calculateres=mysqli_query($con,$calculatesql);
    while($crow=mysqli_fetch_array($calculateres)){
        
        $tsql="SELECT * from choices";
        $tres=mysqli_query($con,$tsql);
        while($trow=mysqli_fetch_array($tres)){
            
        

    
        // Two example sentences
        $sentence1 = $crow['content'];
        $sentence2 = $trow['choice'];
        
        // Tokenize sentences
        $tokens1 = tokenize($sentence1);
        $tokens2 = tokenize($sentence2);
        
        // Calculate term frequencies for each sentence
        $termFrequency1 = calculateTermFrequency($tokens1);
        $termFrequency2 = calculateTermFrequency($tokens2);
        
        // Create a document matrix
        $documents = [$tokens1, $tokens2];
        
        // Calculate inverse document frequencies
        $inverseDocumentFrequency = calculateInverseDocumentFrequency($documents);
        
        // Calculate TF-IDF scores for each sentence
        $tfIdf1 = calculateTfIdf($termFrequency1, $inverseDocumentFrequency);
        $tfIdf2 = calculateTfIdf($termFrequency2, $inverseDocumentFrequency);
        
        // Display TF-IDF scores
        //echo "TF-IDF Scores for Sentence 1:\n";
        //print_r($tfIdf1);
        
        //echo "\nTF-IDF Scores for Sentence 2:\n";
        //print_r($tfIdf2);
        $totalTfIdf2 = number_format(array_sum($tfIdf2), 2);
        
        $s2="UPDATE choices SET " .$crow['strand']. " = ". $totalTfIdf2 ." WHERE ID = ". $trow['ID'];
        $r2=mysqli_query($con,$s2);
        }
    }
}elseif (isset($_POST['updatecontent'])) {
    if (isset($_GET['ccriteria'])) {
    $updatedValue = preg_replace('/\s+/', ' ', $_POST['updatedValue']);
    $sqlupdate = "UPDATE catstrand SET content = '". $updatedValue ."' WHERE strand = '". $_GET['ccriteria']. "'";
    $rupdate=mysqli_query($con,$sqlupdate);
    
    }
}
?>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                  <h3>Content per Strand <?php echo " (".$_GET['ccriteria'].")"; ?></h3>
                  <p style="font-style:italic;">Select Strand and add or remove the correspoding words in the content</p>
                <form method="GET" action="">
                <div class="form-group ">
                    <select class="custom-select form-control-border border-width-2" id="ccriteria" onchange="this.form.submit()" name="ccriteria" >
                    <option></option>
                    
                    <?php 
                    $sql="SELECT * from catstrand";
                    $res=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($res)):
                    ?>
                    
                    <option value="<?php echo $row['strand']; ?>"><?php echo $row['strandname']; ?></option>
                    <?php endwhile ?>
                    
                  </select><br>
                  
                </div>
                </form>
                
                <form  method="POST">
                 
                  <div class="form-group">
                        <textarea id="textArea" class="form-control" rows="10" cols="50"  name="updatedValue" style="margin:0;">
                            <?php 
                                 if (isset($_GET['ccriteria'])) {
                                    $selectedOption = $_GET['ccriteria'];
                                  
                                    $sql2="SELECT * from catstrand where strand = '". $selectedOption ."'";
                                    
                                    $res2=mysqli_query($con,$sql2);
                                    $row2=mysqli_fetch_array($res2);
                                    echo $row2['content'];
                               
                                 } 
                            ?>
                        
                        </textarea>
                </div>
                <button type="submit" class="btn btn-glass scrollto" style="background-color: #12543b; color: #ffffff;" name="updatecontent" > Update Content</button>
                <button type="submit" class="btn btn-glass scrollto" style="background-color: #12543b; color: #ffffff;" name="calculate"> Generate Term Score</button>
                <hr>
                </form>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
      <!-- /.container-fluid -->
        </section>
                 

        <section class="content">
          <div class="container-fluid">
                    
                  
              <h3>TF-IDF Weighted Score per Strand </h3> 
              <p style="font-style:italic;">a term with closest to zero weighted score is likely to be a common element, and its significance to the overall content</p>

            <div class="row">
              <div class="col-12">

                    <table id="example1" class="table table-bordered table-striped">
                      <thead>

                      <tr>
                         
                        <th>ID</th>
                        <th>Term</th>
                        <?php  
                        $query12="Describe choices";
                        $res12=mysqli_query($con,$query12);
                        while($row12=mysqli_fetch_array($res12)):
                        ?>
                            
                            <?php 
                                if($row12['Type']=="double"){
                                echo "<th>".$row12['Field']."</th>";
                                    
                                }
                            
                            
                            ?>
                        <?php endwhile ?>
                      </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $query1="SELECT *  from choices";
                        $res=mysqli_query($con,$query1);
                        while($row4=mysqli_fetch_array($res)):
                        ?>

                      <tr>
                        <?php 
                        $sqlcountstrand="select * from catstrand";
                        $rescountstrand=mysqli_query($con,$sqlcountstrand);
                        $countstrand=mysqli_num_rows($rescountstrand)+3;
                        $loop1=1;
                        while($loop1<=$countstrand):
                        ?>
                        
                        <?php 
                        if($loop1!=3){
                        echo "<td>".$row4[$loop1]."</td>";
                        }
                        ?>
                       
                        <?php
                        $loop1=$loop1+1;
                        endwhile ?>
                        
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
