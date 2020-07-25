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
			<br/>
			<div class="row">
			<div class="table-responsive">
			<table class="table table-bordered">
			<thead>
			<tr>
			<th>S.NO</th>
			<th>Booking Id</th>
			<th>Booked Date</th>
			<th>Event Name</th>
			<th>Name</th>
			<th>Email</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$booking_q=mysqli_query($db,"select *,DATE_FORMAT(created_date,'%d/%m/%Y') as booked_date from bookings where 1 order by booking_id desc");
			$i=0;
			while($booking=mysqli_fetch_assoc($booking_q))
			{
			$i++;
			$event_q=mysqli_query($db,"select * from events where 
			event_id='".$booking['event_id']."'");
			$event=mysqli_fetch_assoc($event_q)			
			?>
			<tr>
			<td><?php echo $i?></td>
			<td><?php echo $booking['booking_id']?></td>
			<td><?php echo $booking['booked_date']?></td>
			<td><?php echo $event['event_title']?></td>
			<td><?php echo $booking['name']?></td>
			<td><?php echo $booking['email']?></td>
			</tr>
			<?php
			}
			?>
			</tbody>
			</table>	
			</div>
			</div>
			
			
		</div>
	</section>
	
   <!-- Modal-->
    </div>
<!-- Modal-->
    <!--Footer-->
 <?php include('footer.php')?>
 <!--Footer-->

</body>
</html>