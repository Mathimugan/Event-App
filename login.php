<!DOCTYPE html>
<html>
<?php
include('header.php');
session_start();
$token=uniqid();
$_SESSION['form_token']=$token;
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
									<h2>Login</h2>
								</div>
								<div class="bubble-line"></div>
								<div class="post-content comment">
								<div class="errorbox">
				<?php 
				$err_msg = $_SESSION['login_fail'] ?? null; 
				echo $err_msg;
				unset($_SESSION['login_fail']);
				?>
			</div>
					<form action="login_action.php" method="POST"  enctype="multipart/form-data">
					<input type="hidden" id="token" name="token" value="<?php echo $token;?>"/> 
					<div class="comment-form">
					<p class="input-name"> Email Id (required) </p>
					<input type="email" name="email_id" id="email_id" 
					placeholder="" required>
					
				
					<p class="input-name"> Password (required) </p>
					<input type="password" name="password" id="password" 
					placeholder="" required>
					
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

</html>