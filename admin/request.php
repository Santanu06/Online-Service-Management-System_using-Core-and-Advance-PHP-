<?php 
include_once('../dbconnection.php');
session_start();
if(isset($_SESSION['admin_login'])){
  $a_email=$_SESSION['admin_email'];
}else{
  echo "<script>location.href='adminlogin.php'</script>";
}
if(isset($_REQUEST['assign'])){
  $sql="SELECT requestid FROM assign_work WHERE requestid={$_REQUEST['requestid']}";
  $result = $conn->query($sql);
  $row= $result->fetch_assoc();
  if($row['requestid'] == false){ 
    if(($_REQUEST['requestid']=="")||($_REQUEST['requestinfo']=="")||($_REQUEST['description']=="")||($_REQUEST['name']=="")||($_REQUEST['address1']=="")||($_REQUEST['address2']=="")||($_REQUEST['city']=="")||($_REQUEST['state']=="")||($_REQUEST['pin']=="")||($_REQUEST['email']=="")||($_REQUEST['mobile']=="")||($_REQUEST['assigntech']=="")||($_REQUEST['date']=="")){
    $msg='<div class="alert alert-warning text-center">Please Fill All Fields</div>';
    }else{
      $rid = $_REQUEST['requestid'];
      $rinfo = $_REQUEST['requestinfo'];
      $rdesc = $_REQUEST['description'];
      $rname = $_REQUEST['name'];
      $address1 = $_REQUEST['address1'];
      $address2 = $_REQUEST['address2'];
      $rcity = $_REQUEST['city'];
      $rstate = $_REQUEST['state'];
      $rpin = $_REQUEST['pin'];
      $remail = $_REQUEST['email'];
      $rmobile = $_REQUEST['mobile'];
      $assign_tech = $_REQUEST['assigntech'];
      $assign_date = $_REQUEST['date'];

      $sql="INSERT INTO assign_work (requestid,request_info,request_desc,requester_name,requester_add1,requester_add2,requester_city,requester_state,requester_pin,requester_email,requester_mobile,assign_tech,assign_date) VALUES('$rid','$rinfo','$rdesc','$rname','$address1','$address2','$rcity','$rstate','$rpin','$remail','$rmobile','$assign_tech','$assign_date')";
      if($conn->query($sql) == true){
        $msg='<div class="alert alert-success text-center">Work Assigned Successfully</div>';
      }else{
        $msg='<div class="alert alert-danger text-center">Unable to Assign Work</div>';
      }
    }
  }else{
    $msg='<div class="alert alert-warning text-center">Work Already Assigned</div>';
  }
}
  if(isset($_REQUEST['close'])){
    $sql="SELECT requestid FROM assign_work WHERE requestid={$_REQUEST['requestid']}";
    $result = $conn->query($sql);
    $row= $result->fetch_assoc();
    if($row['requestid'] == false){ 
      $closemsg='<div class="alert alert-danger">Work Not Assigned Yet Please assign First</div>';
    }else{
      $sql="DELETE FROM submitrequest WHERE requestid={$_REQUEST['requestid']}";
      $result=$conn->query($sql);
      echo '<meta http-equiv="refresh" content="0;URL=?closed>'; 
    }
  }
  define('title','Request');
  define('page','request');
  include_once('includes/header.php');
?>
  <!--Start 2nd Column -->
  <div class="col-sm-4 mt-5 mb-5">
   <?php if(isset($closemsg)){ echo $closemsg ;} ?>
    <?php 
      $sql="SELECT requestid, request_info, request_desc, request_date FROM submitrequest";
      $result=$conn->query($sql);
      if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){ ?>
          <div class="card mt-4 mx-4">
            <div class="card-header bg-secondary">
             Request Id : <?php echo $row['requestid']; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title">Request Info : <?php echo $row['request_info']; ?></h5>
              <p class="card-text"><?php echo $row['request_desc'] ?></p>
              <p class="card-text">Request Date : <?php echo $row['request_date'] ?></p>
            
              <form action="" method="post">
                <input type="hidden" name="requestid" value='<?php echo $row['requestid']; ?>'>
                <button type="submit" class="btn btn-danger btn-sm float-right" name="view">View</button>
                <button type="submit" class="btn btn-warning btn-sm float-right mx-2" name="close">Close</button>
              </form>
            </div>
          </div>
        <?php } 
      }else{ echo '<div class="alert alert-info text-center">Request Not Available</div>'; } ?>
          
       
       
  </div><!--End 2nd Column -->
  
  <?php
  include_once('assignworkform.php');
  include_once('includes/footer.php'); ?>