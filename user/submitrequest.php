<?php 
	include_once('../dbconnection.php');
	session_start();
	if(isset($_SESSION['login'])){
		$email=$_SESSION['email'];
	}else{
		echo '<script>location.href="userLogin.php"</script>';
	}
	define('title','Submit Request');
	define('page','submitrequest');
	include_once('includes/header.php');
	
	if(isset($_REQUEST['submitrequest'])){
		if(($_REQUEST['requestinfo']=="")||($_REQUEST['description']=="")||($_REQUEST['name']=="")||($_REQUEST['address1']=="")||($_REQUEST['address2']=="")||($_REQUEST['city']=="")||($_REQUEST['state']=="")||($_REQUEST['pin']=="")||($_REQUEST['email']=="")||($_REQUEST['mobile']=="")||($_REQUEST['date']=="")){
			$em='<div class="alert alert-warning mt-2">All Filed are Required</div>';
		}else{
			$rqstinfo=trim($_REQUEST['requestinfo']);
			$dec=trim($_REQUEST['description']);
			$name=trim($_REQUEST['name']);
			$add1=trim($_REQUEST['address1']);
			$add2=trim($_REQUEST['address2']);
			$city=trim($_REQUEST['city']);
			$state=trim($_REQUEST['state']);
			$pin=trim($_REQUEST['pin']);
			$email=trim($_REQUEST['email']);
			$mobile=trim($_REQUEST['mobile']);
			$date=trim($_REQUEST['date']);
			$sql="INSERT INTO submitrequest(request_info,request_desc,requester_name,requester_add1,requester_add2,requester_city,requester_satate,requester_pin,requester_email,requester_mobile,	request_date)VALUES('$rqstinfo','$dec','$name','$add1','$add2','$city','$state','$pin','$email','$mobile','$date')";
			if($conn->query($sql)==true){
				$generate_id = mysqli_insert_id($conn);
				$sm='<div class="alert alert-success">Request Submited successfully</div>';
				$_SESSION['request_id']=$generate_id;
				echo "<script>location.href='submitrequestsuccess.php'</script>";
			}else{
				$em='<div class="alert alert-danger">Unable to Submit Request</div>';
			}
		}
	}
	
?>
	<!--Start Service Request Form 2nd Column-->
	<div class="col-sm-9 col-md-10 my-5">
   		<?php if(isset($sm)){ echo $sm; } ?>
    	<?php if(isset($em)){ echo $em; } ?>
    	<form action="" method="post">
        	<div class="form-group">
              <label>Request Info</label>
              <input type="text" class="form-control" id="inputrequestinfo" placeholder="Request Info" name="requestinfo" />
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" class="form-control" id="description" placeholder="Write Description" name="description" />
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" />
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="address1">Address Line 1</label>
                <input type="text" class="form-control" name="address1" id="addressone"/>
              </div>
              <div class="form-group col-md-6">
              	<label for="address1">Address Line 2</label>
                <input type="text" class="form-control" name="address2" id="addresstwo"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for='inputcity'>City</label>
                <input type="text" class="form-control" id="inputcity" name="city" />
              </div>
              <div class="form-group col-md-4">
                <label for='inputcity'>State</label>
                <input type="text" class="form-control" id="inputstate" name="state" />
              </div>
              <div class="form-group col-md-2">
                <label for='inputpin'>Pin</label>
                <input type="text" class="form-control" id="inputpin" name="pin" onkeypress="return pinNoValidate(event)" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="Email">Email</label>
                <input type="email" class="form-control" id="inputemail" name="email" />
              </div>
              <div class="form-group col-md-2">
                <label for="inputmobile">Mobile</label>
                <input type="text" class="form-control" id="inputmobile" name="mobile" onkeypress="return mobileNoValidation(event)" />
              </div>
              <div class="form-group col-md-2">
                <label for="inputdate">Date</label>
                <input type="date" class="form-control" id="inputdate" name="date" />
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submitrequest">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            
        </form>
    </div>
    <!--End Service Request Form 2nd Column-->
    
    <!--Form Validation Start-->
    <script>
    	function pinNoValidate(key)
		{
		  var asccicode=key.keyCode;
		  if(!(asccicode==8 || asccicode==127) && (asccicode<48 || asccicode>57)){
			return false;
		  }else{
			return true;
		  }
		}
		function mobileNoValidation(key)
		{
		  var asccicode=key.keyCode;
		  if(!(asccicode==8 || asccicode==127) && (asccicode<48 || asccicode>57)){
			return false;
		  }else{
			return true;
		  }
		}
    </script>
    <!--Form Validation Start-->
    

<?php 
	include_once('includes/footer.php');
?>