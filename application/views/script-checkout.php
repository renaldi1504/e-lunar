<script>
  $( "#ongkos-kirim" ).change(function() {
     	var address = $(this).val();
     	var person = {"firstName":"John", "lastName":"Doe", "age":"46"};
        var location = $("#location_details").val();
        var order_id = $("#order_id").val();
        var carrierCost;
        var grandTotal;
        $("#proses_pembayaran").removeClass("disabled");
        $.get( location+'/'+address+'/'+order_id+'/JSON', function( data ) {
          var obj = JSON.parse(data);
          carrierCost = obj.total_shipping;
          grandTotal = obj.total_paid;
           $('#shipping-price').html('Rp. '+carrierCost);
           $('#total-paid').html('Rp. '+grandTotal);

         });
  });

  $("#proses_pembayaran").click(function(){

  });
  $("#submit_alamat").click(function(){
     var frm = $('#addresses');

      $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
               var tes = data;
               console.log(tes);
            }
        });
  });
</script>