<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  
  define('title','Change Password');
  define('page','changepassword');
  include_once('includes/header.php');
?>
<?php 
$email=$_SESSION['admin_email'];
	if(isset($_REQUEST['passwordUpdate'])){
		if($_REQUEST['aPassword'] == ""){
			$em= "<div class='alert alert-warning '>Please Fill All Field</div>";
		}else{
			$apassword=$_REQUEST['aPassword'];
			$sql="UPDATE admin_details SET admin_password='$apassword' WHERE admin_email='$email'";
			if($conn->query($sql) == true){
				$msg= '<div class="alert alert-success">Password Successfully Changed</div>';
			}else{
				$msg= '<div class="alert alert-danger">Password Failed to Change</div>';
			}
		}
	}
	
?>
	<div class="col-sm-6 col-md-6"> <!--Start user change password form 2nd column-->
	
		<form action="" method="post" class="mt-5 mx-5">
			<?php if(isset($msg)){ echo $msg ; } ?>
			<div class="form-group">
				<label for="emailid">Email</label>
				<input type="email" class="form-control" id="emailId" value="<?php echo $email; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="aPassword" placeholder="Enter New Password">
			</div>
			<button type="submit" class="btn btn-danger" name="passwordUpdate">Update</button>
			<button type="reset" class="btn btn-secondary">Reset</button>
		</form>
	</div><!--End user change password form 2nd column-->

<?php include_once('includes/footer.php') ?>