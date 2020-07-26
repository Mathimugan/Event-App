<?php
include('connection.php');
session_start();
if(isset($_POST['submit']))
{
$event_id=mysqli_real_escape_string($db,$_POST['book_event_id']);
$user_id=mysqli_real_escape_string($db,$_POST['user_id']);
mysqli_query($db,"insert into bookings set event_id='".$event_id."',
name='".$user_name."',email='".$user_email."',created_date=now(),user_id='".$user_id."'");	
header("location:bookings.php");
exit();	
}
?>