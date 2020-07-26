<?php
include('connection.php');
?>
	<!--SideBar-->
	<div class="col-sm-4 sidebar">
	
	<!--Recent Posts-->
	<div class="widget">
		<h3 class="widget-title">Latest Events</h3>
		<div class="bubble-line"></div>
		<div class="widget-content">
		<?php
		$event="select * from events where 1  order by event_id desc limit 5";
		$event_q=mysqli_query($db,$event) or die(mysqli_error($db));
		while($event_r = mysqli_fetch_object($event_q))
		{	
		?>
		<div class="widget-recent">
	
								<?php
								if($event_r->refer_name!='' || 
								$$event_r->refer_name!=null)
								{	
								$src='uploads/'.$event_r->refer_name;
								?>
								<img src=<?php echo $src?> alt="image">
								<?php
								}
								?>
		<h4><a href="javascript:;"><?php echo $event_r->event_title?></a> </h4>
		<p><?php echo $event_r->event_description?>.</p>
		</div>
		<?php 
		} 
		?>
		</div>
	</div>
	<!--Recent Posts-->
	
	
	
	<!--Recent Posts-->
	<div class="widget">
		<h3 class="widget-title">Expiring Events</h3>
		<div class="bubble-line"></div>
		<div class="widget-content">
		<?php
		$event="select * from events where 1  order by event_id asc limit 5";
		$event_q=mysqli_query($db,$event) or die(mysqli_error($db));
		while($event_r = mysqli_fetch_object($event_q))
		{	
		?>
		<div class="widget-recent">
	
								<?php
								if($event_r->refer_name!='' || 
								$$event_r->refer_name!=null)
								{	
								$src='uploads/'.$event_r->refer_name;
								?>
								<img src=<?php echo $src?> alt="image">
								<?php
								}
								?>
		<h4><a href="javascript:;"><?php echo $event_r->event_title?></a> </h4>
		<p><?php echo $event_r->event_description?>.</p>
		</div>
		<?php 
		} 
		?>
		</div>
	</div>
	<!--Recent Posts-->
	</div>
	<!--SideBar-->