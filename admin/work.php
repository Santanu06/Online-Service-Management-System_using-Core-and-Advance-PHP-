<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_email'];
  }else{
    header('location:adminlogin.php');
  }
  if(isset($_REQUEST['delete'])){
    $sql="DELETE FROM assign_work WHERE requestid={$_REQUEST['requestid']}";
    $result=$conn->query($sql);
    if($result){
      echo '<meta http-equiv="refresh" content="0;URL=?deleted">';
    }else{
      $msg='<div class="alert alert-danger">Failed to Delete</div>';
    }
  }
  define('title','Work Order');
  define('page','work');
  include_once('includes/header.php');
?>
<div class="col-md-9 col-sm-10 mt-5">
  <?php if(isset($msg)){ echo $msg;} ?>
  <?php $sql="SELECT * FROM assign_work";
    $result=$conn->query($sql);
    if($result->num_rows > 0){?>
    <table class="table">
      <thead>
        <th>Request Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Mobile</th>
        <th>Technician</th>
        <th>Assigned Date</th>
        <th>View</th>
        <th>Delete</th>
      </thead>
      <tbody>
        <?php while($row=$result->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $row['requestid'] ;?></td>
          <td><?php echo $row['requester_name'] ;?></td>
          <td><?php echo $row['requester_add1'] ;?></td>
          <td><?php echo $row['requester_city'] ;?></td>
          <td><?php echo $row['requester_mobile'] ;?></td>
          <td><?php echo $row['assign_tech'] ;?></td>
          <td><?php echo $row['assign_date'] ;?></td>
          <td >
          <form action="viewassignwork.php" method="post" > 
              <input type="hidden" name="requestid" value="<?php echo $row['requestid'];  ?>">
              <button type="submit" name="view" class="btn btn-warning btn-sm "><i class="far fa-eye"></i></button>
            </form>
          </td>    
          <td>
            <form action="" method="post" >
              <input type="hidden" name="requestid" value="<?php echo $row['requestid'];  ?>">
              <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
            </form>
          </td> 
        </tr>
        <?php } ?>
      </tbody>
    </table>
   <?php }else{ echo'<div class="alert alert-info">No Work Order Available</div>';
        } ?>
</div>
<?php include_once('includes/footer.php') ?>