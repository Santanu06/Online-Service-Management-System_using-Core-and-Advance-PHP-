<?php 
  include_once('../dbconnection.php');
  session_start();
  if(isset($_SESSION['admin_login'])){
    $a_email=$_SESSION['admin_email'];
  }else{
    echo "<script>location.href='adminlogin.php'</script>";
  }
  $sql="SELECT max(requestid) FROM submitrequest";
  $result=$conn->query($sql);
  $row=$result->fetch_row();
  $submitrequest=$row[0];

  $sql="SELECT max(rno) FROM assign_work";
  $result=$conn->query($sql);
  $row=$result->fetch_row();
  $assignedwork=$row[0];

  $sql="SELECT * FROM technician_details";
  $result=$conn->query($sql);  
  $technician=$result->num_rows;

  define('title','Dashboard');
  define('page','dashboard');
  include_once('includes/header.php');
?>

        <div class="col-sm-9 col-md-10"> <!--Start Dashboard 2nd Column  -->
          <div class="row text-center mx-4 mt-5">
           <div class="col-md-4">
             <div class="card text-white bg-danger mb-3 shadow-lg" style="max-width:18rem;">
              <div class="card-header">Requests Received</div>
              <div class="card-body">
                <h1><?php if(isset($submitrequest)) { echo $submitrequest ;}else{ echo 'No Requests';} ?></h1>
                <a href="request.php" class="btn text-white">View</a>
              </div>
             </div>
           </div>
           <div class="col-md-4">
           <div class="card text-white bg-success mb-3 shadow-lg"style="max-width:18rem;">
              <div class="card-header">Assigned Work</div>
              <div class="card-body">
                <h1><?php if(isset($assignedwork)) { echo $assignedwork ;}else{ echo 'No Work Assign';} ?></h1>
                <a href="work.php" class="btn text-white">View</a>
              </div>
             </div>
           </div>
           <div class="col-md-4">
           <div class="card text-white bg-info mb-3 shadow-lg"style="max-width:18rem;">
              <div class="card-header">No. Of Technician</div>
              <div class="card-body">
                <h1><?php if(isset($technician)) { echo $technician ;}else{ echo 'No Technician';} ?></h1>
                <a href="technician.php" class="btn text-white">View</a>
              </div>
             </div>
           </div>
          </div>
          <div class="mx-5 mt-5 text-center">
            <p class="bg-dark text-white">List Of Requesters</p>
            <?php 
              $sql = "SELECT * FROM userdetails";
              $result=$conn->query($sql);
              if($result->num_rows > 0){
              ?>
              <table class="table">
                <thead>
                  <tr>
                    <th>Requester Id</th>
                    <th>Name</th>
                    <th>Email Id</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($row=$result->fetch_assoc()){ ?>
                  <tr>
                    <td><?php echo $row['u_id']; ?></td>
                    <td><?php echo $row['u_name']; ?></td>
                    <td><?php echo $row['u_emailid']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php }else{ echo 'No Requester Available'; } ?>
          </div>
        </div> <!--End Dashboard 2nd Column  -->
    <?php include_once('includes/footer.php'); ?>