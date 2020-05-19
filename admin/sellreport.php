<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  define('title','Sell Report');
  define('page','sellreport');
  include_once('includes/header.php');

?>
  <!--Start 2nd Column  -->
  <div class="col-sm-9 col-md-10 mt-5 text-center">
    <form action="" method="post" class="d-print-none ml-5">
       <div class="form-row">
       <span class="font-weight-bold">From</span> 
          <div class="form-group col-md-3">
            <input type="date" name="startDate" id="startDate" class="form-control shadow-lg">
          </div>
           <span class="font-weight-bold">to</span>          
          <div class="col-md-3 form-group">
            <input type="date" class="form-control shadow-lg" name="endDate" id="endDate">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="searchsubmit" value="Search">
          </div>          
       </div>
    </form>
    <?php if(isset($_REQUEST['searchsubmit'])) {
      $startDate=$_REQUEST['startDate'];
      $endDate=$_REQUEST['endDate'];
      $sql="SELECT * FROM customer_invoice WHERE selldate BETWEEN '$startDate' AND '$endDate'";
      $result=$conn->query($sql);
      if($result->num_rows > 0){ ?>

        <p class="bg-secondary text-white p-2 mt-4">Sell Reports</p>
        <table class="table mt-5">
          <thead>
            <th scope="col">Customer Id</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Address</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Selling Price</th>
            <th scope="col">Total price</th>
            <th scope="col">Selling Date</th>
          </thead>
          <tbody>
            <?php while($row =$result->fetch_assoc()){ ?>
            <tr>
              <td><?php if(isset($row['cp_id'])){ echo $row['cp_id'] ;} ?></td>
              <td><?php if(isset($row['cust_name'])){ echo $row['cust_name'] ;} ?></td>
              <td><?php if(isset($row['cust_add'])){ echo $row['cust_add'] ;} ?></td>
              <td><?php if(isset($row['cproduct_name'])){ echo $row['cproduct_name'] ;} ?></td>
              <td><?php if(isset($row['cp_quantity'])){ echo $row['cp_quantity'] ;} ?></td>
              <td><?php if(isset($row['selling_price'])){ echo $row['selling_price'] ;} ?></td>
              <td><?php if(isset($row['total_price'])){ echo $row['total_price'] ;} ?></td>
              <td><?php if(isset($row['selldate'])){ echo $row['selldate'] ;} ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
            <tr>
              <td><input type="submit" class="btn btn-danger d-print-none" onClick="window.print()" value="Print"></td>
            </tr>
     <?php }else{
        echo '<div class="alert alert-info col-md-8 mt-4 ml-3 shadow">No Sell Report Available</div>';
      }
    }
    ?>
  </div>
  <!--End 2nd Column   -->

<?php include_once('includes/footer.php') ?>