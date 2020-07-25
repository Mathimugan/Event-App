<?php
include('connection.php');
session_start();
if(isset($_POST['submit']))
{
$token=mysqli_real_escape_string($db,$_POST['form_token']);
echo $_SESSION['form_token'];
if($token == $_SESSION['form_token'])
{
$_SESSION['form_token'] = null;
$event_id=mysqli_real_escape_string($db,$_POST['event_id']);
if($event_id!=''|| $event_id!=null){
$pic_q = mysqli_query($db,"SELECT * FROM events WHERE event_id = '".$event_id."' ");
$pic_r = mysqli_fetch_object($pic_q);
unlink('uploads/'.$pic_r->refer_name);
mysqli_query($db,"delete from events where event_id='".$event_id."'");
}		
}
header("location:events.php");
exit();	
}
?>