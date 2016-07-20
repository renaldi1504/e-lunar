
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Lunar Official</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="<?php echo base_url('extension/bootstrap/3.3.1/css/bootstrap.min.css') ?>"> <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url('extension/css/style.css') ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('extension/css/font-awesome.css') ?>" rel="stylesheet"> 
<script src="<?php echo base_url('extension/js/jquery.min.js') ?>"> </script>
<script src="<?php echo base_url('extension/js/bootstrap.min.js') ?>"> </script>
</head>
<body>
	<div class="login">
		
		<div class="login-bottom">
			<?php if ($status == "error"): ?>
				<div class="alert alert-warning" role="alert">
	        	<p><?php echo $message; ?></p>
	       </div>
			<?php endif ?>
			<h2>Login</h2>

			<form action="<?php  echo base_url('ngadmin/dologin'); ?>" method="POST">
			<div class="col-md-12">
				<div class="login-mail">
					<input id="email" name="email" type="text" placeholder="Email" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input id="pass" name="pass" type="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>
				<div class="col-md-4 login-do">
					<label class="hvr-shutter-in-horizontal login-sub">
						<input type="submit" value="login">
					</label>
				</div>
			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->
<div class="copy-right">
    <p> &copy; 2016 Lunar-Official </p>	  
</div>  
<!---->
<!--scrolling js-->
	<script src="<?php echo base_url('extension/js/jquery.nicescroll.js') ?>"></script>
	<script src="<?php echo base_url('extension/js/scripts.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/1.11.2/jquery.min.js') ?>"></script> <!--Global jQuery-->
	<script src="<?php echo base_url('extension/bootstrap/3.3.1/js/bootstrap.min.js') ?>"></script> <!--Bootstrap JS-->
	<script src="<?php echo base_url('extension/bootbox/4.3/bootbox.min.js') ?>"></script> <!--Bootbox JS-->
	<!--//scrolling js-->
	<script>
		$.ajax({
					beforeSend: function() {
						
					},
					success: function(msg){
						var obj = JSON.parse(msg);
						if(obj.status == "fail"){window.location.href="<?php echo base_url('adminan/login'); ?>";}
						return false;
					}
				});

	</script>
</body>
</html>

