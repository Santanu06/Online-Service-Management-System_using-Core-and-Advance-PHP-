<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    header('location:dashboard.php');
  }else{
    if(isset($_REQUEST['submit'])){
      $a_email=mysqli_real_escape_string($conn,trim($_REQUEST['email']));
      $a_password=mysqli_real_escape_string($conn,trim($_REQUEST['password']));
      $sql="SELECT admin_email,admin_password FROM admin_details WHERE  admin_email='".$a_email."' AND admin_password='".$a_password."'";
      $result=$conn->query($sql);
      if($result->num_rows == 1){
        $_SESSION['admin_login']=true;
        $_SESSION['admin_email']= $a_email;
        echo '<script>location.href="dashboard.php"</script>';
      }else{
        $em='<div class="alert alert-danger">Enter Valid Email Id and Password</div>';
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
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
   <p class="text-center" style="font-size:16px;"><i class="fas fa-user-secret text-danger mx-2"></i>Admin Area(Demo)</p>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-sm-6 col-md-4">
        	<form action="" method="post" class="shadow-lg p-5">
			<?php if(isset($em)){ echo $em; }?>
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