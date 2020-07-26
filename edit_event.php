<!DOCTYPE html>
<html>
<?php
include('header.php');
include('connection.php');
session_start();
if(!isset($_SESSION['user_id']))
{
// not logged in
header('Location: login.php');
exit();
}
$token=uniqid();
$_SESSION['form_token']=$token;
$event_id=$_GET['id'];
 
$event_q=mysqli_query($db,"select * from events where event_id='".$event_id."'");
$event=mysqli_fetch_assoc($event_q);
$date = date_create($event['event_date']);
$event_date=date_format($date, 'Y-m-d');
$time = date_create($event['event_time']);
$event_time=date_format($time, 'H:i');
?>
<body>
<?php
include('menubar.php');
?>	
			<section class="section-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-8">	
						<article class="content-item">
							<div class="entry-media">
								<div class="post-title">
									<div class="row">
								<div class="col-md-2">
								<a class="button" href="events">Back</a></div>
								<div class="col-md-10">
									<h2>Edit Event</h2></div>
								</div>
								</div>
								<div class="bubble-line"></div>
								<div class="post-content comment">
					<form action="edit_event_action.php" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" id="token" name="token" value="<?php echo $token;?>"/> 
					<input type="hidden" id="event_id" name="event_id" value="<?php echo $event_id;?>"/>
					<div class="comment-form">
					<p class="input-name"> Event Title (required) </p>
					<input type="text" name="event_title" id="event_title" 
					placeholder="" value="<?php echo $event['event_title']?>">
					<p id="title_error"></p>
					<p class="input-name"> Event Date </p>
					
					<input type="date" name="event_date" id="event_date"   
					value="<?php echo $event_date;?>">
					<p id="date_error"></p>
					<p class="input-name"> Event Time </p>
					<input type="time" name="event_time" id="event_time" 
					value="<?php echo $event_time?>">
					<p id="time_error"></p>
					<p class="input-name">Event Description</p>
					<textarea placeholder="" id="event_description" 
					name="event_description">
					<?php echo $event['event_description']?>
					</textarea>
					<p id="desc_error"></p>
					<p class="input-name">Event Image</p>
					<?php
					if($event['refer_name']=='' || $event['refer_name']==null)
					{
					?>
					<label for="event_attachment" class="button">
					Upload
					</label>
					<input type="hidden" id="pic_id" name="pic_id" value="1"/>
					<input id="event_attachment" name="event_attachment" type="file" style="display:none;"/>
					<?php
					}
					else
					{
					$src='uploads/'.$event['refer_name'];
					?>
					<span id="load_img">
					<input type="hidden" id="pic_id" name="pic_id" value="1"/>
					<a href="<?php echo $src?>" target="_blank"><span class="glyphicon glyphicon-file"></span></a>
					<a class="btn btn-sm btn-danger" onClick="updateImg()">X</a>
					</span>
					<?php
					}
					?>
					</div>
					<div class="comment-submit">
					<input type="submit" name="submit" class="button" value="Save">
					</div>
					</form>
								</div>
							</div>
						</article>
					</div>
			</div>
			</div>
		</section>
	</div>

    
     <!--Footer-->
 <?php include('footer.php')?>
 <!--Footer-->
</body>
<script>
function validateForm()
{
var event_title=$("#event_title").val() * 1;
var event_date=$("#event_date").val() * 1;
var event_time=$("#event_time").val() * 1;
 var description = $.trim($("#event_description").val());
if(event_title==null || event_title == "")
{
$("#title_error").html('Please Fill Event Title');
$("#title_error").attr('style','color:red');
$("#event_title").focus();	
}
else
{
$("#title_error").html('');
$("#title_error").removeAttr('style');	
}

if(event_date==null || event_date == "")
{
$("#date_error").html('Please Fill Event Date');
$("#date_error").attr('style','color:red');
$("#event_date").focus();		
}
else
{
$("#date_error").html('');
$("#date_error").removeAttr('style');	
}

if(event_time==null || event_time == "")
{
$("#time_error").html('Please Fill Event Time');
$("#time_error").attr('style','color:red');
$("#event_date").focus();		
}
else
{
$("#time_error").html('');
$("#time_error").removeAttr('style');	
}

if(description==null || description == "")
{
$("#desc_error").html('Please Fill Event Description');
$("#desc_error").attr('style','color:red');
$("#event_description").focus();		
}
else
{
$("#desc_error").html('');
$("#desc_error").removeAttr('style');	
}
if(event_title=="" || event_date=="" || event_time=="" ||  description=="")
{
return false;	
}
else
{
	return true;
}
}

function updateImg()
{
$("#load_img").html('<label for="event_attachment" class="button">\
Upload\</label>\
<input type="hidden" id="pic_id" name="pic_id" value="0"/>\
<input id="event_attachment" name="event_attachment" type="file" style="display:none;"/>');	
}
</script>

</html>