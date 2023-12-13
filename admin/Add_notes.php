<?php
include('db.php');
if (isset($_SESSION['auth_user'])) {
    $_SESSION['errormsg'] = "Please Login With ID First!";
    header("location:../login.php");
};
session_start();
$con = mysqli_connect('localhost','root','','estudies');

$link = "";
$link_status = "display: none;";

if (isset($_POST['upload'])) { // If isset upload button or not
	// Declaring Variables
	$location = "uploads/";
	$file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
	$file_name = $_FILES["file"]["name"]; // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
	$file_size = $_FILES["file"]["size"];
	$title = $_POST['title'];
	$teacher = $_POST['teachername'];
	$subject = $_POST['subject'];// Get uploaded file size

	/*
	How we can get mb from bytes
	(mb*1024)*1024

	In my case i'm 10 mb limit
	(10*1024)*1024
	*/

	if ($file_size > 10485760) { // Check file size 10mb or not
		echo "<script>alert('Woops! File is too big. Maximum file size allowed for upload 10 MB.')</script>";
	} else {
		$sql = "INSERT INTO study_notes (title,teachername,subject,new_name)
				VALUES ('$title','$teacher','$subject', '$file_new_name')";
		$result = mysqli_query($con, $sql);
		if ($result) {
			move_uploaded_file($file_temp, $location . $file_new_name);
			echo "<script>alert('Wow! File uploaded successfully.')</script>";
			// Select id from database
			$sql = "SELECT id FROM study_notes ORDER BY id DESC";
			$result = mysqli_query($con, $sql);
			if ($row = mysqli_fetch_assoc($result)) {
				$link = $base_url . "download.php?id=" . $row['id'];
				$link_status = "display: block;";
			}
		} else {
			echo "<script>alert('Woops! Something wong went.')</script>";
		}
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
	

	
	<link rel="icon" href="assets/images/Untitled_design__36_-removebg-preview.png" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/Untitled_design__36_-removebg-preview.png" />
	
	<title>EStudies</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	

	<header class="ttr-header">
		<div class="ttr-header-wrapper">

			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-close ttr-open-icon"></i>
				<i class="ti-menu ttr-close-icon"></i>
			</div>

			<div class="ttr-logo-box">
				<div>
					<a href="../index.html" class="ttr-logo">
						<img class="ttr-logo-mobile" alt="" src="assets/images/logo main.jpeg" width="30" height="30">
						<img class="ttr-logo-desktop" alt="" src="assets/images/logo main.jpeg" width="160" height="27">
					</a>
				</div>
			</div>

			<div class="ttr-header-menu">

				<ul class="ttr-header-navigation">
					<li>
						<a href="../index.php" class="ttr-material-button ttr-submenu-toggle">HOME</a>
					</li>
				</ul>
	
			</div>
			<div class="ttr-header-right mr-4">

			</div>
		
		
	</header>

	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">

			<div class="ttr-sidebar-logo">
				
				<div class="ttr-sidebar-toggle-button">
					<i class="ti-arrow-left"></i>
				</div>
			</div>

			<nav class="ttr-sidebar-navi">
				<ul>
					<li>
						<a href="index.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Dashboard</span>
		                </a>
		            </li>
				
					<?php if($_SESSION['auth_user']['category'] == "Admin"): ?>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-calendar"></i></span>
		                	<span class="ttr-label">Student</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
                        <li>
		                		<a href="add_progress.php" class="ttr-material-button"><span class="ttr-label">Add Progress</span></a>
		                	</li>
		                	
		                	<li>
		                		<a href="Student_list.php" class="ttr-material-button"><span class="ttr-label">Student List</span></a>
		                	</li>
                            <li>
		                		<a href="academic_progress.php" class="ttr-material-button"><span class="ttr-label">Academic progress</span></a>
		                	</li>
		                </ul>
		            </li>
					<?php elseif($_SESSION['auth_user']['category'] == "Teacher"): ?>
						<?php 
							$for_status_teach_id = $_SESSION['auth_user']['user_id'];
							if ($status_query = mysqli_query($con, "SELECT `status` FROM `users` WHERE `user_id`=$for_status_teach_id")) {
								$fetch_status = mysqli_fetch_array($status_query);
							
							if ($fetch_status['status'] == "Active") { ?>
							<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-calendar"></i></span>
		                	<span class="ttr-label">Student</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
						<li>
		                		<a href="add_progress.php" class="ttr-material-button"><span class="ttr-label">Add Progress</span></a>
		                	</li>
                            <li>
		                		<a href="academic_progress.php" class="ttr-material-button"><span class="ttr-label">Academic progress</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-notepad"></i></span>
		                	<span class="ttr-label">Study notes</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="Add_notes.php" class="ttr-material-button"><span class="ttr-label"> Add notes</span></a>
		                	</li>
		                	<li>
		                		<a href="all_notes.php" class="ttr-material-button"><span class="ttr-label">All notes</span></a>
		                	</li>
                          
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-alarm-clock"></i></span>
		                	<span class="ttr-label">Revision class</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="Add_revisionclass.php" class="ttr-material-button"><span class="ttr-label"> Add new</span></a>
		                	</li>
		                	<li>
		                		<a href="Show_class.php" class="ttr-material-button"><span class="ttr-label">Show all</span></a>
		                	</li>
                          
		                </ul>
		            </li> <?php }
						if ($fetch_status['status'] == "inactive") { ?>
					<?php	}} ?>
					<?php endif; ?>
					<?php if($_SESSION['auth_user']['category'] == "Parents"): ?>
						<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-calendar"></i></span>
		                	<span class="ttr-label">Student</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
                            <li>
		                		<a href="academic_progress.php" class="ttr-material-button"><span class="ttr-label">Academic progress</span></a>
		                	</li>
		                </ul>
		            </li>
					<?php endif; ?>
					<?php if($_SESSION['auth_user']['category'] == "Student"): ?>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-calendar"></i></span>
		                	<span class="ttr-label">Student</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
                            <li>
		                		<a href="academic_progress.php" class="ttr-material-button"><span class="ttr-label">Academic progress</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-notepad"></i></span>
		                	<span class="ttr-label">Study notes</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="all_notes.php" class="ttr-material-button"><span class="ttr-label">All notes</span></a>
		                	</li>
                          
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-alarm-clock"></i></span>
		                	<span class="ttr-label">Revision class</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="Show_class.php" class="ttr-material-button"><span class="ttr-label">Show all</span></a>
		                	</li>
                          
		                </ul>
		            </li>
					<?php endif; ?>
					<?php if($_SESSION['auth_user']['category'] == "Admin"): ?>
						<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-notepad"></i></span>
		                	<span class="ttr-label">Study notes</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="Add_notes.php" class="ttr-material-button"><span class="ttr-label"> Add notes</span></a>
		                	</li>
		                	<li>
		                		<a href="all_notes.php" class="ttr-material-button"><span class="ttr-label">All notes</span></a>
		                	</li>
                          
		                </ul>
		            </li>
					
                    			<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-alarm-clock"></i></span>
		                	<span class="ttr-label">Revision class</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="Add_revisionclass.php" class="ttr-material-button"><span class="ttr-label"> Add new</span></a>
		                	</li>
		                	<li>
		                		<a href="Show_class.php" class="ttr-material-button"><span class="ttr-label">Show all</span></a>
		                	</li>
                          
		                </ul>
		            </li>
					<?php endif; ?>
                        			<li>
						<a href="helpline.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-mobile"></i></span>
		                	<span class="ttr-label">Helpline</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	
		                	<li>
		                		<a href="helpline.php" class="ttr-material-button"><span class="ttr-label">Show all</span></a>
		                	</li>
                          
		                </ul>
						
		            </li>
					<?php if($_SESSION['auth_user']['category'] == "Admin"): ?>
                         			<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-book"></i></span>
		                	<span class="ttr-label">Teacher</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	
		                	<li>
		                		<a href="request_approval.php" class="ttr-material-button"><span class="ttr-label">Request approvel</span></a>
		                	</li>
                          
		                </ul>
		            </li>
                    <?php endif; ?>
					<a href="../logout.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-close"></i></span>
		                	<span class="ttr-label">Logout</span>
		                </a>
					
				
					<li>
					
		            
		            </li>
		            <li class="ttr-seperate"></li>
				</ul>

			</nav>

		</div>
	</div>

	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Add notes</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Add notes</li>
				</ul>
			</div>	
			<div class="row">

				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Add notes</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Basic info</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Note title</label>
										<div>
											<input class="form-control" type="text" value="" name="title">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Teacher Name</label>
										<div>
											<input class="form-control" type="text" value="" name="teachername">
										</div>
								
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Subject</label>
										<div>
											<input class="form-control" type="text" value="" name="subject">
										</div>
										<div class="form-group col-5">
										
										<input type="file" name="file" id="upload" required>
										</div>
									
									</div>
									<div class="col-12 mt-1">
										
										<input type="submit" name="upload">
									</div>
									
														
														</div>
													</div>
												</td>
											</tr>
										</table>
									</div>
									
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
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
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
<script>
// Pricing add
	function newMenuItem() {
		var newElem = $('tr.list-item').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#item-add');
	}
	if ($("table#item-add").is('*')) {
		$('.add-item').on('click', function (e) {
			e.preventDefault();
			newMenuItem();
		});
		$(document).on("click", "#item-add .delete", function (e) {
			e.preventDefault();
			$(this).parent().parent().parent().parent().remove();
		});
	}
</script>
</body>

</html>