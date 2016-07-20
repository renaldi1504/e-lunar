
 <?php 
    $count = 0;
    $totalproduct  = count($product); 
    $total = ceil(count($product)/3); 
    ?>
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
  <div class="container body">
    <p><a href="">Product</a> > <a href="">Dresses</a></p>
    <div class="row">

     <?php foreach ($product as $pr): ?>
       <div class="col l4 s6 product">
        <div class="hovereffect"><?php if(!empty($pr->fix_price)){if($pr->reduction_type == 'percentage'){echo '<span class="new badge" style="z-index:1">'.round($pr->reduction).'%</span>';}else{echo '<span class="new badge" style="z-index:1">-Rp. '.number_format($pr->discount).'</span>';} } ?><a href="<?=base_url('product/details/'.$pr->slug.'/'.$pr->link_rewrite)?>" class="product"><img src="<?= base_url('assets'.'/'.$pr->path.'/'.$pr->filename) ?>" alt="" class="slider">
              <h6><?=$pr->name?></h6>
              <?php if (!empty($pr->fix_price)): ?>
                <h6>Rp. <?=number_format($pr->fix_price)?>  <strike>Rp. <?=number_format($pr->price)?></strike></h6>
              <?php else :?>
                <h6>Rp. <?php echo number_format($pr->price); ?></h6>
              <?php endif ?>
            </a>
        </div>
        <div class='clearfix'></div>
       </div>
     <?php endforeach ?>
    </div>
  </div>