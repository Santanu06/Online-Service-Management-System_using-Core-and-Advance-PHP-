<?php 
	include_once('../dbconnection.php');
	session_start();
	if(isset($_SESSION['login'])){
		$email=$_SESSION['email'];
	}else{
		echo '<script>location.href="userLogin.php"</script>';
	}
	$sql="SELECT u_emailid , u_name FROM userdetails WHERE u_emailid='".$email."'";
	$result=$conn->query($sql);
	if($result->num_rows==1){
		$row=$result->fetch_assoc();
		$uName=$row['u_name'];
	}
	if(isset($_REQUEST['update'])){
		if(trim($_REQUEST['uName']=="")){
			$em='<div class="alert alert-warning">Please Fill Name</div>';
		}else{
			$uName=$_REQUEST['uName'];
			$sql="UPDATE userdetails SET u_name='$uName' WHERE u_emailid='$email'";
			if($conn->query($sql)==true){
				$sm='<div class="alert alert-success">Name Updated Successfully</div>';
			}else{
				$em='<div class="alert alert-danger">Unable to Update Name</div>';
			}
		}
	}
?>
        <?php 
					define('title','User Profile');
					define('page','userprofile');
          include_once('includes/header.php'); ?>
        <div class="col-sm-6 py-5"> <!--Profile Area start-->
          <form action="" method="post" class="mx-5" >
          	<?php if(isset($em)){ echo $em; } ?>
            <?php if(isset($sm)){ echo $sm; } ?>
            <div class="form-group">
              <label for="inputemail">Email</label><input type="email" name="uEmail" id="uEmail" class="form-control" readonly value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
              <label for="uName">Name</label><input type="text" name="uName" id="uName" class="form-control" value="<?php echo $uName; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
          </form>
        </div> <!--Profile Area End-->

  <?php include_once('includes/footer.php'); ?>


