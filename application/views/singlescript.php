<script type="text/javascript">
   // Slideshow 3
      $("#slider3").responsiveSlides({
        manualControls: '#slider3-pager',
        maxwidth: 600
      });
       
  </script>
  <script>
    
    $(".btn").click(function() {
      var size = $("select[name='size']").val();
      var qty = $("input[name='qty']").val();
      var cart = new Object();
      cart = {
            'id': $(this).data('id'),
            'name': $(this).data('name'),
            'qty': qty,
            'price': $(this).data('price'),
            'size':size,
            'img': $(this).data('img'),
          };
      cart = JSON.stringify(cart);
      //console.log(<?php $this->cart->contents() ?>);
      window.location.replace('<?php echo base_url('cart/add?cart=')?>'+cart);
      
    });
  </script>