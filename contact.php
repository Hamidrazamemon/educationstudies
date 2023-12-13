<?php
if(isset($_POST['btnsubmit']))
{
$to = "raza228794@gmail.com";
$name = $_POST['name'];
$sender = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(mail($to,$subject,$message,$sender))
{
	echo"<script>Email Has Been Sent</script>";
}
else{
	echo"<script>Email Sending Failed</script>";
	}
	
// send message to USER as a Reply

$to1 = $_POST['email'];
$name1 = $_POST['name'];
$sender1 = "info@estudies.com";
$subject1 = "eStudiez";
$message1 = "Email Recevied! we will get back to you shortly...";

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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" />
	<meta property="og:title" />
	<meta property="og:description"/>
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="admin/assets/images/Untitled_design__36_-removebg-preview.png" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="admin/assets/images/Untitled_design__36_-removebg-preview.png" />
	<title>EStudies </title>
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
    <header class="header rs-nav">
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						
					</div>
					<div class="topbar-right">
						<ul>
							<li><a href="login.php">Login</a></li>
							<li><a href="register_student.php">Register</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
			
					<div class="menu-logo">
						<a href="index.php"><img src="admin/assets/images/logo1.png" style="max-height: 84px;"></a>
					</div>
				
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
								<li><a href="https://www.facebook.com/" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.google.com/;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="https://www.linkedin.com/login;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
							</ul>
						</div>
                    </div>
			
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                        <ul class="nav navbar-nav">	
							<li class="active"><a href="index.php">Home</i></a>
                            <li ><a href="about.php">About</i></a>
					<li ><a href="contact.php">Contact</i></a>
					<li ><a href="Feedback.php">Feedback</i></a>
					<li ><a href="portfolio.php">Portfolio</i></a></li>
					<li ><a href="sitemap.php">Site-map</i></a></li>
						
                    </div>
					
                </div>
            </div>
        </div>
    </header>
    <div class="page-content bg-white">
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner3.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Contact Us</h1>
				 </div>
            </div>
        </div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Contact Us</li>
				</ul>
			</div>
		</div>
        <div class="page-banner contact-page section-sp2">
            <div class="container">
                <div class="row">
					<div class="col-lg-5 col-md-5 m-b30">
						<div class="bg-primary text-white contact-info-bx">
							<h2 class="m-b10 title-head">Contact <span>Information</span></h2>
							<p>Contact us for any queries.</p>
							<div class="widget widget_getintuch">	
								<ul>
									<li><i class="ti-location-pin"></i>75k Newcastle St. Ponte Vedra Beach, FL 309382 New York</li>
									<li><i class="ti-mobile"></i>0800-123456 (24/7 Support Line)</li>
									<li><i class="ti-email"></i>info@estudies.com</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-md-7">
						<form class="contact-bx ajax-form" method="POST">
						<div class="ajax-message"></div>
							<div class="heading-bx left">
								<h2 class="title-head">Get In <span>Touch</span></h2>
								<p>Fill up your details below...</p>
							</div>
							<div class="row placeani">
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group">
											<label>Your Name</label>
											<input name="name" type="text" required class="form-control valid-character">
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group"> 
											<label>Your Email Address</label>
											<input name="email" type="email" class="form-control" required >
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group">
											<label>Subject</label>
											<input name="subject" type="text" required class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Type Message</label>
											<textarea name="message" rows="4" class="form-control" required ></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<button name="btnsubmit" type="submit" class="btn button-md"> Send Message</button>
								</div>
							</div>
						</form>
					</div>
				</div>
            </div>
		</div>
    </div>
   <footer>
        <div class="footer-top">
			<div class="pt-exebar">
				<div class="container">
					<div class="d-flex align-items-stretch">
						<div class="pt-logo mr-auto">
							<a href="index.html"><img src="admin/assets/images/Orange___Blue_Modern_Smart_Tutoring_Logo__8_-removebg-preview.png" alt="" height="150px;" width="120px;"/></a>
						</div>
						<div class="pt-social-link">
							<ul class="list-inline m-a0">
								<li><a href="https://www.facebook.com/" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/i/flow/login" class="btn-link"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/login" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<div class="pt-btn-join">
							<a href="register_student.php" class="btn ">Join Now</a>
						</div>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
                        <div class="widget">
                            
                           
								</form>
							</div>
                        </div>
                    </div>
					<div class="col-12 col-lg-5 col-md-7 col-sm-12">
						<div class="row">
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Company</h5>
									<ul>
										<li><a href="index.php">Home</a></li>
										<li><a href="about.php">About</a></li>
									
										<li><a href="contact.php">Contact</a></li>
									</ul>
								</div>
							</div>
							
					<div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
                        <div class="widget widget_gallery gallery-grid-4">
                            <h5 class="footer-title">Our Gallery</h5>
                            <ul class="magnific-image">
								<li><a href="assets/images/gallery/pic1.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic1.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic2.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic2.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic3.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic3.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic4.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic4.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic5.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic5.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic6.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic6.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic7.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic7.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic8.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic8.jpg" alt=""></a></li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center"><a target="_blank" href="#">Estudies</a></div>
                </div>
            </div>
        </div>
    </footer>
    <button class="back-to-top fa fa-chevron-up" ></button>
</div>
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
</body>

</html>
