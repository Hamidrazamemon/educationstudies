<?php
session_start();
$con = mysqli_connect('localhost','root','','estudies');
if (!isset($_SESSION['auth_user'])) {
    $_SESSION['errormsg'] = "Please Login With ID First!";
    header("location:../login.php");
}
?>
<?php
session_start();
$con = mysqli_connect('localhost','root','','estudies');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete</title>
</head>
<body>
<?php
$user_id = $_GET['user_id'];
$query = "delete from users where user_id = '$user_id'";
$row = mysqli_query($con,$query);

if($row)
{
    header("location: request_approval.php");
	}
	else{
		echo"Data not deleted";
		}

?>
</body>
</html>