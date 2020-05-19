
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo title; ?></title>
  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!--Font Awesome CSS-->
  <link rel="stylesheet" href="../css/all.min.css">
  <!--Custom CSS-->
  <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
  <!--Top Nav Bar-->
  <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">OSMS</a></nav>
  <!-- Container Start -->
   <div class="container-fluid mb-5" style="margin-top:40px;">
      <div class="row"> <!--Row Start-->
        <!--Side Bar Start -->
        <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
          <div class="sidebar-sticky">
          	<ul class="nav flex-column"><li class="nav-item"><a class="nav-link <?php if(page == 'dashboard'){ echo 'active';} ?>"  href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'work'){ echo 'active';} ?>" href="work.php"><i class="fab fa-accessible-icon" ></i>Work Order</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'request'){ echo 'active';} ?>" href="request.php"><i class="fas fa-align-center"></i>Request</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'assets'){ echo 'active';} ?>" href="assets.php"><i class="fas fa-database"></i>Assets</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'technician'){ echo 'active';} ?>" href="technician.php"><i class="fab fa-teamspeak"></i>Technician</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'requester'){ echo 'active';} ?>" href="requester.php"><i class="fas fa-users"></i>Requester</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'sellreport'){ echo 'active';} ?>" href="sellreport.php"><i class="fas fa-table"></i>Sell Report</a></li>

            <li class="nav-item"><a class="nav-link <?php if(page == 'workreport'){ echo 'active';} ?>" href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>
            
            <li class="nav-item"><a class="nav-link <?php if(page == 'changepassword'){ echo 'active';} ?>" href="changepassword.php"><i class="fas fa-key"></i>Change Password</a></li>

            <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

            </ul>
          </div>
        </nav> <!--Side bar End 1st column-->