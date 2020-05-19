<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  if(isset($_REQUEST['delete'])){
    $sql="DELETE FROM userdetails WHERE u_id={$_REQUEST['userid']}";
    if($conn->query($sql) == true){
      $msg='<div class="alert alert-success">User Deleted Successfully</div>';
    }else{
      $msg='<div class="alert alert-damger">Failed to Delete User</div>';
    }
  }
  define('title','Requester');
  define('page','requester');
  include_once('includes/header.php');
?>
  <!--Start 2nd Column  -->
  <div class="col-md-10 col-sm-9 mt-5 text-center">
    <p class="bg-secondary text-white p-1">List Of User</p>
    <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']);} ?>
    <?php if(isset($msg)){ echo $msg ;} ?>
    <?php 
      $sql="SELECT * FROM userdetails";
      $result=$conn->query($sql);
      if($result->num_rows > 0){
    ?>
    <table class="table">
      <thead>
        <th>User Id</th>
        <th>Name</th>
        <th>Email Id</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php while($row=$result->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $row['u_id'] ;?></td>
          <td><?php echo $row['u_name'] ;?></td>
          <td><?php echo $row['u_emailid'] ;?></td>
          <td>
            <form action="edituser.php"method="post" class="d-inline">
              <input type="hidden" name="userid" value="<?php echo $row['u_id'] ; ?>">
              <button type="submit" class="btn btn-primary" name="edit" value="Edit"><i class="fas fa-pen"></i></button>
            </form>
            <form action="" method="post" class="d-inline">
            <input type="hidden" name="userid" value="<?php echo $row['u_id'] ; ?>">
            <button type="submit" class="btn btn-danger" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php }else{
      echo'<div class="alert alert-info">No User Available</div>';
    } ?>
  </div>
  <!-- End 2nd Column  -->
  </div><!--Row End-->
  <div class="float-right"><a href="insertuser.php" class="btn btn-primary"><i class="fas fa-plus"></i></a></div>
    </div><!--Container End-->
    
    <script src="../js/jquery.min.js"></script>
  	<script src="../js/popper.min.js"></script>
   	<script src="../js/bootstrap.min.js"></script>
   	<script src="../js/all.min.js"></script>
</body>
</html>