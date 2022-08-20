{{ $inCart }}

<script>
    function read() {
        $.get("{{ url('read') }}", {}, function(carts,incart, status) {
          $("#read").html(carts);
          $("#incart").html(incart);
        })
    }
    
    $.ajax({
        url: "{{ url('incart') }}",
        data: {
          'id': id,
          // '_token': token,
        },
        type: 'post',
        dataType: 'json',
        success: function(carts) {
          // const h4 = document.querySelector('.card-header.peminjaman');
          // h4.innerHTML = h{{ $inCart >= 1 ? $inCart : '' }};
            
        }
      , error: function(jqXhr, textStatus, errorMessage) {
        $("p").append("inikah");
        
      }
  
    });

</script>