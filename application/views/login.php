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
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
 </div>
<div class="container">
    <p><a href="">Product</a> > <a href="">Dresses</a></p>
    <div class="row">

      <div class="col l4 s12">
          <div class="card z-depth-2">
            <div class="card-content black-text">
              <span class="card-title">Pelanggan Baru</span>
              <p>Daftarkan dirimu untuk manfaat berikut ini:<br>
Alamat pengiriman anda akan tersimpan <br>
Menerima tawaran promosi spesial melalui email</p>
            </div>
            <div class="card-action">
              <a href="#">Register</a>
            </div>
          </div>
      </div>
      <div class="col l8 s12">
         <div class="card z-depth-2">
            <div class="card-content black-text">
              <span class="card-title">Login</span>
              <?php echo validation_errors(); ?>
              <?php if (!empty($error)) {
                echo '<p>'.$error.'</p>';
                # code...
              } ?>
              <form action="<?php  echo base_url('auth#login'); ?>" method="POST">
                  <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field col s12">
                    <input id="password"  name="password" type="password" class="validate">
                    <label for="password">Password</label>
                  </div>
                  <a href="#" style="margin-left:10px">Lupa Password?</a>
              
            </div>
            <div class="card-action">
              <button class="btn waves-effect waves-light" type="submit" name="action">Login
            <i class="material-icons right">send</i>
          </button>
            </div>
            </form>
          </div>
      </div>

    </div>
  </div>