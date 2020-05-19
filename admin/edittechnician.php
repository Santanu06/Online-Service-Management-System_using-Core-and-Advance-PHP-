<?php 
include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  define('title','Update Technician');
  define('page','technician');
  include_once('includes/header.php');
  if(isset($_REQUEST['update'])){
    if(($_REQUEST['tech_id'] == "")||($_REQUEST['tech_name'] == "")||($_REQUEST['tech_city'] == "")||($_REQUEST['tech_mobile'] == "")||($_REQUEST['tech_emailid'] == "")){
      $msg='<div class="alert alert-warning">Please fill All Fields</div>';
    }else{
      $tech_id=$_REQUEST['tech_id'];
      $tech_name=$_REQUEST['tech_name'];
      $tech_city=$_REQUEST['tech_city'];
      $tech_mobile=$_REQUEST['tech_mobile'];
      $tech_emailid=$_REQUEST['tech_emailid'];
      $sql="UPDATE technician_details SET tech_name='$tech_name',tech_city='$tech_city',tech_mobile='$tech_mobile',tech_emailid='$tech_emailid' WHERE tech_id='$tech_id'";
      if($conn->query($sql) == true){
        $_SESSION['msg']='<div class="alert alert-success">Technician Details Updated Successfully</div>';
      }else{
        $_SESSION['msg']='<div class="alert alert-danger">Failed to Update Technician Details</div>';
      }
      header('Location:technician.php');
    }
  }
?>
  <!--Start 2nd Column  -->
  <div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Technician Deatails</h3>
    <?php 
      if(isset($_REQUEST['edit'])){
      $sql="SELECT * FROM technician_details WHERE tech_id={$_REQUEST['tech_id']}";
      $result=$conn->query($sql);
      $row=$result->fetch_assoc();
      }
    ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="techid" class="font-weight-bold">Tech Id</label>
        <input type="text" name="tech_id" class="form-control" id="tech_id" value="<?php if(isset($row['tech_id'])){ echo $row['tech_id'];} ?>" readonly>
      </div>
      <div class="form-group">
      <label for="name" class="font-weight-bold">Name</label>
      <input type="text" name="tech_name" id="tech_name" class="form-control" value="<?php if(isset($row['tech_name'])){ echo $row['tech_name'];} ?>">
    </div>
    <div class="form-group">
      <label for="city" class="font-weight-bold">City</label>
      <input type="text" name="tech_city" id="tech_city" class="form-control" value="<?php if(isset($row['tech_city'])){ echo $row['tech_city'];} ?>">
    </div>
    <div class="form-group">
      <label for="mobile" class="font-weight-bold">Mobile</label>
      <input type="text" name="tech_mobile" id="tech_mobile" class="form-control" value="<?php if(isset($row['tech_mobile'])){ echo $row['tech_mobile'];} ?>">
    </div>
    <div class="form-group">
      <label for="emailid" class="font-weight-bold">Email Id</label>
      <input type="text" name="tech_emailid" id="tech_emailid" class="form-control" value="<?php if(isset($row['tech_emailid'])){ echo $row['tech_emailid'];} ?>">
    </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-danger" name="update">Upadate</button>
        <a href="technician.php" class="btn btn-secondary">Close</a>
      </div>
    </form>     
  </div>
 
  <!--End 2nd Column   -->
<?php include_once('includes/footer.php') ?>