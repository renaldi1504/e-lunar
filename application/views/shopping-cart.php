 <div class="row">
    <div class="side-bar hide-on-med-and-down col m3">
      <ul class="category">
        <li><a href="<?= base_url('product') ?>">Back to Shop</a></li>
      </ul>
    </div>
  </div>
  
  <div class="container body">
      <p><a href="">Product</a> > <a href="">Dresses</a></p>
    <div class="row">

    <div class="col l12 s12">
    <?php if ($cart): ?>
    <table class="responsive-table">
      <tr>
        <th width="16.6%" data-field="image">Image</th>
        <th width="16.6%" data-field="name">Name</th>
        <th width="16.6%" data-field="size">Size</th>
        <th width="16.6%" data-field="quantity">Qty</th>
        <th width="16.6%" data-field="subtotal">Price</th>
        <th></th>
      </tr>

      <?php foreach ($cart as $carts): ?>
      
         <tr class="">
          <form method="post" action ="<?=base_url('cart/update')?>">
          <input type="text" name="id" value="<?=$carts['id']?>" hidden>
          <input type="text" name="rowid" value="<?=$carts['rowid']?>" hidden>
          <td width="16.6%"><img src="<?=base_url().'assets/'.$carts['img']?>" alt="" width="60" height="80"></td>
          <td width="16.6%"><?=$carts['name']?></td>
          <td width="16.6%"><?=$carts['size']?></td>
          <td><input placeholder="Qty" name="qty" type="number" class="validate" value="<?= $carts['qty']?>" min="1"></td>
          <td width="16.6%"><?='Rp. '.number_format($carts['price']);?></td>
          <td width="16.6%"><button type="submit" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">update</i></button><a class="btn-floating btn-small waves-effect waves-light red" href="<?=base_url('cart/delete/'.$carts['id'].'/'.$carts['rowid'])?>"><i class="material-icons">delete</i></a></td>
          </form>
         </tr>
      
      <?php endforeach ?>
     
<!--        <tr>
        <td></td>
        <td></td>
        <td align="center">Discount</td>
        <td>-Rp 50.000</td>
      </tr> -->
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td align="center">Grand Total</td>
        <td><?='Rp. '.$total;?></td>
        <td></td>
      </tr>

    </table>
    <div class="right" style="padding:20px">
      <a href="<?=base_url('checkout')?>" class="btn waves-effect waves-light" type="submit" name="action" >Checkout
      <i class="material-icons right">send</i>
    </a>
    </div>
      <?php else: ?>
      <p>Your Cart is Empty !</p>
      <?php endif ?>
     </div>
    </div>
  </div>