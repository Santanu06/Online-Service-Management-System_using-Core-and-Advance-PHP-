<?php 
  if(session_id()== ""){
    session_start();
  }
  if(isset($_SESSION['admin_login'])){
    $a_email=$_SESSION['admin_email'];
  }else{
    echo "<script>location.href='adminlogin.php'</script>";
  }
  if(isset($_REQUEST['view'])){
  $sql="SELECT * FROM submitrequest WHERE requestid={$_REQUEST['requestid']}";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
  }
  ?> 
    <!--Start Assigned Work 3rd Column-->
    <div class="col-sm-5 mt-5 mb-5 jumbotron">
        <?php if(isset($msg)){ echo $msg;} ?>
       <form action="" method="post">
          <h5 class="text-center">Assign Work Order Request</h5>
          <div class="form-group">
              <label>Request Id</label>
              <input type="text" class="form-control" id="requestid" name="requestid" readonly value="<?php if(isset($row['requestid'])) { echo $row['requestid']; } ?>" />
            </div>
          <div class="form-group">
              <label>Request Info</label>
              <input type="text" class="form-control" id="inputrequestinfo"  name="requestinfo" value="<?php if(isset($row['request_info'])){ echo $row['request_info'];} ?>"/>
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" id="description" name="description"><?php if(isset($row['request_desc'])) { echo $row['request_desc'];} ?></textarea>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="name" name="name"value="<?php if(isset($row['requester_name'])){ echo $row['requester_name']; }?>" />
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="address1">Address Line 1</label>
                <input type="text" class="form-control" name="address1" id="addressone"value="<?php if(isset($row['requester_add1'])){ echo $row['requester_add1'];} ?>"/>
              </div>
              <div class="form-group col-md-6">
              	<label for="address1">Address Line 2</label>
                <input type="text" class="form-control" name="address2" id="addresstwo"value="<?php if(isset($row['requester_add2'])){ echo $row['requester_add2']; }?>"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for='inputcity'>City</label>
                <input type="text" class="form-control" id="inputcity" name="city" value="<?php if(isset($row['requester_city'])){ echo $row['requester_city'];} ?>"/>
              </div>
              <div class="form-group col-md-4">
                <label for='inputcity'>State</label>
                <input type="text" class="form-control" id="inputstate" name="state" value="<?php if(isset($row['requester_satate'])){ echo $row['requester_satate']; }?>"/>
              </div>
              <div class="form-group col-md-2">
                <label for='inputpin'>Pin</label>
                <input type="text" class="form-control" id="inputpin" name="pin" value="<?php if(isset($row['requester_pin'])){ echo $row['requester_pin']; }?>" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="Email">Email</label>
                <input type="email" class="form-control" id="inputemail" name="email"value="<?php if(isset($row['requester_email'])){ echo $row['requester_email']; }?>" />
              </div>
              <div class="form-group col-md-6">
                <label for="inputmobile">Mobile</label>
                <input type="text" class="form-control" id="inputmobile" name="mobile" value="<?php if(isset($row['requester_mobile'])){ echo $row['requester_mobile']; }?>" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputdate">Assigned Techinician</label>
                <input type="text" class="form-control" id="assigntech" name="assigntech" />
              </div>
              <div class="form-group col-md-6">
                <label for="inputdate">Date</label>
                <input type="date" class="form-control" id="inputdate" name="date" />
              </div>
            </div>
            <div class="float-right">
              <button type="submit" class="btn btn-success" name="assign">Assign</button>
              <button type="reset" class="btn btn-secondary" >Reset</button>
            </div>
       </form>   
    </div>
    <!--End Assigned Work 3rd Column-->