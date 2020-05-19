<?php 
include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  define('title','Update Product');
  define('page','assets');
  include_once('includes/header.php');
  if(isset($_REQUEST['update'])){
    if(($_REQUEST['p_id'] == "")||($_REQUEST['p_name'] == "")||($_REQUEST['p_dop'] == "")||($_REQUEST['p_available'] == "")||($_REQUEST['p_total'] == "")||($_REQUEST['p_original_cost'] == "")||($_REQUEST['p_selling_cost'] == "")){
      $msg='<div class="alert alert-warning">Please fill All Fields</div>';
    }else{
      $p_id=$_REQUEST['p_id'];
      $p_name=$_REQUEST['p_name'];
      $p_dop=$_REQUEST['p_dop'];
      $p_available=$_REQUEST['p_available'];
      $p_total=$_REQUEST['p_total'];
      $p_original_cost=$_REQUEST['p_original_cost'];
      $p_selling_cost=$_REQUEST['p_selling_cost'];
      $sql="UPDATE product_details SET p_name='$p_name',p_dop='$p_dop',p_available='$p_available',p_total='$p_total',p_original_cost='$p_original_cost',p_selling_cost='$p_selling_cost' WHERE p_id='$p_id'";
      if($conn->query($sql) == true){
        $_SESSION['msg']='<div class="alert alert-success">Product Details Updated Successfully</div>';
      }else{
        $_SESSION['msg']='<div class="alert alert-danger">Failed to Update Product Details</div>';
      }
      header('Location:assets.php');
    }
  }
?>
  <!--Start 2nd Column  -->
  <div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Product Deatails</h3>
    <?php 
      if(isset($_REQUEST['edit'])){
      $sql="SELECT * FROM product_details WHERE p_id={$_REQUEST['p_id']}";
      $result=$conn->query($sql);
      $row=$result->fetch_assoc();
      }
    ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="techid" class="font-weight-bold">Product Id</label>
        <input type="text" name="p_id" class="form-control" id="p_id" value="<?php if(isset($row['p_id'])){ echo $row['p_id'];} ?>" readonly>
      </div>
      <div class="form-group">
      <label for="pname" class="font-weight-bold">Product Name</label>
      <input type="text" name="p_name" id="p_name" class="form-control" value="<?php if(isset($row['p_name'])){ echo $row['p_name'];} ?>">
    </div>
    <div class="form-group">
      <label for="dop" class="font-weight-bold">Date Of Purchase</label>
      <input type="date" name="p_dop" id="p_dop" class="form-control" value="<?php if(isset($row['p_dop'])){ echo $row['p_dop'];} ?>">
    </div>
    <div class="form-group">
      <label for="pavailable" class="font-weight-bold">Available</label>
      <input type="text" name="p_available" id="p_available" class="form-control" value="<?php if(isset($row['p_available'])){ echo $row['p_available'];} ?>" onKeyPress='return inputOnlyNumber(event)'>
    </div>
    <div class="form-group">
      <label for="tproduct" class="font-weight-bold">Total Product</label>
      <input type="text" name="p_total" id="p_total" class="form-control" value="<?php if(isset($row['p_total'])){ echo $row['p_total'];} ?>" onKeyPress='return inputOnlyNumber(event)'>
    </div>
    <div class="form-group">
      <label for="orgprice" class="font-weight-bold">Original Price</label>
      <input type="text" name="p_original_cost" id="p_original_cost" class="form-control" value="<?php if(isset($row['p_original_cost'])){ echo $row['p_original_cost'];} ?>" onKeyPress='return inputOnlyNumber(event)'>
    </div>
    <div class="form-group">
      <label for="sellprice" class="font-weight-bold">Selling Price</label>
      <input type="text" name="p_selling_cost" id="p_selling_cost" class="form-control" value="<?php if(isset($row['p_selling_cost'])){ echo $row['p_selling_cost'];} ?>" onKeyPress='return inputOnlyNumber(event)'>
    </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-danger" name="update">Upadate</button>
        <a href="assets.php" class="btn btn-secondary">Close</a>
      </div>
    </form>     
  </div>

  <script>
    function inputOnlyNumber(key)
    { 
  	  var asccicode=key.keyCode;
	    if(!(asccicode==8 || asccicode==127 || asccicode==46) && (asccicode<48 || asccicode>57)){
		    return false;
	    }else{
		    return true;
	    }	
    }
  </script> 
  <!--End 2nd Column   -->
<?php include_once('includes/footer.php') ?>