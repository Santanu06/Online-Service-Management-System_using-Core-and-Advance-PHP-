<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $a_email=$_SESSION['admin_email'];
  }else{
    echo "<script>location.href='adminlogin.php'</script>";
  }
  if(isset($_REQUEST['delete'])){
    $sql="DELETE FROM product_details WHERE p_id={$_REQUEST['p_id']}";
    if($conn->query($sql) == true){
      $msg='<div class="alert alert-success">Product Deleted Successfully</div>';
    }else{
     $msg='<div class="alert alert-danger">Failed to Delete Product</div>';
    }
  }
  define('title','Assets');
  define('page','assets');
  include_once('includes/header.php');
?>
  <!--Start 2nd Column  -->
<div class="col-md-10 col-sm-9 mt-5 text-center">
    <p class="bg-secondary text-white p-1">List Of Product</p>
    <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']);} ?>
    <?php if(isset($msg)){ echo $msg ;} ?>
    <?php 
      $sql="SELECT * FROM product_details";
      $result=$conn->query($sql);
      if($result->num_rows > 0){
    ?>
    <table class="table">
      <thead>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>DOP</th>
        <th>Available</th>
        <th>Total</th>
        <th>Original Price</th>
        <th>Selling Price</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php while($row=$result->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $row['p_id'] ;?></td>
          <td><?php echo $row['p_name'] ;?></td>
          <td><?php echo $row['p_dop'] ;?></td>
          <td><?php echo $row['p_available'] ;?></td>
          <td><?php echo $row['p_total'] ;?></td>
          <td><?php echo $row['p_original_cost'] ;?></td>
          <td><?php echo $row['p_selling_cost'] ;?></td>
          <td>
            <form action="edit_product.php"method="post" class="d-inline">
              <input type="hidden" name="p_id" value="<?php echo $row['p_id'] ; ?>">
              <button type="submit" class="btn btn-primary" name="edit" value="Edit"><i class="fas fa-pen"></i></button>
            </form>
            <form action="" method="post" class="d-inline">
            <input type="hidden" name="p_id" value="<?php echo $row['p_id'] ; ?>">
            <button type="submit" class="btn btn-danger" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>
            </form>
            <form action="sell_product.php" method="post" class="d-inline">
            <input type="hidden" name="p_id" value="<?php echo $row['p_id'] ; ?>">
            <button type="submit" class="btn btn-success" name="issue" value="Issue"><i class="fas fa-handshake"></i></button>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php }else{
      echo'<div class="alert alert-info">No Product Available</div>';
    } ?>
  </div>
  <!-- End 2nd Column  -->
  </div><!--Row End-->
  <div class="float-right"><a href="insert_product.php" class="btn btn-primary"><i class="fas fa-plus"></i></a></div>
    </div><!--Container End-->
    
    <script src="../js/jquery.min.js"></script>
  	<script src="../js/popper.min.js"></script>
   	<script src="../js/bootstrap.min.js"></script>
   	<script src="../js/all.min.js"></script>
</body>
</html>

<?php include_once('includes/footer.php') ?>