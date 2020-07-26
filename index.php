<!DOCTYPE html>
<html>
<?php
include('connection.php');
include('header.php');
session_start();
$row_per_page = 2;
$current_page = $_GET['page'] ?? 1;
$next_page = false;
?>

<body>	
<?php
include('menubar.php');
?>
	<section class="section-content">
		<div class="container">
			<div class="row">
			
	<div class="col-sm-8 col-md-8">
	<?php
			$start = ($current_page - 1) * $row_per_page;
			$event_q="select *,DATE_FORMAT(event_date,'%M %D,%Y') as event_date,DATE_FORMAT(event_time,'%h:%i 	%p') as event_time from events where 1";
			$event_q .= " ORDER BY event_id desc LIMIT $start,".($row_per_page + 1);
			
			$event_r=mysqli_query($db,$event_q) or die(mysqli_error($db));
			$result_rows = mysqli_num_rows($event_r);
			if($result_rows > $row_per_page){
				$next_page = true;
			}
			elseif($result_rows == 0)
			{
			$current_page = 1;
			}
			while($event=mysqli_fetch_assoc($event_r))
			{
			?>
    <article class="content-item">
        <div class="entry-media">
            <div class="post-title">
                <h2><a href="#"><?php echo $event['event_title']?></a></h2>
                <div class="entry-date">
                    <ul>
                        <li><?php echo $event['event_date']?></li>
                        <li><?php echo $event['event_time']?></li>
                    </ul>
                </div>
            </div>
            <div class="bubble-line"></div>
            <div class="post-content">
            
				
								<?php
								if($event['refer_name']!='' || $event['refer_name']!=null)
								{	
								$src='uploads/'.$event['refer_name'];
								?>
								<img src=<?php echo $src?> alt="image">
								<?php
								}
								?>
                <p>
                    <?php echo $event['event_description']?>
                </p>
            </div>
            <div class="bubble-line"></div>
            <div class="post-footer">
                <div class="row">
                    <div class="col-sm-5">
                        <a href="view_user_event.php?id=<?php echo $event['event_id']?>" class="button">View</a>
                    </div>
                   
                </div>
            </div>
        </div>
    </article>
		<?php
			}
			?>
    <div class="post-navigation">
		<?php
if($next_page || $current_page > 1){
?>

	<ul>
		<?php if($current_page > 1){ ?><li><a href="index.php?page=<?php echo ($current_page - 1); ?>"><i class="fa fa-chevron-left"></i></a></li><?php } ?>
		<?php if($next_page){ ?><li><a href="index.php?page=<?php echo ($current_page + 1) ?>"><i class="fa fa-chevron-right"></i></a></li><?php } ?>
	</ul>

<?php
}
?>

    </div>
	</div>
	
	</div>
	</div>
	</section>
<!--Footer-->
 <?php include('footer.php')?>
 <!--Footer-->
</body>
</html>