<?php
session_start();
include('db.php');
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
    </header>			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row">
						 <div class="col-lg-6 m-b30">
							<h2 class="title-head ">Began your eductional skills<br> <span class="text-primary"> on your time</span></h2>
							<h4><span class="counter"><?php echo $con->query("SELECT * FROM study_notes")->num_rows; ?></span> Resources</h4>
							<p>Education is the process which aids learning, acquiring knowledge and skills to one's character. Education upgrades the thinking of society and helps to uproot social evils. It helps the uniform development of a country by fighting the inequalities of society</p>
							<a href="register_student.php" class="btn button-md">Join Now</a>
						 </div>
						 <div class="col-lg-6">
							 <div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="assets/images/icon/icon1.png" alt=""></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">Our Philosophy</h5>
											<p>To graduate people.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="assets/images/icon/icon2.png" alt=""></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">Kingster's Principle</h5>
											<p>Boosts the skills of those who are eligible to gain success.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="assets/images/icon/icon3.png" alt=""></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">Key Of Success</h5>
											<p>Education is the key of success.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="assets/images/icon/icon4.png" alt=""></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">Our Philosophy</h5>
											<p>Skills develop a man and makes a man perfect.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			
			<div class="section-area section-sp1 bg-fix ovbl-dark text-white" style="background-image:url(assets/images/background/bg1.jpg);">
                <div class="container">
					<div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                                <div class="counter-style-1">
                                    <div class="text-white">
										<span class="counter">1</span><span>+</span>
									</div>
									<span class="counter-text">Branches</span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                                <div class="counter-style-1">
									<div class="text-white">
										<span class="counter"><?php echo $con->query("SELECT * FROM student")->num_rows; ?></span><span>+</span>
									</div>
									<span class="counter-text">Students</span>
								</div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                                <div class="counter-style-1">
									<div class="text-white">
										<span class="counter"><?php echo $con->query("SELECT * FROM users where category='Teacher'")->num_rows; ?></span><span>+</span>
									</div>
									<span class="counter-text">Faculty members</span>
								</div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                                <div class="counter-style-1">
									<div class="text-white">
										<span class="counter"><?php echo $con->query("SELECT * FROM study_notes")->num_rows; ?></span><span>+</span>
									</div>
									<span class="counter-text">Resources</span>
								</div>
                            </div>
                        </div>
				</div>
			</div>
			<div class="section-area section-sp2">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head text-uppercase">what people <span>say</span></h2>
							<p>Our happy and successful students.</p>
						</div>
					</div>
					<div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="assets/images/testimonials/pic1.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h5 class="name">Fatima Khan</h5>
									<p>-Doctor</p>
								</div>
								<div class="testimonial-content">
									<p>It is an enthusiastic learner who seems to enjoy school.
exhibits a positive outlook and attitude in the classroom.
appears well rested and ready for each day's activities.
shows enthusiasm for classroom activities.
shows initiative and looks for new ways to get involved</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="assets/images/testimonials/pic2.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h5 class="name">Hussain Abbas</h5>
									<p>Engineer</p>
								</div>
								<div class="testimonial-content">
									<p>It is a conscientious, hard-working student.
works independently.
is a self-motivated student.
consistently completes homework assignments.
puts forth their best effort into homework assignments.
exceeds expectations with the quality of their work.
readily grasps new concepts and ideas.</p>
								</div>
							</div>
						</div>
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
