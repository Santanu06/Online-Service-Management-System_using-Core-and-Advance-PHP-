<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  if(isset($_REQUEST['submit'])){
    if(($_REQUEST['tech_name']=="")||($_REQUEST['tech_city']=="")||($_REQUEST['tech_mobile']=="")||($_REQUEST['tech_emailid']=="")){
      $msg='<div class="alert alert-warning">Please fill All Fields</div>';
    }else{
      $tech_name=$_REQUEST['tech_name'];
      $tech_city=$_REQUEST['tech_city'];
      $tech_mobile=$_REQUEST['tech_mobile'];
      $tech_emailid=$_REQUEST['tech_emailid'];
      $sql="INSERT INTO technician_details(tech_name,tech_city,tech_mobile,tech_emailid) VALUES('$tech_name','$tech_city','$tech_mobile','$tech_emailid')";
      if($conn->query($sql)== true){
        $_SESSION['msg']='<div class="alert alert-success">Technician Register Successfully</div>';
        echo '<script>window.location.href="technician.php"</script>';
      }else{
        $msg='<div class="alert alert-danger">Failed to Register Technician </div>';
      }
    }
  }
  define('title','Tecnician Registration');
  define('page','technician');
  include_once('includes/header.php');
?>
<!--Start 2nd Column  -->
  <div class="col-md-6 mt-5 mx-3 jumbotron">
    <?php if(isset($msg)){ echo $msg;} ?>
    <h3 class="text-center">Add New Technician</h3>
  <form action="" method="post">
    <div class="form-group">
      <label for="name" class="font-weight-bold">Name</label>
      <input type="text" name="tech_name" id="tech_name" class="form-control">
    </div>
    <div class="form-group">
      <label for="city" class="font-weight-bold">City</label>
      <input type="text" name="tech_city" id="tech_city" class="form-control">
    </div>
    <div class="form-group">
      <label for="mobile" class="font-weight-bold">Mobile</label>
      <input type="text" name="tech_mobile" id="tech_mobile" class="form-control">
    </div>
    <div class="form-group">
      <label for="emailid" class="font-weight-bold">Email Id</label>
      <input type="text" name="tech_emailid" id="tech_emailid" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-danger">Submit</button>
      <a href="requester.php" class="btn btn-secondary">Close</a>
    </div>

  </form>
  </div>
<!--End 2nd Column   -->
<?php include_once('includes/footer.php'); ?>