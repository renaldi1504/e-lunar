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
          <td colspan="2">Rp. <?=number_format($order->total_shipping)?></td>
        </tr>
        <?php endif ?>
       
         <tr>
          <th>Shipping</th>
          <td></td>
          <td colspan="2">Rp. <?=number_format($order->total_discounts)?></td>
        </tr>
         <tr>
          <th>Sub Total</th>
          <td></td>
          <td colspan="2">Rp. <?=number_format($order->total_products)?></td>
        </tr>
         <tr>
          <th>Grand Total</th>
          <td></td>
          <td colspan="2">Rp. <?=number_format($order->total_paid)?></td>
        </tr>
      </table>
      <div class="row">
          <div class="col l6 s12">
            <div class="card green lighten-5">
              <div class="card-content black-text">
                <span class="card-title">Alamat</span>
                <p>Jl.asdsadasdasdasd Jakarta Barat</p>
              </div>
              <div class="card-action">
                <a class="modal-trigger" href="#modal1">Ubah Alamat</a>
              </div>
            </div>
          </div>
         <div class="col l6 s12">
            <div class="card green lighten-5">
              <div class="card-content black-text">
                <span class="card-title">Ongkos Kirim</span>
                  <select class="browser-default">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">JNE Regular, Rp.9.000 / kg</option>
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
       <button class="btn waves-effect waves-light right" type="submit" name="action">Proses Pembayaran
         <i class="material-icons right">send</i>
       </button>
    </div> 
    <div class="col l6 s12">
      <table class="bordered">
         <tr class="hide-on-med-and-down">
          <th>Kode Voucher</th>
          <td><input placeholder="Placeholder" id="voucher" type="text" class="validate"></th>
          <td><button class="btn waves-effect waves-light" type="submit" name="action">Ok
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
      <h4>Ubah Alamat</h4>
      <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" type="text" class="validate">
            <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="text" class="validate">
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input disabled value="I am not editable" id="disabled" type="text" class="validate">
            <label for="disabled">Disabled</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
        </div>
      </form>
  </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

