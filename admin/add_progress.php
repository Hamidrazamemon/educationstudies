<?php
session_start();
include ('db.php');
if (!isset($_SESSION['auth_user'])) {
    $_SESSION['errormsg'] = "Please Login With ID First!";
    header("location:../login.php");
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
				<h4 class="breadcrumb-title">Add Progress</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Academic Progress</li>
				</ul>
			</div>	
			<div class="row">

				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Add Academic Progress</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" method="POST">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>Basic info</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Student Name</label>
										<?php if($_SESSION['auth_user']['category'] == "Student"): ?>
                                        <select name="std_id" class="select">
											<option>Select Student</option>
                                        <?php 
										$teach_id = $_SESSION['auth_user']['teacher_id'];
										$user_id = $_SESSION['auth_user']['id'];
										echo $teach_id;
										echo $user_id;
                  $query1 = $con->query("SELECT id,name FROM student WHERE teacher_id='$teach_id' AND id ='$user_id'");
                    while($row = mysqli_fetch_array($query1)){
                ?>
                           <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                           <?php }?>
                              </select>
							  <?php endif; ?>
							  <?php if($_SESSION['auth_user']['category'] == "Admin"): ?>
                                        <select name="std_id" class="select">
										<option>Select Student</option>
                                        <?php 
                  $query1 = $con->query("SELECT id,name FROM student WHERE category='Student'");
                    while($row = mysqli_fetch_array($query1)){
                ?>
                           <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                           <?php }?>
                              </select>
							  <?php endif; ?>
							  <?php if($_SESSION['auth_user']['category'] == "Parents"): ?>
                                        <select name="std_id" class="select">
											<option>Select Student</option>
                                        <?php 
										$student_id = $_SESSION['auth_user']['student_id'];
										$user_id = $_SESSION['auth_user']['id'];
										echo $student_id;
										echo $user_id;
                  $query1 = $con->query("SELECT id,firstname FROM parent WHERE student_id='$student_id' AND id ='$user_id'");
                    while($row = mysqli_fetch_array($query1)){
                ?>
                           <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?></option>
                           <?php }?>
                              </select>
							  <?php endif; ?>
							  <?php if($_SESSION['auth_user']['category'] == "Teacher"): ?>
                                        <select name="std_id" class="select">
											<option>Select Student</option>
                                        <?php 
										$id = $_SESSION['auth_user']['user_id'];
										echo $id;
                  $query1 = $con->query("SELECT id,name FROM student WHERE teacher_id='$id'");
                    while($row = mysqli_fetch_array($query1)){
                ?>
                           <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                           <?php }?>
                              </select>
							  <?php endif; ?>
                              </select>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Attendance</label>
										<div>
											<input class="form-control" type="text" name="attendance">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Class Performance</label>
										<div>
											<input class="form-control" type="text" name="performance">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Class Behaviour</label>
										<div>
											<input class="form-control" type="text" name="behaviour">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Overall Tests Number</label>
										<div>
											<input class="form-control" type="text" name="test_num">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Grade</label>
										<div>
											<input class="form-control" type="text" name="grade">
										</div>
									</div>
									<div class="col-12 mt-1">
                                    <button name="submit" type="submit" value="Submit" class="btn">Save</button>
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


    <?php
        if (isset($_POST['submit'])) {
            $std_id = $_POST['std_id'];
			$attendance = $_POST['attendance'];
            $performance = $_POST['performance'];
            $behaviour = $_POST['behaviour'];
			$test_num = $_POST['test_num'];
			$grade = $_POST['grade'];

            $run = mysqli_query($con, "INSERT INTO academic_report (`attendance`, `class_perform`, `class_behaviour`, `tests_num`, `grade`, `std_id`) VALUES('$attendance','$performance', '$behaviour','$test_num','$grade','$std_id')");
            if ($run) {
                ?>
                <script>
                    window.location.href="index.php";
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