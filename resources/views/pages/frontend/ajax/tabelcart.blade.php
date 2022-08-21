<a class='btn btn-info mx-1 px-2 btnCart' type="submit" data-id='{{ $item->id }}' data-token="{{ csrf_token() }}">Pinjam</a>


<script>


  // Update Cart Data
    $(document).ready(function(){
      read()
    });
    
    function read() {
      $.get("{{ url('read') }}", {}, function(carts,status){
        $("#read").html(carts);
        
      })
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
        success: function(carts) {
          const h4 = document.querySelector('#barang');
          h4.innerHTML = {{ $inCart + 1}};
          h4.classList.add("position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger");
            
        }
      , error: function(jqXhr, textStatus, errorMessage) {
        $("p").append("inikah");
        
      }
  
  
  });
});
  
</script>



  // $(function(){
  //   $('.hapusCart').on('click', function(){
  //     return confirm('hello');
  //   });
  // });
  // function cartDelete(id) {
  //     return confirm('apakah yakin');
  // $.ajax({
  //   type: 'get'
  //   , url: "{{ url('cart') }}/" + id
  //   , data: "id=" + id
  //   , 
  //   , succes: function(data) {
  //     return view('pages.frontend.home')
  //   };

  // });
  //   };

</script>
