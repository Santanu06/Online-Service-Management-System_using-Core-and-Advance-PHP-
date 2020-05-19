<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $a_email=$_SESSION['admin_email'];
  }else{
    echo "<script>location.href='adminlogin.php'</script>";
  }  
  define('title','Product Selling');
  define('page','assets');
  include_once('includes/header.php');
  

$sql="SELECT * FROM customer_invoice WHERE cp_id= {$_SESSION['myid']}";

$result=$conn->query($sql);
if($result->num_rows == 1){
 $row = $result->fetch_assoc();

?>
  <div class="ml-5 mt-5">
    <h3 class="text-center">Customer Invoice</h3>
    <table class="table">
      <tbody>
        <tr>
          <th>Product Id</th>
          <td><?php if(isset($row['cp_id'])){ echo $row['cp_id'];} ?></td>
        </tr>
        <tr>
        <th>Customer Name</th>
          <td><?php if(isset($row['cust_name'])){ echo $row['cust_name'];} ?></td>
        </tr>
        <tr>
        <th>Address</th>
          <td><?php if(isset($row['cust_add'])){ echo $row['cust_add'];} ?></td>
        </tr>
        <tr>
        <th>Product Name</th>
          <td><?php if(isset($row['cproduct_name'])){ echo $row['cproduct_name'];} ?></td>
        </tr>
        <tr>
        <th>Quantity</th>
          <td><?php if(isset($row['cp_quantity'])){ echo $row['cp_quantity'];} ?></td>
        </tr>
        <tr>
        <th>Selling Price</th>
          <td><?php if(isset($row['selling_price'])){ echo $row['selling_price'];} ?></td>
        </tr>
        <tr>
        <th>Total Price</th>
          <td><?php if(isset($row['total_price'])){ echo $row['total_price'];} ?></td>
        </tr>
        <tr>
        <th>Purches Date</th>
          <td><?php if(isset($row['date'])){ echo $row['date'];} ?></td>
        </tr>
        <tr>
          <td><form action="" class="d-print-none"><input type="submit" value="print" onClick='window.print()' class="btn btn-danger"></form></td><td><a href="assets.php" class="btn btn-secondary d-print-none">Close</a></td>
        </tr>
      </tbody>
    </table>
  </div>
<?php }else{ echo 'Failed'; }?>
<?php include_once('includes/footer.php') ?>