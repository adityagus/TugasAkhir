$(document).ready(function() {
read()



  $('.increment-btn').click(function(e) {
    e.preventDefault();
    var incre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(incre_value, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
      value++;
      $(this).parents('.quantity').find('.qty-input').val(value);
    }

  });

  $('.decrement-btn').click(function(e) {
    e.preventDefault();
    var decre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(decre_value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;
      $(this).parents('.quantity').find('.qty-input').val(value);
    }
  });


  function read() {
    $.get("{{ url('read') }}", {}, function(carts, status, total) {

      $("#read").html(carts);

    })
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $('.btnHapus').on('click', function(e) {
    e.preventDefault();
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    const prod_id = $(this).closest('.quantity').find('qty-input').val();
    $.ajax({
      method: "delete",
      url: "{{ url('cart') }}/" + id,
      data:{
        'prod_id':prod_id,
      },
      success: function(response){
        window.location.reload();
        swal("", response.status, "success");l
      }
      
    })
    
  });


  
    
    // console.log('ok');
    // const id = $(this).data('id');
    // const token = $("meta[name='csrf-token']").attr("content");

    // $.ajax({
    //   url: "{{ url('cart') }}/" + id
    //   , data: {
    //     'id': id,
    //     // '_token': token,
    //   }
    //   , type: 'delete'
    //   , dataType: 'json'
    //   , success: function(carts) {
    //     const h4 = document.querySelector('#total');
    //     h4.innerHTML = ("Alat yang anda pinjam ({{ $inCart-1 }})");
    //     $("#read").html(carts);

    //   }
    //   , error: function(jqXhr, textStatus, errorMessage) {
    //     $("p").append("Delete request is Fail.");

    //   }

    // });



  // $(document).on('click', '.updateQty', function(){

  //   const inven_qty = $(this).closest('.product_data').find('.input-qty').val();
  //   const inventory_id = $(this).val();

  //   alert(inven_qty);

  // });


});
