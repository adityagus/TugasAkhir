{{ $inCart }}
<script>
  



  // Update Cart Data
    $(document).ready(function(){
      read();

    });
    
    function read() {
      $.get("{{ url('incart') }}", {}, function(inCart,status){
        $("#").html(inCart);

        
      })
    }
    
    function datatable(){
      let table1 = document.querySelector('#table1');
      let dataTable = new simpleDatatables.DataTable(table1);
    }
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    
    $('.btnCart').on('click', function() {
    console.log('ok');
    const id = $(this).data('id');
    const token = $("meta[name='csrf-token']").attr("content");
    
    $.ajax({
        url: "{{ url('cart') }}/" + id,
        data: {
          'id': id,
          // '_token': token,
        },
        type: 'post',
        dataType: 'json',
        success: function(inCarts) {
          const h4 = document.querySelector('#barang');
          h4.innerHTML = {{ $inCart + 1}};
            
        }
      , error: function(jqXhr, textStatus, errorMessage) {
        $("p").append("inikah");
        
      }
  
  
  });
});
  
</script>




</script>
