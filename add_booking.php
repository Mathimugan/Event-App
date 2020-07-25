<?php
include('connection.php');
session_start();
if(isset($_POST['submit']))
{
$token=mysqli_real_escape_string($db,$_POST['book_form_token']);
echo $token;
echo '<br/>';
echo $_SESSION['book_form_token'];
if($token == $_SESSION['book_form_token'])
{
$_SESSION['form_token'] = null;
$event_id=mysqli_real_escape_string($db,$_POST['book_event_id']);
$user_name=mysqli_real_escape_string($db,$_POST['user_name']);
$user_email=mysqli_real_escape_string($db,$_POST['user_email']);
if($event_id!=''|| $event_id!=null)
{
mysqli_query($db,"insert into bookings set event_id='".$event_id."',
name='".$user_name."',email='".$user_email."',created_date=now()");
}		
}
header("location:index");
exit();	
}
?>