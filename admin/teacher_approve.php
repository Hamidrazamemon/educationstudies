<?php
session_start();
include('db.php');
if (!isset($_SESSION['auth_user'])) {
    $_SESSION['errormsg'] = "Please Login With ID First!";
    header("location:../login.php");
}
?>
<?php
$con = mysqli_connect('localhost','root','','estudies');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>
</head>
<body>
<?php
$user_id = $_GET['user_id'];
$query = "update users set status = 'Active' where user_id = $user_id";
$row = mysqli_query($con,$query);

if($row)
{
    echo "<script>alert('Teacher has been approved.')</script>";
	echo"<script>window.open('index.php','_self')</script>";
	}
	else{
		echo "<script>alert('Not Approved.')</script>";
		};
?>
</body>
</html>