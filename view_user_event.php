<!DOCTYPE html>
<html>
<?php
include('connection.php');
include('header.php');
$id=$_GET['id'];
$event_q=mysqli_query($db,"select *,DATE_FORMAT(event_date,'%M %D,%Y') as event_date,
DATE_FORMAT(event_time,'%h:%i 	%p') as event_time from events where event_id='".$id."'");
$event=mysqli_fetch_object($event_q);
$token=uniqid();
$_SESSION['book_form_token']=$token;
?>
<style>
.modal_input
{
width: 320px;
    max-width: 100%;
    border: 1px solid #dddddd;
    outline: none;
    margin-bottom: -5px;
}
</style>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '307235440478741',
      cookie     : true,
      xfbml      : true,
      version    : 'v7.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
  
}

function statusChangeCallback(response)
{
FB.api('/me?fields=first_name,last_name,email', function(response) {
      console.log('Successful login for: ' + response.name);
	  $("#myModal").modal("show");
	  /*setTimeout(function(){document.getElementById('user_name').value =response.first_name;
       
	document.getElementById('user_email').value =response.email;
       }, 1000);*/
     
    });	
}
</script>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=787298181442447&autoLogAppEvents=1" nonce="M4jrJ9V6"></script>
<header id="header">
    <div class="menu-container">
        <div class="container">
            <div class="row">
                <div  class="col-md-7">
                    <nav class="main-nav">
                        <ul>
						
                            <li>
                                <a href="index.php">Home</a>
                            </li>        
                            
            </div>
        </div>
    </div>
</header>
			<section class="section-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-8">
						
						
						
						<article class="content-item">
							<div class="entry-media">
								<div class="about-title">
								
								<div class="row">
								<div class="col-md-2">
								<a class="button" href="index.php">Back</a></div>
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
								<div class="col-md-12">
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
								</div>
								<div class="row">
								<div class="col-md-12">
								<p>
                                <?php echo $event->event_description?>           
                                </p>
								</div>
								</div>	
								</div>
							</div>
							 <div class="bubble-line"></div>
							<div class="post-footer">
                <div class="row">
                    <div class="col-sm-5">
                        
							<div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""  scope="public_profile,email"
							  onlogin="checkLoginState();"></div>
						
                    </div>
                   
                </div>
            </div>
							
						</article>
					</div>
					
					
			</div>
			</div>
		</section>
		<!-- Modal-->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register Account</h4>
        </div>
        <div class="modal-body">
		  <form action="add_booking.php" method="POST" autocomplete="off">
		  <input type="hidden" id="form_token" name="form_token" value="<?php echo $token?>"/>
		  <input type="hidden" id="book_event_id" name="book_event_id" value="<?php echo $_GET['id']?>"/>
		  <div class="comment-form">
					<p class="input-name"> Username </p>
					<input type="text" name="user_name" class="modal_input" id="user_name" placeholder="" required>
				
					<p class="input-name"> Email </p>
					<input type="text" class="modal_input" name="user_email" id="user_email" placeholder="" required>
					
					<p class="input-name"> Password </p>
					<input type="text" class="modal_input" name="user_password" id="user_password" placeholder="" required>
					</div>
		  
        </div>
        <div class="modal-footer">
          
		 <button type="submit" name="submit" class="button">Submit</button>
		 <button type="button" class="button" data-dismiss="modal">Close</button>
		  </form>
        </div>
      </div>
      </div>
      </div>
	</div>

    
     <!--Footer-->
 <?php include('footer.php')?>
 <!--Footer-->
</body>


</html>