<?php
session_start();
include ('db.php');
if (!isset($_SESSION['auth_user'])) {
    $_SESSION['errormsg'] = "Please Login With ID First!";
    header("location:../login.php");
}
error_reporting(0);
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
						<a href="#" class="ttr-material-button">
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
				<h4 class="breadcrumb-title">Academic Progress </h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Academic Progress</li>
				</ul>
			</div>	

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

			<div class="row">

				<div class="col-lg-8 m-b30">
					
				</div>

			
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4><center>Student Academic Progress</center></h4>
						</div>
                        <form action="" method="post">
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
							  
<input type="submit" name="submit">
</form>

<?php
    $std_id = $_GET['user_id'];
    $attendance = $_GET['attendance'];
    $class_perform = $_GET['class_perform'];
    $class_behaviour = $_GET['class_behaviour'];
    $tests_num = $_GET['tests_num'];
    $grade = $_GET['grade'];
    
if(isset($_POST['submit'])){
    $std_id = $_POST['std_id'];
    $attendance = $_POST['attendance'];
    $class_perform = $_POST['class_perform'];
    $class_behaviour = $_POST['class_behaviour'];
    $tests_num = $_POST['tests_num'];
    $grade = $_POST['grade'];

    $query ="SELECT std_id, attendance, class_perform, class_behaviour, tests_num, grade FROM academic_report WHERE std_id='$std_id'";

    $row = mysqli_query($con,$query);
    $totalrow = mysqli_num_rows($row);
    if ($totalrow != 0)
    { ?>
        <div class="table-responsive custom-table-responsive">
       <table class="table custom-table">
	<thead>
    <tr>
	<th scope="col">ID</th>
	<th scope="col">Attendance</th>
	<th scope="col">class_perform</th>
	<th scope="col">Class Behaviour</th>
	<th scope="col">Tests Num</th>
	<th scope="col">Grade</th>
	<th scope="col">Action</th>
	</tr>
    </thead>
    <?php
       while($data = mysqli_fetch_assoc($row))
	   {
		   echo"<tr>
		   <td>". $data['std_id']."</td>
		   <td>". $data['attendance']."</td>
		   <td>". $data['class_perform']."</td>
		   <td>". $data['class_behaviour']."</td>
		   <td>". $data['tests_num']."</td>
		   <td>". $data['grade']."</td>
		   <td><a href='progress_update.php?std_id=$data[std_id]&attendance=$data[attendance]&class_perform=$data[class_perform]&class_behaviour=$data[class_behaviour]&tests_num=$data[tests_num]&grade=$data[grade]'>EDIT</a></td>
		   </tr>";
	   }
}
     else
		{
			echo"No Records Found";
			}}
	?>
    </table></div>


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
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
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