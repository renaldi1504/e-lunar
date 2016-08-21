<div class="row">
    <div class="side-bar hide-on-med-and-down col m3">
      <ul class="category">
        <li><a href="<?= base_url() ?>">Back to Shop</a></li>
      </ul>
    </div>
  </div>
  
  <div class="container body">
      <p><a href="">Product</a> > <a href="">Dresses</a></p>
    <div class="row">
         <div class="col l6 s12">
       <table class="bordered">
         <input id ="order_id" value="<?=$order->id?>" hidden>
         <input id ="location_details" value="<?=base_url('checkout/carrier')?>" hidden>
        
        <?php if ($order->voucher_id == NULL): ?>
        <tr class="hide-on-med-and-up show-on-medium ">
          <th>Kode Voucher</th>
          <td><input placeholder="Placeholder" id="voucher" type="text" class="validate"></th>
          <td><button class="btn waves-effect waves-light" type="submit" name="action">Ok
            <i class="material-icons right">send</i>
          </button></td>
        </tr>
        <?php elseif (!empty($order->total_discounts)): ?>
          <tr>
          <th>Discount</th>
          <td></td>
          <td colspan="2">Rp. <?=number_format($order->total_discounts)?></td>
        </tr>
        <?php endif ?>
       
         <tr>
          <th>Shipping</th>
          <td></td>
          <td colspan="2"><label id="shipping-price" style="font-size:1rem;color:black">Rp. <?=number_format($order->total_shipping)?></label></td>
        </tr>
         <tr>
          <th>Sub Total</th>
          <td></td>
          <td colspan="2">Rp. <?=number_format($order->total_products)?></td>
        </tr>
         <tr>
          <th>Grand Total</th>
          <td></td>
          <td colspan="2"><label id="total-paid" style="font-size:1rem;color:black">Rp. <?=number_format($order->total_paid)?></label></td>
        </tr>
      </table>
      <div class="row">
          <div class="col l6 s12">
            <div class="card green lighten-5">
              <div class="card-content black-text">
                <span class="card-title">Alamat</span>
                <?php if(!empty($address)): ?>
                <p><?=$address->firstname.' '.$address->lastname.'<br>'.$address->address1.','.$address->address2.'<br>'.$address->postcode.'<br>'.$address->city?></p>
                <?php endif ?>
              </div>
              <div class="card-action">
                <?php if(!empty($address)): ?>
                <a class="modal-trigger" href="#modal1">Ubah Alamat</a>
                <?php else: ?>
                <a class="modal-trigger" href="#modal1">Tambah Alamat</a>
                <?php endif ?>
              </div>
            </div>
          </div>
         <div class="col l6 s12">
            <div class="card green lighten-5">
              <div class="card-content black-text">
                <span class="card-title">Ongkos Kirim</span>
                  <select class="browser-default" id="ongkos-kirim">
                    <option value="" disabled selected>Choose your option</option>
                    <?php if (!empty($address)): ?>
                      <option value="<?=$address->area_id?>">JNE Regular, Rp.<?=(int)$address->price?>/ kg</option>
                    <?php endif ?>
                  </select>
              </div>
            </div>
          </div>
      </div>
       <ul class="collapsible popout" data-collapsible="accordion">
         <li>
          <div class="collapsible-header"><i class="material-icons">description</i>Metode Pembayaran</div>
          <div class="collapsible-body">
              <form action="#">
                <p>
                  <input name="group1" type="radio" id="test1" />
                  <label for="test1">Bank Transfer - BCA</label>
                </p>
                <p>
                  <input name="group1" type="radio" id="test2" />
                  <label for="test2">Bank Transfer - Mandiri</label>
                </p>
                <p>
                  <input name="group1" type="radio" id="test3"  />
                  <label for="test3">Bank Transfer - BRI</label>
                </p>
              </form>
          </div>
        </li>
      </ul>
       <button class="btn waves-effect waves-light right disabled" type="submit" name="action" id="proses_pembayaran">Proses Pembayaran
         <i class="material-icons right">send</i>
       </button>
    </div> 
    <div class="col l6 s12">
      <table class="bordered">
         <tr class="hide-on-med-and-down">
          <th>Kode Voucher</th>
          <td><input placeholder="Placeholder" id="voucher" type="text" class="validate"></th>
          <td><button class="btn waves-effect waves-light" type="submit" name="action" id="bayar" disabled>Ok
            <i class="material-icons right">send</i>
          </button></td>
          <td></td>
        </tr>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Qty</th>
          <th>Price</th>
        </tr>
        <?php foreach ($order_details as $details): ?>
        <tr class="">
          <td><img src="<?=base_url('assets').'/'.$details->image?>" alt="" width="60" height="80"></td>
          <td><?=$details->product_name?></td>
          <td><?=$details->quantity?></td>
          <td>Rp. <?=number_format($details->price)?></td>
        </tr>
        <?php endforeach ?>
       
      </table>

    </div>


     </div>
    </div>
  </div>
  <div id="modal1" class="modal">
    <div class="modal-content">
       <?php if (!empty($alamat)): ?>
       <form class="col s12" id="addresses" action="<?php echo base_url('user/editAddress') ?>" method="post">
      <h4>Ubah Alamat</h4>
      <?php else: ?>
      <form class="col s12" id="addresses" action="<?php echo base_url('user/addAddress') ?>" method="post">
      <h4>Tambah Alamat</h4>
      <?php endif ?>
      <div class="row">
        
          <input id="id" type="text" class="validate" name="id" value="<?=$order->customer_id?>" hidden>
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="firstname">
              <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate" name="lastname">
              <label for="last_name">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="post_code" type="number" class="validate" name="postcode">
              <label for="post_code">Postal Code</label>
            </div>
            <div class="input-field col s6">
              <select class="browser-default" id="ongkos-kirim" name="city">
                <option value="" disabled selected>Choose your option</option>
                 <option value="">JNE Regular</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="phone" type="text" class="validate" name="phone">
              <label for="phone">Phone</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="address1" class="materialize-textarea validate" name="address1"></textarea>
              <label for="email">Address 1</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="address2" class="materialize-textarea validate" name="address2"></textarea>
              <label for="email">Address 2</label>
            </div>
          </div>
        
      </div>
    </div>
    <div class="modal-footer">
      <a id="submit_alamat" class="modal-action modal-close waves-effect waves-green btn-flat">Submit</a>
    </div>
    </form>
  </div>

