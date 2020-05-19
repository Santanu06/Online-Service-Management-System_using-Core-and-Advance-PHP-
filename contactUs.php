 <?php 
  if(isset($_REQUEST['submit'])){
    if(($_REQUEST['cName'] == '')||($_REQUEST['cSubject'] == '')||($_REQUEST['cEmail'] == '')||($_REQUEST['cMessage'] == '')){
      $msg='<div class="alert alert-warning">Please Fill All Fields</div>';
    }else{
      $cName=$_REQUEST['cName'];
      $cSubject=$_REQUEST['cSubject'];
      $cEmail=$_REQUEST['cEmail'];
      $cMessage=$_REQUEST['cMessage'];

      $mailTo="santanukumarsahu876@gmail.com";
      $header="Form : ".$cEmail;
      $text="You have received an email from " .$cName.".\n\n".$cMessage;
      mail($mailTo,$cSubject,$text,$header);
      $msg='<div class="alert alert-success">Sent Successfully</div>';
    }
  }
 ?>
 <!--Start Contact Us-->
 <div class="container" id="contact">
   <h2 class="text-center">Contact Us</h2>
     <div class="row">
     <!--Start 1st column-->
       <div class="col-md-8">
       	<form action="#" method="post" >
          <div class="form-group">
            <label for="name" class="font-weight-bold" >Name</label>
            <input type="text" class="form-control" name="cName" placeholder="Enter Name"/>
          </div>          
          <div class="form-group">
            <label for="subject" class="font-weight-bold" >Subject</label>
            <input type="text" class="form-control" name="cSubject" placeholder="Enter Subject"/>
          </div>          
          <div class="form-group">
            <label for="email" class="font-weight-bold">Email Id</label>
            <input type="email" class="form-control" name="cEmail" placeholder="Enter Email Id"/>
          </div>          
          <div class="form-group">
            <label for="message" class="font-weight-bold">Message</label>
            <textarea class="form-control" placeholder="Enter Your Message" name="cMessage"></textarea>
          </div>          
          <input type="submit" class="btn btn-primary" value="Send" name="submit"/>
        </form>
       </div>
     <!--End Contact Us-->