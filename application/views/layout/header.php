<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Lunar Official</title>

  <!-- CSS  --> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?= base_url()?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?= base_url()?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?= base_url()?>assets/css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
  <link href="<?= base_url()?>assets/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/owl-carousel/owl.theme.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/responsiveslides.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/demo.css">
</head>
<body>
  <nav class="white menu" role="navigation">
    <div class="nav-wrapper container" >
      <a id="logo-container" href="<?=base_url()?>" class="brand-logo">Lunar Official</a>
    
      <ul id="nav-mobile" class="side-nav">
        <?php foreach ($category as $cat): ?>
        <li><a href="<?= base_url('category'.'/'.$cat->link_rewrite) ?>" class="mobilenav"><?= $cat->name ?></a></li>
        <?php endforeach ?>
      </ul>
      <ul id="nav-bag" class="side-nav">
        <li><a href="<?=base_url('bag')?>" class="mobilenav">bag:<span></span></a></li>
      </ul>
      
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      <a href="http://www.sociovit.com" data-activates="nav-bag" class="button-collapse right"><i class="fa fa-shopping-bag" aria-hidden="true" style="font-size:2.0rem"></i></a>
    </div>
  </nav>
  <div class="hide-on-med-and-down">
       <nav id="ddmenu" style="float:right">
            <ul>
              <li class="full-width">
                    <span class="top-heading">Search</span>
                    <div class="dropdown">
                        <div class="dd-inner">
                          <form method="GET" Action="<?=base_url('product')?>">
                            <input id="search" name="search"><i class="material-icons">search</i>
                            <button type="submit" hidden></button>
                          </form>
                          
                        </div>
                    </div>
                </li>
              
                <li class="full-width">
                    <span class="top-heading">Help</span>
                    <div class="dropdown">
                        <div class="dd-inner">
                            <ul class="column">
                                <li><a href="#">Order & Shipping Information</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Condition of Use</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="full-width">
                    <span class="top-heading">Contact</span>
                    <div class="dropdown">
                        <div class="dd-inner">
                            <ul class="column">
                                <li><h3>Contact Us</h3></li>
                                <li><a href="#">Contact Customer Care</a></li>
                                <li><a href="#">Email: info@lunarofficial.com</a></li>
                                <li><a href="#">Jobs</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="no-sub full-width">
                    <span class="top-heading">MyAccount</span>
                    <div class="dropdown">
                        <div class="dd-inner">
                            <ul class="column">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Orders</a></li>
                                <li><a href="#">Confirm Payment</a></li>
                                <li class ="last-child"><li>
                                  <?php if (!empty($this->session->userdata('ctoken'))): ?>
                                    <li><a href="<?=base_url('auth/logout')?>">Logout</a></li>
                                  <?php else: ?>
                                    <li><a href="<?=base_url('auth#login')?>">Login</a> <a href="" class="right">Register</a></li>
                                  <?php endif ?>
                                
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="no-sub full-width">
                    <a class="top-heading" href="<?=base_url('cart')?>">Bag:0</a>
                </li>
            </ul>
      </nav>
  </div>