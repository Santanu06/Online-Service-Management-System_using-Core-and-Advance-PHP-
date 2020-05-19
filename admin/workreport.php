<?php
  include_once('../dbconnection.php');
  session_start();
  define('title','Work Report');
  define('page','workreport');
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
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
      $sql="SELECT * FROM assign_work WHERE assign_date BETWEEN '$startDate' AND '$endDate'";
      $result=$conn->query($sql);
      if($result->num_rows > 0){ ?>

        <p class="bg-secondary text-white p-2 mt-4">Work Reports</p>
        <table class="table mt-5">
          <thead>
            <th scope="col">Request Id</th>
            <th scope="col">Request Info</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Mobile</th>
            <th scope="col">Technician</th>
            <th scope="col">Assigned Date</th>
          </thead>
          <tbody>
            <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
              <td><?php if(isset($row['requestid'])){ echo $row['requestid'] ;} ?></td>
              <td><?php if(isset($row['request_info'])){ echo $row['request_info'] ;} ?></td>
              <td><?php if(isset($row['requester_name'])){ echo $row['requester_name'] ;} ?></td>
              <td><?php if(isset($row['requester_add1'])){ echo $row['requester_add1'] ;} ?></td>
              <td><?php if(isset($row['requester_city'])){ echo $row['requester_city'] ;} ?></td>
              <td><?php if(isset($row['requester_mobile'])){ echo $row['requester_mobile'] ;} ?></td>
              <td><?php if(isset($row['assign_tech'])){ echo $row['assign_tech'] ;} ?></td>
              <td><?php if(isset($row['assign_date'])){ echo $row['assign_date'] ;} ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
            <tr>
              <td><input type="submit" class="btn btn-danger d-print-none" onClick="window.print()" value="Print"></td>
            </tr>
     <?php }else{
        echo '<div class="alert alert-info col-md-8 mt-4 ml-3 shadow">No Work Report Available</div>';
      }
    }
    ?>
  </div>
  <!--End 2nd Column   -->

<?php include_once('includes/footer.php') ?>