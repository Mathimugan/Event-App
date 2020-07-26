	<?php
	include('connection.php');
	$is_admin=false;
	if (isset($_SESSION['loggedin']))
	{
	$user_id=$_SESSION['user_id'];
	$group_q=mysqli_query($db,"select * from user_group where user_id='".$user_id."'");
	$group=mysqli_fetch_object($group_q);
	
	if($group->group_name=='Admin')
	{
		$is_admin=true;
	}
	else
	{
		$is_admin=false;
	}
	}
	?>
	<header id="header">
    <div class="menu-container">
        <div class="container">
            <div class="row">
                <div  class="col-md-7">
                    <nav class="main-nav">
                        <ul>
							<li><h2>EventApp</h2></li>
                            <li>
                                <a href="index.php">Home</a>
                            </li> 
					<?php
					if (!isset($_SESSION['loggedin']))
					{
					?>							
                            <li><a href="login.php">Login</a></li>
							
					<?php
					}
					if ($is_admin && isset($_SESSION['loggedin']))
					{
					?>
					<li><a href="events.php">Event</a></li>
					<?php
					}
					if(!$is_admin && isset($_SESSION['loggedin']))
					{
					?>
					<li><a href="bookings.php">Bookings</a></li>
							
					<?php
					}
					?>
                        </ul>
                        <a href="javascript:;" id="close-menu"> <i class="fa fa-close"></i></a>
                    </nav>
                                            </div>
					<?php
					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
					{
					?>	
                <div class=" col-md-5 h-search">
                    <div class="head-social">
                        <a class="socials" href="#"><?php echo $_SESSION['user_name']?></a>
                        <a class="socials" href="logout.php">Logout</a>
               
                    </div>
                </div>
				<?php
				}
				?>
            </div>
        </div>
    </div>
</header>
	<?php  ?>