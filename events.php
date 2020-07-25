<?php
include('connection.php');
session_start();
$token=uniqid();
$_SESSION['form_token']=$token;
?>
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
			<div class="col-sm-12">
			<a href="add_event.php" class="button" style="float:right;">Add Event</a>
			</div>
			</div>
			<br/>
				<div class="row">
			<?php
			$event_q="select *,DATE_FORMAT(event_date,'%M %D,%Y') as event_date from events where 1 ORDER BY event_id desc";
			$event_r=mysqli_query($db,$event_q);
			while($event=mysqli_fetch_assoc($event_r))
			{
			?>
		
			<div class="col-sm-4">
					<div class="grid-wrapper">
						<div class="grid-content">
							<article class="content-item">
								<div class="entry-media">
									<div class="post-title">
										<h3><?php echo $event['event_title']?></h3>
										<div class="entry-date">
											<ul>
												<li><?php echo $event['event_date']?></li>
											</ul>
										</div>
									</div>
								<hr/>
									<div class="post-contents">
										<p><?php echo $event['event_description']?>.</p>
									
									</div>
								<hr/>
									<div class="post-footer">
										<div class="row">
											<div class="col-sm-4">
						<a href="view_event.php?id=<?php echo $event['event_id']?>" class="button">View</a>
											</div>
											<div class="col-sm-4">
												<a  href="edit_event.php?id=<?php echo $event['event_id']?>" class="button">Edit</a>
											</div>
											<div class="col-sm-4">
												<a onClick="deleteEvent('<?php echo $event['event_id']?>')" class="button">Delete</a>

											</div>
										</div>
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
				
			<?php
			}
			?>
		
		
				
				
				
				
			</div>
			
			
		</div>
	</section>
	
   <!-- Modal-->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Event</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want delete the Event.</p>
		  <form action="delete_event_action.php" method="POST">
		  <input type="hidden" id="form_token" name="form_token" value="<?php echo $token?>"/>
		  <input type="hidden" id="event_id" name="event_id" value="<?php echo $event_id?>"/>
		  
        </div>
        <div class="modal-footer">
          
		 <input type="submit" name="submit" value="Submit" class="button"/>
		 <button type="button" class="button" data-dismiss="modal">Close</button>
		  </form>
        </div>
      </div>
      </div>
      </div>
    </div>
<!-- Modal-->
    <!--Footer-->
 <?php include('footer.php')?>
 <!--Footer-->

</body>
<script>
function deleteEvent(event_id)
{

	$("#myModal").modal('show');
	$("#event_id").val(event_id);
}
</script>
</html>