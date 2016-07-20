<div id="index-banner" class="parallax-container">
   <!--  <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Parallax Template</h1>
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
        <div class="row center">
          <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Shop</a>
        </div>
        <br><br>

      </div>
    </div> 
  <ul class="rslides" id="slider1">
      <?php foreach ($sliders as $value): ?>
        <li><img src="<?=base_url('assets/'.$value->image_web)?>" alt=""></li>
      <?php endforeach ?>
    </ul>
  -->
    <div class="slider">
    <ul class="slides">
      <?php foreach ($sliders as $value): ?>
      <li>
        <img src="<?=base_url('assets/'.$value->image_web)?>"> <!-- random image -->
        <div class="caption right-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
  </div>

  <div class="row">
    <div class="side-bar hide-on-med-and-down col m3">
      <ul id="slide-out" class="side-nav fixed ">
        <li><a href="<?= base_url('product') ?>">All New</a></li>
        <li><a href="#!">Sale</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Shop <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
        <ul id='dropdown1' class='dropdown-content'>
         <?php foreach ($category as $cat): ?>
            <li><a style="font-size:12px" href="<?= base_url('category'.'/'.$cat->link_rewrite) ?>"><?= $cat->name ?></a></li>
          <?php endforeach ?>
        </ul>
      </ul>
    </div>
  </div>




  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Contact Us</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
  <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="http://placehold.it/500x500"></a>
    <a class="carousel-item" href="#two!"><img src="http://placehold.it/500x500"></a>
    <a class="carousel-item" href="#three!"><img src="http://placehold.it/500x500"></a>
    <a class="carousel-item" href="#four!"><img src="http://placehold.it/500x500"></a>
    <a class="carousel-item" href="#five!"><img src="http://placehold.it/500x500"></a>
  </div>
      
  </div>
  <div class="row">
    <div class="section">
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>New Product</h4>
        </div>
      </div>
    </div>
  </div>
  <div id="owl-demo" class="owl-carousel owl-theme">
    <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"><div class="overlay"><h2>Sale</h2><a href="#"><p>Add To Cart</p></a></div></div>Dresses A <br>Pink<h6>Rp.100.000</h6></div>
    <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"> <div class="overlay"><h2>Rp.100.000</h2><a href=""><p>Add To Cart</p></a></div></div></div>
    <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"> <div class="overlay"><h2>Rp.100.000</h2><a href=""><p>Add To Cart</p></a></div></div></div>
    <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"> <div class="overlay"><h2>Rp.100.000</h2><a href=""><p>Add To Cart</p></a></div></div></div>
    <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"> <div class="overlay"><h2>Rp.100.000</h2><a href=""><p>Add To Cart</p></a></div></div></div>
    <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"> <div class="overlay"><h2>Rp.100.000</h2><a href=""><p>Add To Cart</p></a></div></div></div>
   <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"> <div class="overlay"><h2>Rp.100.000</h2><a href=""><p>Add To Cart</p></a></div></div></div>
    <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"> <div class="overlay"><h2>Rp.100.000</h2><a href=""><p>Add To Cart</p></a></div></div></div>
    <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"> <div class="overlay"><h2>Rp.100.000</h2><a href=""><p>Add To Cart</p></a></div></div></div>
    <div class="item"><div class="hovereffect"><img src="http://placehold.it/261x300" alt="" class="sliders"> <div class="overlay"><h2>Rp.100.000</h2><a href=""><p>Add To Cart</p></a></div></div></div>
  </div>

  