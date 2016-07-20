
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

    <div class="col l6 s12">
       <ul class="rslides" id="slider3">
      <?php foreach ($medias as $foto): ?>
        <li><img src="<?= base_url('assets').'/'.$foto->path.'/'.$foto->filename ?>" class="materialboxed" alt="" class="slider"></li>
      <?php endforeach ?>
      
    </ul>
   
    </div>
    <div class="col l6 s12">
    <ul id="slider3-pager">
      <?php foreach ($medias as $foto): ?>
       <li><a href="#"><img src="<?= base_url('assets').'/'.$foto->path.'/'.$foto->filename ?>" alt="" width="60" height="80"></a></li>
      <?php endforeach ?>
    </ul>
      <h5><?=$single[0]->name?></h5>
      <p><?=$single[0]->meta_description?></p>
      <p><h6>Rp. <?php if(!empty($single[0]->fix_price)) echo number_format($single[0]->fix_price); else echo number_format($single[0]->price); ?></h6></p>
      <label>Size</label>

      <select class="browser-default" name="size">
        <?php foreach ($stock as $value): ?>
            <option value="<?= $value->id.'-'.$value->size ?>"><?= $value->size ?></option>
        <?php endforeach ?>
      </select>
      <input placeholder="Qty" type="number" class="validate" name="qty" value="1">

      <button class="btn" data-id="<?php echo $single[0]->id;?>" 
                        data-name="<?=$single[0]->name?>" 
                        data-price="<?php if(!empty($single[0]->fix_price)) echo $single[0]->fix_price; else echo $single[0]->price; ?>"
                        data-img ="<?=$single[0]->path.'/'.$single[0]->filename?>">add to cart</button>
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="material-icons">description</i>Description</div>
          <div class="collapsible-body"><p><?=$single[0]->description?></p></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">place</i>Shipping</div>
          <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">replay</i>Return & Exchanges</div>
          <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
      </ul>    
    </div>
  </div>
  </div>

  