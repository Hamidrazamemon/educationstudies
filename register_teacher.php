<?php
session_start();
include('db.php');
?>
<?php
if(isset($_POST['submit']))
{
$to = "raza228794@gmail.com";
$name = $_POST['FName'];
$sender = $_POST['email'];

if(mail($to,$name,$message))
{
	echo"<script>New User Registered</script>";
}
else{
	echo"<script>Failed</script>";
	}
	
// send message to USER as a Reply

$to1 = $_POST['email'];
$name1 = $_POST['FName'];
$sender1 = "info@estudies.com";
$subject1 = "eStudiez";
$message1 = "Welcome to the eStudiez";

if(mail($to1,$subject1,$message1,$sender1))
{
	echo"<script>Email Has Been Sent</script>";
}
else{
	echo"<script>Email Sending Failed</script>";
	}

	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
.dropbtn {
  background-color:orange;
  color: black;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}




.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 230px;
  overflow: auto;
  
  z-index: 1;
}

.dropdown-content a {
  
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}



.show {display: block;}
</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<meta name="description" content="" />
	
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<link rel="icon" href="admin/assets/images/Untitled_design__36_-removebg-preview.png" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="admin/assets/images/Untitled_design__36_-removebg-preview.png" />
	
	<title>Register </title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
		<a href="index.php"><img src="admin/assets/images/logo main.jpeg" alt="" style="border-radius: 50%; width:50%;"></a>
		</div>
			<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Sign Up <span>Now</span></h2>
					<p>Login Your Account <a href="login.php">Click here</a></p>
					<br>
					
  <button  class="dropbtn"><a href="register_parent.php">Parents</a></button>&nbsp;
  <button  class="dropbtn"><a href="register_student.php">Student</a></button>&nbsp;
<button  class="dropbtn"><a href="register_teacher.php">Teacher</a></button>
<br>
<br>
				
				<form class="contact-bx" method="POST">
					<div class="row placeani">
					<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<input name="category" type="hidden" readonly value="Teacher" required class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>First Name</label>
									<input name="FName" type="text" required class="form-control">
								</div>
							</div>
						</div>
                        <div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Last Name</label>
									<input name="LName" type="text" required class="form-control">
								</div>
							</div>
						</div>
                        <div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Contact</label>
									<input name="contact" type="text" required class="form-control">
								</div>
							</div>
						</div>
                        <div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Subject</label>
									<input name="subject" type="text" required class="form-control">
								</div>
							</div>
						</div>
					

  


 
    
 
  <br><br>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Email Address</label>
									<input name="email" type="email" required class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Your Password</label>
									<input name="pass" type="password" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Sign Up</button>
						</div>
						</div>
					</div>
				
					<p>Login Your Account <a href="login.php">Click here</a></p>
				</div>	

						
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
        if (isset($_POST['submit'])) {
            $fname = $_POST['FName'];
			$lname = $_POST['LName'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
			$contact = $_POST['contact'];
            $password = $_POST['pass'];
			$category = $_POST['category'];
			

            $run = mysqli_query($con, "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `category`, `contact`, `subject`) VALUES('$fname','$lname','$email','$password','$category','$contact','$subject')");
            if ($run) {
                ?>
                <script>
                    window.location.href="login.php";
                </script>
                <?php
            }
        }
        ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/contact.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
</body>

</html>
