<?php
session_start();
include 'connection.php';
if(isset($_POST['submit'])){
	$success = true;
	$email_id = mysqli_real_escape_string($db,$_POST['email_id']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$select_user_q = mysqli_query($db,"SELECT user_id,name,password FROM users WHERE email_id = '".$email_id."' AND status = 'Active'");
	$select_user = mysqli_fetch_assoc($select_user_q);
	if($select_user != null){
		$hashed = $select_user['password'];
		if($hashed != null && $password != null){
			$check_password = password_verify ($password,$hashed);
			echo $check_password;
			if($check_password){
				if($select_user != null){
					$_SESSION['user_name'] = $select_user['name'];
					$_SESSION['user_id'] = $select_user['user_id'];
					$_SESSION['loggedin'] = true;
					$select_user_group_q=mysqli_query($db,"SELECT * FROM user_group WHERE user_id = '".$select_user['user_id']."'");
					$user_group = mysqli_fetch_assoc($select_user_group_q);
					if($user_group['group_name']=='Admin')
					{
					$type='events.php';	
					}
					else{
					$type='index.php';	
					}
					header("location:".$type."");
				}
				else{
					$success = false;
				}
			}
			else{
				$success = false;
			}
		}
	}
	else{
		$success = false;
	}
	if(!$success){
		$_SESSION['login_fail'] = 'Incorrect username or password entered. Please try again.';
		header("location:login.php");
	}
	mysqli_close($db);
}
?>