<?php 
	include_once('../dbconnection.php');
	session_start();
	if(isset($_SESSION['login'])){
		header("Location:userprofile.php");
  }else{
    if(isset($_POST['submit'])){
      $uemail= mysqli_real_escape_string($conn, trim($_POST['email']));
      $upassword= mysqli_real_escape_string($conn, trim($_POST['password']));
      $sql="SELECT u_emailid , u_password FROM userdetails WHERE u_emailid='".$uemail."'AND u_password='".$upassword."'";
      $result=$conn->query($sql);
      if($result->num_rows==1){
        $_SESSION['login']=true;
        $_SESSION['email']=$uemail;      
        header("Location:userprofile.php");
      }else{
        $msg='<div class="alert alert-danger text-center">Enter Valid Email and Password</div>';
      }    
    }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Log In</title>
<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
	<div class="mt-5 mb-3 text-center" style="font-size:30px;">
    	<i class="fas fa-wrench"></i>
    	<span>Online Service Maintainace System</span>
    </div>
   <p class="text-center" style="font-size:16px;"><i class="fas fa-user-secret text-danger mx-2"></i>User Area(Demo)</p>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-sm-6 col-md-4">
        	<form action="" method="post" class="shadow-lg p-5">			      
            <?php if(isset($msg)){ echo $msg ;} ?>
              <div class="form-group">
                <i class="fas fa-user"></i><label class="font-weight-bold pl-2" for="Email">Email</label>
                <input type="email" name="email" class="form-control" />
                <small class="form-text">We'll Never share your email with anyone else.</small>
              </div>
              <div classs="form-group">
              	<i class="fas fa-key"></i><label class="font-weight-bold pl-2">Password</label>
                <input type="password" name="password" class="form-control" />
              </div>
              <button class="btn btn-outline-primary mt-4 font-weight-bold btn-block shadow-sm" type="submit" name="submit">Login</button>
            </form>
            <div class="text-center"><a href="../index.php" class="btn btn-primary mt-3 font-weight-bold shadow-sm">Back to Home</a></div>
            
        </div>
      </div>
    </div>
    <!--Javascript-->
    <script src="../js/jquery.min.js"></script>
  	<script src="../js/popper.min.js"></script>
   	<script src="../js/bootstrap.min.js"></script>
   	<script src="../js/all.min.js"></script>
</body>
</html>
