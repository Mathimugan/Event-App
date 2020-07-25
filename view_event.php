<!DOCTYPE html>
<html>
<?php
include('connection.php');
include('header.php');
$id=$_GET['id'];
$event_q=mysqli_query($db,"select *,DATE_FORMAT(event_date,'%M %D,%Y') as event_date,
DATE_FORMAT(event_time,'%h:%i 	%p') as event_time from events where event_id='".$id."'");
$event=mysqli_fetch_object($event_q);
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
								<div class="about-title">
								
								<div class="row">
								<div class="col-md-2">
								<a class="button" href="events.php">Back</a></div>
									<div class="col-md-6"><h2><?php echo $event->event_title?></h2>
									<div class="entry-date">
									<ul><li><a><?php echo $event->event_date?></a></li>
									<li><a><?php echo $event->event_time?></a></li>
									</ul>
									</div>
									</div>
									</div>
								</div>
								<div class="bubble-line"></div>
								<div class="post-content comment">
								<div class="row">
								
								<div class="col-md-5">
								<?php
								if($event->refer_name!='' || $event->refer_name!=null)
								{	
								$src='uploads/'.$event->refer_name;
								?>
								<img src=<?php echo $src?> alt="image">
								<?php
								}
								?>
								</div>
								<div class="col-md-7">
								<p>
                                <?php echo $event->event_description?>           
                                </p>
								</div>
								</div>	
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


</html>