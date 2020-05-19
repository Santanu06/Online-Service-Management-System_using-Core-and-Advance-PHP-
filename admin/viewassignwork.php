<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  define('title','Work Order');
  define('page','work');
  include_once('includes/header.php');
?>
  <!--Start 2nd Column-->
    <div class="col-md-6 mt-5">
      <h3 class="text-center">Assign Work Details</h3>
      <?php 
        if(isset($_REQUEST['view'])){         
          $sql="SELECT * FROM assign_work WHERE requestid={$_REQUEST['requestid']}";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();?>
      <table class="table table-bordered">
				<tbody>
					<tr>
						<th>Request Id  </th>
						<td><?php if(isset($row['requestid'])){ echo $row['requestid'];} ?></td>
					</tr>
					<tr>
						<th>Request Info  </th>
						<td><?php if(isset($row['request_info'])){ echo $row['request_info'];} ?></td>
					</tr>
					<tr>
						<th>Request Desc  </th>
						<td><?php if(isset($row['request_desc'])){ echo $row['request_desc'];} ?></td>
					</tr>
					<tr>
						<th>Name </th>
						<td><?php if(isset($row['requester_name'])){ echo $row['requester_name'];} ?></td>
					</tr>
					<tr>
						<th>Address 1 </th>
						<td><?php if(isset($row['requester_add1'])){ echo $row['requester_add1'];} ?></td>
					</tr>
					<tr>
						<th>Address 2 </th>
						<td><?php if(isset($row['requester_add2'])){ echo $row['requester_add2'];} ?></td>
					</tr>
					<tr>
						<th>City </th>
						<td><?php if(isset($row['requester_city'])){ echo $row['requester_city'];} ?></td>
					</tr>
					<tr>
						<th>State </th>
						<td><?php if(isset($row['requester_state'])){ echo $row['requester_state'];} ?></td>
					</tr>
					<tr>
						<th>Pin </th>
						<td><?php if(isset($row['requester_pin'])){ echo $row['requester_pin'];} ?></td>
					</tr>
					<tr>
						<th>Email Id </th>
						<td><?php if(isset($row['requester_email'])){ echo $row['requester_email'];} ?></td>
					</tr>
					<tr>
						<th>Mobile No </th>
						<td><?php if(isset($row['requester_mobile'])){ echo $row['requester_mobile'];} ?></td>
					</tr>
					<tr>
						<th>Technician </th>
						<td><?php if(isset($row['assign_tech'])){ echo $row['assign_tech'];} ?></td>
					</tr>
					<tr>
						<th>Customer Sign</th>
						<td></td>
					</tr>
					</tr>
					<tr>
						<th>Technician Sign</th>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div class="text-center mt-2 mb-2 d-print-none ">
					<form action="" class="d-inline">
						<input type="submit" value="Print" class="btn btn-danger" onClick="window.print()">
          </form>
          <form action="work.php" class="d-inline">
						<input type="submit" value="Close" class="btn btn-secondary ">
					</form>
			</div>
      <?php } ?>
    </div>
  <!--End 2nd Column-->

<?php include_once('includes/footer.php') ?>