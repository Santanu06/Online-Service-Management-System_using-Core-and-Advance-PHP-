 <?php 
 	include_once("dbconnection.php");
	if(isset($_POST['uSignUp'])){
	  //checking for empty fileds
	  if(($_POST['uName']=="")||($_POST['uEmail']=="")||($_POST['uPassword']=="")){
	  	$em='<div class="alert alert-warning mt-2" role="alert">All Fields are Required</div>';
	  }else{
	  	//Email already Registered
	  	$sql="SELECT u_emailid FROM userdetails WHERE u_emailid='".$_POST['uEmail']."'";
	  	$result=$conn->query($sql);
		if($result->num_rows==1){
			$em='<div class="alert alert-danger mt-2">Emailid Already Registered</div>';
		}else{
			//Assigning User Value to Variables
			$uName=$_POST['uName'];
			$uEmail=$_POST['uEmail'];
			$uPassword =$_POST['uPassword'];
			$sql="INSERT INTO userdetails(u_name,u_emailid,u_password)VALUES('$uName','$uEmail','$uPassword')";
			if($conn->query($sql)==true){
			  $sm='<div class="alert alert-success mt-2">Account Successfully Created</div>';	
			}else{
			  $em='<div class="alert alert-danger mt-2">Failed to Create Account</div>';
			}
		}
	  }
	}
 ?>
 <!--Start Registration Form container-->
  <div class="container pt-5" id="registration">
  <h2 class="text-center">Create An Account</h2>
  <div class="row mt-4 mb-4">
  	<div class="col-md-6 offset-md-3">
    	<form action="" method="post" class="shadow-lg p-4" >
			<!--show message while sign up is clicked-->
			<?php 
				if(isset($em)){
					echo $em;
				}
			?>
            <?php 
				if(isset($sm)){
					echo $sm;
				}
			?>
        	<div class="form-group">
             <i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Name</label>
             <input type="text" class="form-control" placeholder="Enter Name" name="uName">
            </div>
            <div class="form-group">
             <i class="fas fa-envelope"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" name="uEmail" placeholder="Enter Email Id"><small class="form-text">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <i class="fas fa-key"></i> <label for="password" class="font-weight-bold pl-2">Password</label><input type="password" name="uPassword" placeholder="Enter Password" class="form-control">
            </div>
            <button type="Submit" class="btn btn-primary mt-5 btn-block shadow-sm font-weight-bold" name="uSignUp" >Sign Up</button>
            <em style="font-size:12px;">Note : By Clicking sign Up , you agree with our Terms , Data Policy and Cookie Policy</em>
        </form>
    </div>
  </div>
  </div>
  <!--End Registration Form container-->