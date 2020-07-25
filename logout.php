<?php
	session_start();
	if(!isset($_SESSION['user_id']))
{
// not logged in
header('Location: login.php');
exit();
}
	session_destroy();
	header("location:index.php");
?>