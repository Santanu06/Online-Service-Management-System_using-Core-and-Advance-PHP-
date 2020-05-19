<?php 
  define('title','Success');
  include_once('includes/header.php');
  include_once('../dbconnection.php');
  session_start();
	if(isset($_SESSION['login'])){
		$email=$_SESSION['email'];
	}else{
		echo '<script>location.href="userLogin.php"</script>';
  }
$sql = "SELECT * FROM submitrequest WHERE requestid={$_SESSION['request_id']}";
  $result = $conn->query($sql);
  if($result->num_rows == 1){
    $row=$result->fetch_assoc();
    echo "<div class='ml-5 mt-5'>
            <h1>OSMS</h1>
            <table class='table'>
              <tbody>
                <tr>
                  <th>Request Id</th>
                  <td>".$row['requestid']."</td>
                </tr>
                <tr>
                  <th>Name</th>
                  <td>".$row['requester_name']."</td>
                </tr>
                <tr>
                  <th>Email Id</th>
                  <td>".$row['requester_email']."</td>
                </tr>
                <tr>
                  <th>Request Info</th>
                  <td>".$row['request_info']."</td>
                </tr>
                <tr>
                  <th>Request Description</th>
                  <td>".$row['request_desc']."</td>
                </tr>
                <tr>
                  <td>
                    <form class='d-print-none'>
                      <input class='btn btn-success' type='submit' value='Print' onClick='window.print()'>
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>   
    </div>";
  }
  include_once('includes/footer.php');
?>