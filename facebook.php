<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">

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
      document.getElementById('name').innerHTML =
        'Thanks for logging in, ' + response.first_name + '!';
		document.getElementById('email').innerHTML =
        'Thanks for logging in, ' + response.email + '!';
    });	
}
</script>
</head>
<body>
<fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>
<div id="data"></div>
<div id="name"></div>
</body>
</html>
