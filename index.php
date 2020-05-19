<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OSMS</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!--Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>
  <!--Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-primary pl-5 fixed-top">
  	<a href="index.php" class="navbar-brand">OSMS</a>
    <span class="navbar-text ">Customer's Happiness is Our Motto</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    	<ul class="navbar-nav pl-5 custom-nav">
        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
            <li class="nav-item"><a href="user/userLogin.php" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
        </ul>
    </div>
  </nav>
  <!--End Navigation -->
  <!--Start Header Jumbotron -->
  	<header class="jumbotron back-image" style="background-image:url(images/manwithlaptop.jpg);">
    <div class="myClass mainHeading">
    	<h1 class="text-uppercase text-primary">Welcome to OSMS</h1>
        <p class="font-italic text-warning" >Customer's Happiness is Our Motto</p>
        <a href="user/userLogin.php" class="btn btn-success mr-4">Login</a>
        <a href="userregistration.php" class="btn btn-danger mr-4">Sign Up</a>
    </div>
    </header>
  <!--End Header Jumbotron -->
  
  <!--start Introduction Section container -->
  <div class="container">
  	<div class="jumbotron">
    	<h3 class="text-center">OSMS Services</h3>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
      when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
      It has survived not only five centuries, but also the leap into electronic typesetting, 
      remaining essentially unchanged. It was popularised in the 1960s with the release of 
      Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
      software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
    </div>
  </div>
  <!--End Introduction Section container -->
  
  <!--Start services Section container -->
  <div class="container text-center border-bottom" id="services">
  	<h2>Our Services</h2>
    <div class="row mt-4">
    	<div class="col-sm-4 mb-4">
        	<a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
            <h4 class="mt-4">Electronic Appliances</h4>
        </div>
        <div class="col-sm-4 mb-4">
        	<a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
            <h4 class="mt-4">Preventive Maintenance</h4>
        </div>
        <div class="col-sm-4 mb-4">
        	<a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
            <h4 class="mt-4">Fault Repair</h4>
        </div>
    </div>
  </div>
  <!--End services Section container -->
	<?php 
		include_once('userregistration.php');
	?>
  <!--End Registration Form container-->
  
 <!--Start Happy Customer-->
 <div class="jumbotron bg-primary">
 	<div class="container">
     <h2 class="text-center text-white">Happy Customers</h2>
     <div class="row mt-4">
     <!--Start 1st column-->
       <div class="col-lg-3 col-sm-6">
         <div class="card shadow-lg mb-2">
           <div class="card-body text-center">
             <img src="images/images1.jpg" class="img-fluid" style="border-radius:100px;"><h4 class="card-title font-italic pt-1">Angel Sonal</h4>
             <p class="card-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
           </div>  
         </div>
       </div>
       <!--End 1st column-->
       
       <!--Start 2nd column-->
       <div class="col-lg-3 col-sm-6">
      	<div class="card shadow-lg mb-2">
          <div class="card-body text-center">
            <img src="images/images3.jpg" class="img-fluid" style="border-radius:100px;">
            <h4 class="card-title font-italic pt-1">Rahul Kumar</h4>
            <p class="card-text">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,content here', making it look like readable English.</p>
          </div>
      	</div>
       </div>
       <!--End 2nd column-->
       
       <!--Start 3rd column-->
       <div class="col-lg-3 col-sm-6">
         <div class="card shadow-lg mb-2">
           <div class="card-body text-center">
             <img src="images/images4.jpg" class="img-fluid" style="border-radius:100px;"><h4 class="card-title font-italic pt-1">Sonam Gupta</h4>
             <p class="card-text">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text,and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
           </div>
         </div> 
       </div>
       <!--End 3rd column-->
       
       <!--Start 4th column-->
       <div class="col-lg-3 col-sm-6">
         <div class="card shadow-lg mb-2">
           <div class="card-body text-center">
             <img src="images/images.jpg" class="img-fluid" style="border-radius:100px;"><h4 class="card-title font-italic pt-1">Priya Kumari</h4>
             <p class="card-text">It has survived not only five centuries, but also the leap into electronic typesetting,remaining essentially unchanged.</p>
           </div>
         </div> 
       </div>
       <!--End 4th column-->
    </div>
    </div>
 </div>
 <!--End Happy Customer-->
 
	 <!--Start Contact Us-->
 		<?php 
			include_once("contactUs.php");
		?>
     <!--End Contact Us-->
     
     <!--Start 2nd column-->
     <div class="col-md-4 text-center mt-5">
     	<strong>Headquarter:</strong>
        OSMS Pvt Ltd,<br/>
        Garage Square,<br/>
        BBSR,Odisha-750021<br/>	
        Contact:8763087630<br/>
        <a href="#" target="_blank">www.osms.com</a><br/><br/><br/>
        <strong>Branch:</strong>
        OSMS Pvt Ltd,<br/>
        Angul,<br/>
        Odisha-759128<br/>	
        Contact:8763087630<br/>
        <a href="#" target="_blank">www.osms.com</a>
     </div>
     <!--End 2nd column-->
     </div>
 </div>
 <!--End Contact Us-->
 
 <!--Start Footer-->
 <footer class="container-fluid bg-dark mt-5 text-white" >
   <div class="container">
     <div class="row py-3">
     <!--Start 1st column-->
       <div class="col-md-6">
       	<span class="pr-2">Follow Us:</span>
        <a href="#" target="_blank" class="pr-2"><i class="fab fa-facebook-f"></i></a>
        <a href="#" target="_blank" class="pr-2"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank" class="pr-2"><i class="fab fa-youtube"></i></a>
        <a href="#" target="_blank" class="pr-2"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" target="_blank" class="pr-2"><i class="fas fa-rss"></i></a>
       </div>
     <!--End 1st column-->
     
     <!--Start 2nd column-->
     <div class="col-md-6 text-right">
     	<small>Designed By Cubiclespace &copy; 2020</small>
        <small class="ml-2"><a href="admin/adminlogin.php">Admin Login</a></small>
     </div>
     <!--End 2nd column-->
     </div>
   </div>
 
 </footer>
 <!--End Footer--> 
  <!--Bootstrap JavaScript -->
  	<script src="js/jquery.min.js"></script>
  	<script src="js/popper.min.js"></script>
   	<script src="js/bootstrap.min.js"></script>
   	<script src="js/all.min.js"></script>
</body>
</html>