<?php
include('connection.php');
session_start();
if(isset($_POST['submit']))
{
$event_id=mysqli_real_escape_string($db,$_POST['book_event_id']);
$user_name=mysqli_real_escape_string($db,$_POST['user_name']);
$user_email=mysqli_real_escape_string($db,$_POST['user_email']);
$user_password=mysqli_real_escape_string($db,$_POST['user_password']);
$hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
mysqli_query($db,"insert into users set name='".$user_name."',
password='".$hashed_password."',status='Active',email_id='".$user_email."',created_date=now()") or die(mysqli_error($db));
$user_id=mysqli_insert_id($db);
mysqli_query($db,"insert into user_group set group_name='User',user_view='0',user_edit='0',
user_delete='0',user_id='".$user_id."'") or die(mysqli_error($db));
if($event_id!=''|| $event_id!=null)
{
mysqli_query($db,"insert into bookings set event_id='".$event_id."',
name='".$user_name."',email='".$user_email."',created_date=now(),user_id='".$user_id."'");
}		
header("location:login.php");
exit();	
}
?>