<?php
include('connection.php');
session_start();
if(!isset($_SESSION['user_id']))
{
// not logged in
header('Location: login.php');
exit();
}
if(isset($_POST['submit']))
{
$token=mysqli_real_escape_string($db,$_POST['token']);
if($token == $_SESSION['form_token'])
{
$_SESSION['form_token'] = null;
$event_title = mysqli_real_escape_string($db,$_POST['event_title']);
$event_date = mysqli_real_escape_string($db,$_POST['event_date']);
$time = date_create($_POST['event_time']);
$event_time=date_format($time, 'H:i');
$event_description = mysqli_real_escape_string($db,$_POST['event_description']);
$event_description=trim($event_description);
mysqli_query($db,"insert into events set event_title='".$event_title."',
event_date=STR_TO_DATE('".$event_date."','%Y-%m-%d'),
event_time='".$event_time."',event_description='".$event_description."'") or die(mysqli_error($db));
$event_id=mysqli_insert_id($db);
if(isset($_FILES['event_attachment'])){
	
				if(file_exists($_FILES['event_attachment']['tmp_name']) || is_uploaded_file($_FILES['event_attachment']['tmp_name'])){
					$target_dir = "uploads/";
					$file_name = basename($_FILES['event_attachment']['name']);
					$file_type = pathinfo($_FILES['event_attachment']['name'],PATHINFO_EXTENSION);
					$check = getimagesize($_FILES['event_attachment']["tmp_name"]);
					if($check){
						do{
							$save_name = uniqid($event_id,true).'.'.$file_type;
						}while(file_exists($target_dir.$save_name));
						move_uploaded_file($_FILES['event_attachment']['tmp_name'],$target_dir.$save_name);
						mysqli_query($db,"UPDATE  events SET  attachment = '".$file_name."', refer_name = '".$save_name."', upload_datetime = now()
						where event_id='".$event_id."'");
					}
				}
		}		
}
header("location:events.php");
exit();	
}
?>