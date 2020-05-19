<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  if(isset($_REQUEST['submit'])){
    if(($_REQUEST['u_name']=="")||($_REQUEST['u_emailid']=="")||($_REQUEST['u_password']=="")){
      $msg='<div class="alert alert-warning">Please fill All Fields</div>';
    }else{
      $u_name=$_REQUEST['u_name'];
      $u_emailid=$_REQUEST['u_emailid'];
      $u_password=$_REQUEST['u_password'];
      $sql="INSERT INTO userdetails(u_name,u_emailid,u_password) VALUES('$u_name','$u_emailid','$u_password')";
      if($conn->query($sql)== true){
        $_SESSION['msg']='<div class="alert alert-success">User Register Successfully</div>';
        echo '<script>window.location.href="requester.php"</script>';
      }else{
        $msg='<div class="alert alert-danger">Failed to Register User </div>';
      }
    }
  }
  define('title','Requester');
  define('page','requester');
  include_once('includes/header.php');
?>
<!--Start 2nd Column  -->
  <div class="col-md-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Requester</h3>
  <form action="" method="post">
    <div class="form-group">
      <label for="name" class="font-weight-bold">Name</label>
      <input type="text" name="u_name" id="u_name" class="form-control">
    </div>
    <div class="form-group">
      <label for="email" class="font-weight-bold">Email Id</label>
      <input type="text" name="u_emailid" id="u_emailid" class="form-control">
    </div>
    <div class="form-group">
      <label for="password" class="font-weight-bold">Password</label>
      <input type="password" name="u_password" id="u_password" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-danger">Submit</button>
      <a href="requester.php" class="btn btn-secondary">Close</a>
    </div>

  </form>
  </div>
<!--End 2nd Column   -->
<?php include_once('includes/footer.php'); ?>