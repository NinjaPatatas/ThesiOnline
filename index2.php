
<?php
// Initialize the session
session_start();

// Unset all session variables
$_SESSION['login_user']="";
// Destroy the session
session_destroy();
?>
<!doctype html>

<html lang="en">
  <head>
  	<title>THESI || Login</title>
    <meta charset="utf-8">
    <link href="images/ico.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ?>
	<?php
	session_start();
	$con = mysqli_connect("localhost", "u766365105_user", "@Gemson21", "u766365105_thesi");
// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	  
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$uname=$_POST['username'];
		$pword=$_POST['password'];

		$sql="SELECT * from userid where username='$uname' and password='$pword' and status='active'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		$count=mysqli_num_rows($result);
		
		if($count==1){
			$_SESSION['login_user']=$uname;
			$_SESSION['userid']=$row['userid'];
			$_SESSION['campus']=$row['campus'];
			if($row['role']=='admin'){
				header("Location: admin/index.php"); 
			}else{
			    $_SESSION['login_user']=$uname;
			    $currentDate = date("Y-m-d");
			    $currentTime = date("H:i:s");
			    $sqlaudit="INSERT INTO audittrail (UserName,ActionTaken,LoggedDate,LoggedTime)values('".$uname."','LoggedIn','".$currentDate."', '".$currentTime."')";
			    $resaudit=mysqli_query($con,$sqlaudit);
				header("Location: registrar/index.php"); 
			}
        exit();
		}else{
			$error="Your Username or Password is Invalid or account is Inactive";
		}
	}
	?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<img src="images/logo1.png" alt="" class="img-fluid">
					<p style="color:#4eb58b;">CSTC, Inc. - Pre-Registration and Strand Recommendation System</p></a>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>

			      	</div>
							<form action="" method="POST" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" class="form-control" placeholder="Username" name="username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" name="password" required>
		            </div>
		            <?php 
            if(isset($error)){
                echo $error;
            } ?>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" value='click here'>Sign In</button><br><br>
		            	<a href="../index.php" class="form-control btn btn-secondary rounded submit px-3">Back</a>
		            </div>
		            <div class="form-group d-md-flex">
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
<script>
        function goBack() {
            window.history.back();
        }
    </script>

	</body>
</html>


    