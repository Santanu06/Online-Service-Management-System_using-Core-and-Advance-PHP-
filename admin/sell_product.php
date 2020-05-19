<?php 
include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  if(isset($_REQUEST['submit'])){
    if(($_REQUEST['p_id']=='')||($_REQUEST['cust_name']=='')||($_REQUEST['cust_address']=='')||($_REQUEST['p_name']=='')||($_REQUEST['quantity']=='')||($_REQUEST['p_selling_cost']=='')||($_REQUEST['totalprice']=='')||($_REQUEST['selldate']=='')){
      $msg='<div class="alert alert-warning">Please Fill All Fields</div>';
    }else{
      $pid=$_REQUEST['p_id'];
      $p_available=$_REQUEST['p_available'] - $_REQUEST['quantity'];
      
      $cust_name=$_REQUEST['cust_name'];
      $cust_add=$_REQUEST['cust_address'];
      $cproduct_name=$_REQUEST['p_name'];
      $cp_quantity=$_REQUEST['quantity'];
      $selling_price=$_REQUEST['p_selling_cost'];
      $total_price=$_REQUEST['totalprice'];
      $selldate=$_REQUEST['selldate'];
      
      $sql="INSERT INTO customer_invoice(cust_name,cust_add,cproduct_name,cp_quantity,selling_price,total_price,selldate) VALUES ('$cust_name','$cust_add','$cproduct_name','$cp_quantity','$selling_price','$total_price','$selldate')";
      if($conn->query($sql) == true){
        $genid=mysqli_insert_id($conn);
        session_start();
        $_SESSION['myid']=$genid;
        echo '<script>window.location.href="product_sell_success.php";</script>';
      }else{
        $msg='<div class="alert alert-danger>Failed to Generate Bill</div>';
      }   
      $sqlup="UPDATE product_details SET p_available='$p_available' WHERE p_id='$pid'";
      $conn->query($sqlup);
    }
  }    
  define('title','Sell Product');
  define('page','assets');
  include_once('includes/header.php');
  ?>
  
    <!--Start 2nd Column  -->
    <div class="col-sm-6 mt-5 mx-3 jumbotron ">
      <h3 class="text-center">Customer Invoice</h3>
    <?php 
      if(isset($_REQUEST['issue'])){
      $sql="SELECT * FROM product_details WHERE p_id={$_REQUEST['p_id']}";
      $result=$conn->query($sql);
      $row=$result->fetch_assoc();      
      }
    ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="productid" class="font-weight-bold">Product Id</label>
        <input type="text" name="p_id" class="form-control" id="p_id" value="<?php if(isset($row['p_id'])){ echo $row['p_id'];} ?>" readonly>
      </div>
      <div class="form-group">
        <label for="customername" class="font-weight-bold">Customer Name</label>
        <input type="text" name="cust_name" class="form-control" id="cust_name" >
      </div>
      <div class="form-group">
        <label for="customeraddress" class="font-weight-bold">Customer Address</label>
        <input type="text" name="cust_address" class="form-control" id="cust_address" >
      </div>
      <div class="form-group">
      <label for="pname" class="font-weight-bold">Product Name</label>
      <input type="text" name="p_name" id="p_name" class="form-control" value="<?php if(isset($row['p_name'])){ echo $row['p_name'];} ?>" readonly>
    </div>
    <div class="form-group">
      <label for="pavailable" class="font-weight-bold">Available</label>
      <input type="text" name="p_available" id="p_available" class="form-control" value="<?php if(isset($row['p_available'])){ echo $row['p_available'];} ?>" onKeyPress='return inputOnlyNumber(event)'readonly> 
    </div>  
    <div class="form-group">
      <label for="quantity" class="font-weight-bold">Quantity</label>
      <input type="text" name="quantity" id="quantity" class="form-control"  onKeyPress='return inputOnlyNumber(event)'>
    </div>    
    <div class="form-group">
      <label for="sellprice" class="font-weight-bold">Selling Price</label>
      <input type="text" name="p_selling_cost" id="p_selling_cost" class="form-control" value="<?php if(isset($row['p_selling_cost'])){ echo $row['p_selling_cost'];} ?>" onKeyPress='return inputOnlyNumber(event)' readonly>
    </div>
    <div class="form-group">
      <label for="totalprice" class="font-weight-bold">Total Price</label>
      <input type="text" name="totalprice" id="totalprice" class="form-control"  onKeyPress='return inputOnlyNumber(event)' value="<?php if(isset($totalprice)){ echo $totalprice ;} ?>">
    </div> 
    <div class="form-group col-md-4">
      <label for="date" class="font-weight-bold">Date</label>
      <input type="date" name="selldate" id="selldate" class="form-control"  onKeyPress='return inputOnlyNumber(event)'>
    </div> 

      <div class="form-group text-center">
        <button type="submit" class="btn btn-danger" name="submit">Submit</button>
        <a href="assets.php" class="btn btn-secondary">Close</a>
      </div>
    </form>  
    <?php if(isset($msg)){ echo $msg ;} ?>   
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

  <?php include_once('includes/footer.php') ?>