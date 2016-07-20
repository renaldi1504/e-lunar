
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url('extension/css/bootstrap.min.css') ?>" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->

<link href="<?php echo base_url('extension/css/style.css') ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('extension/css/font-awesome.css') ?>" rel="stylesheet"> 
<script src="<?php echo base_url('extension/js/jquery.min.js') ?>"> </script>
<!-- Mainly scripts -->
<script src="<?php echo base_url('extension/js/jquery.metisMenu.js') ?>"></script>
<script src="<?php echo base_url('extension/js/jquery.slimscroll.min.js') ?>"></script>
<!-- Custom and plugin javascript -->
<link href="<?php echo base_url('extension/css/custom.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('extension/js/custom.js') ?>"></script>
<script src="<?php echo base_url('extension/js/screenfull.js') ?>"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>

<!----->

<!--skycons-icons-->
<script src="<?php echo base_url('extension/js/skycons.js') ?>"></script>
<!--//skycons-icons-->
</head>
<body>
<div id="wrapper">

<!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="admin">Lunar</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
            <div class="clearfix"> </div>
           </div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
		    		<li class="dropdown at-drop">
		              <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="number">5</span></a>
		              <ul class="dropdown-menu menu1 " role="menu">
		                <li><a href="#">
		               
		                	<div class="user-new">
		                	<p>New user registered</p>
		                	<span>40 seconds ago</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-user-plus"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                	</a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>Someone special liked this</p>
		                	<span>3 minutes ago</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-heart"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>John cancelled the event</p>
		                	<span>4 hours ago</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-times"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>The server is status is stable</p>
		                	<span>yesterday at 08:30am</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-info"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>New comments waiting approval</p>
		                	<span>Last Week</span>
		                	</div>
		                	<div class="user-new-left">
		                
		                	<i class="fa fa-rss"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#" class="view">View all messages</a></li>
		              </ul>
		            </li>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Rackham<i class="caret"></i><img src="<?php echo base_url('extension/images/wo.jpg') ?>"></span></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="profile.html"><i class="fa fa-user"></i>Edit Profile</a></li>
		                <li><a href="inbox.html"><i class="fa fa-envelope"></i>Inbox</a></li>
		                <li><a href="calendar.html"><i class="fa fa-calendar"></i>Calender</a></li>
		                <li><a href="<?php echo base_url('bpanel/logout'); ?>"><i class="fa fa-clipboard"></i>Logout</a></li>
		              </ul>
		            </li>
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	  
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu"> 
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-building-o nav_icon"></i> <span class="nav-label">Menu Levels</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="graphs.html" class=" hvr-bounce-to-right"> <i class="fa fa-picture-o nav_icon"></i>Banner</a></li>
                            
                            <li><a href="maps.html" class=" hvr-bounce-to-right"><i class="fa fa-quote-left nav_icon"></i>Content</a></li>
					   </ul>
                    </li>
                     <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa fa-shopping-bag nav_icon"></i> <span class="nav-label">Product</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('adminan/product') ?>" class=" hvr-bounce-to-right"> <i class="fa fa-server nav_icon"></i>Products Detail</a></li>
                            <li><a href="faq.html" class=" hvr-bounce-to-right"><i class="fa fa-money nav_icon"></i>Discount</a></li>
                       </ul>
                    </li>    
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-list nav_icon"></i> <span class="nav-label">Orders</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="forms.html" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Detail Order</a></li>
                            <li><a href="validation.html" class=" hvr-bounce-to-right"><i class="fa fa-check-square-o nav_icon"></i>Confirmation Order</a></li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Account</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="signin.html" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i>Edit Account</a></li>
                            <li><a href="signup.html" class=" hvr-bounce-to-right"><i class="fa fa-user-plus nav_icon"></i>New Account</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
			</div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
  		<!--banner-->	
		    <div class="banner">
				<h2>
				<a href="admin">Home</a>
				<?php if($title != 'home'){?>
				<i class="fa fa-angle-right"></i>
				<span><?php echo $title ?></span>
				<?php } ?>
				</h2>
		    </div>
		    <div class="search">

		    </div>
		<!--//banner-->
		<!--content-->
		<?php echo $content; ?>

		<div class="copy">
	        <p> &copy;<a href="#" target="_blank">Lunar-Official</a> </p>
		</div>

		<div class="clearfix"> </div>
       </div>
     </div>
<!---->
<!--scrolling js-->
	<script src="<?php echo base_url('extension/js/jquery.nicescroll.js') ?>"></script>
	<script src="<?php echo base_url('extension/js/scripts.js') ?>"></script>
	<!--//scrolling js-->
	<script src="<?php echo base_url('extension/js/bootstrap.min.js') ?>"> </script>
	<script src="<?php echo base_url('extension/bootbox/4.3/bootbox.min.js') ?>"></script> 
</body>
</html>

