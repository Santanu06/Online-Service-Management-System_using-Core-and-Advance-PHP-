<?php 
include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  define('title','Update User');
  define('page','requester');
  include_once('includes/header.php');
  if(isset($_REQUEST['update'])){
    if(($_REQUEST['user_id'] == "")||($_REQUEST['user_name'] == "")||($_REQUEST['user_email'] == "")){
      $msg='<div class="alert alert-warning">Please fill All Fields</div>';
    }else{
      $user_id=$_REQUEST['user_id'];
      $user_name=$_REQUEST['user_name'];
      $usser_email=$_REQUEST['user_email'];
      $sql="UPDATE userdetails SET u_name='$user_name',u_emailid='$usser_email' WHERE u_id='$user_id'";
      if($conn->query($sql) == true){
        $_SESSION['msg']='<div class="alert alert-success">User Details Updated Successfully</div>';
      }else{
        $_SESSION['msg']='<div class="alert alert-danger">Failed to Update User Details</div>';
      }
      header('Location:requester.php');
    }
  }
?>
  <!--Start 2nd Column  -->
  <div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update User Deatails</h3>
    <?php 
      if(isset($_REQUEST['edit'])){
      $sql="SELECT * FROM userdetails WHERE u_id={$_REQUEST['userid']}";
      $result=$conn->query($sql);
      $row=$result->fetch_assoc();
      }
    ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="userid" class="font-weight-bold">User Id</label>
        <input type="text" name="user_id" class="form-control" id="user_id" value="<?php if(isset($row['u_id'])){ echo $row['u_id'];} ?>" readonly>
      </div>
      <div class="form-group">
        <label for="name" class="font-weight-bold">User Name</label>
        <input type="text" name="user_name" class="form-control" id="user_name" value="<?php if(isset($row['u_name'])){ echo $row['u_name'];} ?>">
      </div>
      <div class="form-group">
        <label for="email" class="font-weight-bold">Email Id</label>
        <input type="text" name="user_email" class="form-control" id="user_email" value="<?php if(isset($row['u_emailid'])){ echo $row['u_emailid'];} ?>">
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-danger" name="update">Upadate</button>
        <a href="requester.php" class="btn btn-secondary">Close</a>
      </div>
    </form>     
  </div>
 
  <!--End 2nd Column   -->
<?php include_once('includes/footer.php') ?>