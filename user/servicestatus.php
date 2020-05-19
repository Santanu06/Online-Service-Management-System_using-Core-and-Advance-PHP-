<?php 
	include_once('../dbconnection.php');
	session_start();
	if(isset($_SESSION['login'])){
		$email=$_SESSION['email'];
	}else{
		echo '<script>location.href="userLogin.php"</script>';
  }
	define('title','Service Status');
	define('page','servicestatus');
	include_once('includes/header.php');
?>
	<!-- Start 2nd Column -->
	<div class="col-sm-6 mt-5">
		<form action="" method="post" class="form-inline d-print-none">
			<div class="form-group">
				<label for="servicestatus" class="font-weight-bold mx-3">Enter Request Id : </label>
				<input type="text" name="checkid" id="checkid" class="form-control" onKeyPress='return contactNoValidate(event)'>
			</div>
			<button type="submit" class="btn btn-danger mx-3" name="search">Search</button>
		</form>
		<?php 
		if(isset($_REQUEST['search'])){
			if(($_REQUEST['checkid'])==""){
				$msg='<div class="alert alert-warning text-center">Please input Request Id</div>';
			}else{				
				$sql="SELECT * FROM assign_work WHERE requestid={$_REQUEST['checkid']}";
				$result=$conn->query($sql);
				$row=$result->fetch_assoc();
				if($row['requestid'] == $_REQUEST['checkid']){
			 ?>
			<h3 class="text-center mt-5 mb-4">Assigned Work Details</h3>
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
			<div class="text-center mt-2 mb-2 d-print-none">
					<form action="">
						<input type="submit" value="Print" class="btn btn-danger" onClick="window.print()">
						<input type="submit" value="Close" class="btn btn-secondary">
					</form>
			</div>
			<?php }else{ echo '<div class="alert alert-info mt-4 text-center">Your Request Is still Pending</div>'; }?>			
			<?php } } ?>
			<div class="mt-4 text-center"><?php if(isset($msg)){ echo $msg; } ?></div>
	</div>
	<!-- End 2nd Column -->
	<!--Validation For Request Id-->
	<script>
		function contactNoValidate(key)
		{
			var asccicode=key.keyCode;
			if(!(asccicode==8 || asccicode==127) && (asccicode<48 || asccicode>57)){
				return false;
			}else{
				return true;
			}
		}
	</script>
	

<?php 
	include_once('includes/footer.php');
?>