<?php
include('connection.php');
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
												<a href="javascript:;" class="button">Edit</a>
											</div>
											<div class="col-sm-4">
												<a href="javascript:;" class="button">Delete</a>
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
	
   

    <!--Footer-->
 <?php include('footer.php')?>
 <!--Footer-->


</body>

</html>