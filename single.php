<!DOCTYPE html>
<html>
<?php
include('header.php');
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
									<h2>New Event</h2>
								</div>
								<div class="bubble-line"></div>
								<div class="post-content comment">
					<form action="add_event_action.php" method="POST" onsubmit="return validateForm()">
					<div class="comment-form">
					<p class="input-name"> Event Title (required) </p>
					<input type="text" name="event_title" id="event_title" 
					placeholder="" >
					<p id="title_error"></p>
					<p class="input-name"> Event Date </p>
					<input type="date" name="event_date" id="event_date"   placeholder="">
					<p id="date_error"></p>
					<p class="input-name"> Event Time </p>
					<input type="time" name="event_time" id="event_time" placeholder="">
					<p id="time_error"></p>
					<p class="input-name">Event Description</p>
					<textarea placeholder="" id="event_description" 
					name="event_description">
					</textarea>
					<p id="desc_error"></p>
					<p class="input-name">Event Image</p>
					<label for="file-upload" class="button">
					Upload
					</label>
					<input id="file-upload" name="event_attachment" type="file" style="display:none;"/>
  
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
</script>

</html>