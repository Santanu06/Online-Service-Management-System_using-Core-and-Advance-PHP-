<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  if(isset($_REQUEST['submit'])){
    if(($_REQUEST['p_name']=="")||($_REQUEST['p_dop']=="")||($_REQUEST['p_available']=="")||($_REQUEST['p_total']=="")||($_REQUEST['p_original_cost']=="")||($_REQUEST['p_selling_cost']=="")){
      $msg='<div class="alert alert-warning">Please fill All Fields</div>';
    }else{
      $p_name=$_REQUEST['p_name'];
      $p_dop=$_REQUEST['p_dop'];
      $p_available=$_REQUEST['p_available'];
      $p_total=$_REQUEST['p_total'];
      $p_original_cost=$_REQUEST['p_original_cost'];
      $p_selling_cost=$_REQUEST['p_selling_cost'];
      
      $sql="INSERT INTO product_details(p_name,p_dop,p_available,p_total,p_original_cost,p_selling_cost) VALUES('$p_name','$p_dop','$p_available','$p_total','$p_original_cost','$p_selling_cost')";
      if($conn->query($sql)== true){
        $_SESSION['msg']='<div class="alert alert-success">Product Register Successfully</div>';
        echo '<script>window.location.href="assets.php"</script>';
      }else{
        $msg='<div class="alert alert-danger">Failed to Register Product </div>';
      }
    }
  }
  define('title','Insert Product');
  define('page','assets');
  include_once('includes/header.php');
?>
<!--Start 2nd Column  -->
  <div class="col-md-6 mt-5 mx-3 jumbotron">
    <?php if(isset($msg)){ echo $msg;} ?>
    <h3 class="text-center">Add New Products</h3>
  <form action="" method="post">
    <div class="form-group">
      <label for="pname" class="font-weight-bold">Product Name</label>
      <input type="text" name="p_name" id="p_name" class="form-control">
    </div>
    <div class="form-group">
      <label for="dop" class="font-weight-bold">DOP</label>
      <input type="date" name="p_dop" id="p_dop" class="form-control">
    </div>
    <div class="form-group">
      <label for="pavailable" class="font-weight-bold">Product Available</label>
      <input type="text" name="p_available" id="p_available" class="form-control" onKeyPress='return inputOnlyNumber(event)'>
    </div>
    <div class="form-group">
      <label for="ptotal" class="font-weight-bold">Total Product</label>
      <input type="text" name="p_total" id="p_total" class="form-control" onKeyPress='return inputOnlyNumber(event)'>
    </div>
    <div class="form-group">
      <label for="orgprice" class="font-weight-bold">Original Price</label>
      <input type="text" name="p_original_cost" id="p_original_cost" class="form-control" onKeyPress='return inputOnlyNumber(event)'>
    </div>
    <div class="form-group">
      <label for="sellprice" class="font-weight-bold">Selling Price</label>
      <input type="text" name="p_selling_cost" id="p_selling_cost" class="form-control" onKeyPress='return inputOnlyNumber(event)'>
    </div>
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-danger">Submit</button>
      <a href="assets.php" class="btn btn-secondary">Close</a>
    </div>
  </form>
  </div>
<!--End 2nd Column   -->
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

<?php include_once('includes/footer.php'); ?>