<!DOCTYPE html>
<html lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo title; ?></title>
 <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
	<!--Navbar Start-->
   <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="userprofile.php">OSMS</a></nav> 
   
    <!--Navbar End-->
    <!--Container Start-->
    <div class="container-fluid mb-5 " style="margin-top:40px;">
      <div class="row"><!--Row Start-->
       <!--Side bar Start-->
        <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
          <div class="sidebar-sticky">
          	<ul class="nav flex-column"><li class="nav-item"><a class="nav-link <?php if(page == 'userprofile'){ echo 'active';} ?>"  href="userprofile.php"><i class="fas fa-user"></i>Profile</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'submitrequest'){ echo 'active';} ?>" href="submitrequest.php"><i class="fab fa-accessible-icon" ></i>Submit Request</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'servicestatus'){ echo 'active';} ?>" href="servicestatus.php"><i class="fas fa-align-center"></i>Service Status</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'changepassword'){ echo 'active';} ?>" href="changepassword.php"><i class="fas fa-key"></i>Change Password</a></li>

            <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

            </ul>
          </div>
        </nav> <!--Side bar End-->
 