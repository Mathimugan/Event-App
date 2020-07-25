<?php
include('connection.php');
session_start();
if(isset($_POST['submit']))
{
$token=mysqli_real_escape_string($db,$_POST['token']);
if($token == $_SESSION['form_token'])
{
$_SESSION['form_token'] = null;
$event_title = mysqli_real_escape_string($db,$_POST['event_title']);
$event_date = mysqli_real_escape_string($db,$_POST['event_date']);
$event_time = mysqli_real_escape_string($db,$_POST['event_time']);
$event_id=mysqli_real_escape_string($db,$_POST['event_id']);
$event_description = mysqli_real_escape_string($db,$_POST['event_description']);
$pic_id = mysqli_real_escape_string($db,$_POST['pic_id']);
mysqli_query($db,"update events set event_title='".$event_title."',
event_date=STR_TO_DATE('".$event_date."','%Y-%m-%d'),
event_time=STR_TO_DATE('".$event_time."','%H:%i'),event_description='".$event_description."' where event_id='".$event_id."'") or die(mysqli_error($db));


if($_POST['pic_id']=='0'){
$pic_q = mysqli_query($db,"SELECT * FROM events WHERE event_id = '".$event_id."' ");
$pic_r = mysqli_fetch_object($pic_q);
unlink('uploads/'.$pic_r->refer_name);

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
}
header("location:view_event.php?id=".$event_id);
exit();	
}
?>