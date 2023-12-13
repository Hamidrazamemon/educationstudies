<?php
session_start();
include ('db.php');
if (!isset($_SESSION['Admin'])) {
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
						<a href="../index.html" class="ttr-material-button ttr-submenu-toggle">HOME</a>
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
				<h4 class="breadcrumb-title"><strong>Student</strong></h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Student List</li>
                    
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Student
							</h4>
							<span class="wc-des">
							
							</span>
							<span class="wc-stats">
								<span class="counter"><?php echo $con->query("SELECT * FROM student where category ='Student'")->num_rows; ?></span>
							</span>		
							<div class="progress wc-progress">
							
							</div>
							<span class="wc-progress-bx">
							
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								 Total Teachers
							</h4>
							<span class="wc-des">
								
							</span>
							<span class="wc-stats">
									<span class="counter"><?php echo $con->query("SELECT * FROM users where category ='Teacher'")->num_rows; ?></span>
							</span>		
							<div class="progress wc-progress">
							
							</div>
							<span class="wc-progress-bx">
								
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Resources
							</h4>
							<span class="wc-des">
								
							</span>
							<span class="wc-stats ">
									<span class="counter"><?php echo $con->query("SELECT * FROM study_notes")->num_rows; ?></span>
							</span>		
							<div class="progress wc-progress">
					
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									
								</span>
								<span class="wc-number ml-auto">
									
								</span>
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
				</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4><center>Student List</center></h4>
                            
</div>
<br>
<table border="1" >
  <tr>
    <th>Student ID</th>
    <th>Name</th>
    <th>Email</th>
  	<th>Age</th>
    <th>Class</th>
    </tr>
	<?php 
	   $query = "SELECT * from student WHERE category = 'Student'";
	   $run = mysqli_query($con,$query);
	   while($row= $run->fetch_assoc()):
	   ?>
  <tr>
    <td><?php echo ucwords($row['id']) ?></td>
    <td><?php echo ucwords($row['name']) ?></td>
    <td><?php echo ucwords($row['email']) ?></td>
     <td><?php echo ucwords($row['age']) ?></td>
     <td><?php echo ucwords($row['class']) ?></td>
  </tr>
  <?php endwhile; ?>
</table>
						
					
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
<script src='assets/vendors/calendar/moment.min.js'></script>
<script src='assets/vendors/calendar/fullcalendar.js'></script>

<script>
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2019-03-12',
      navLinks: true, 

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, 
      events: [
        {
          title: 'All Day Event',
          start: '2019-03-01'
        },
        {
          title: 'Long Event',
          start: '2019-03-07',
          end: '2019-03-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-03-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-03-11',
          end: '2019-03-13'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T10:30:00',
          end: '2019-03-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-03-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-03-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-03-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-03-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-03-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-03-28'
        }
      ]
    });

  });

</script>
</body>

</html>