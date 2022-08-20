<table class="table table-striped" id="table1" class='table-item'>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Alat & Bahan</th>
      <th>Lab</th>
      <th>Jenis</th>
      {{-- <th>Kategori</th> --}}
      {{-- <th>Total</th> --}}
      <th class="text-center">Aksi</th>
    </tr>
  </thead>
  @php
  $no = 1;
  @endphp

  <tbody>
    @forelse ($items as $item)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $item->nama }}</td>
      {{-- <td>{{ $item->categoryitems->namakategori }}</td> --}}
      {{-- @if ($item->loan_items->total == 0)
        <td>0</td>
            
        @else
        <td>{{ $item->loan_items->total }}</td>

      @endif --}}
      <td>{{ $item->studyprograms->name }}</td>
      <td>{{ $item->jenis }}</td>
      <td class="d-flex justify-content-center">
        <span class='d-flex d-inline-block px-2'>
          <a href='{{ route('details', $item->slug) }}'>
            <button class='btn btn-primary mx-1' type="submit">Detail</button>
          </a>
        </span>
        <a class='btn btn-info mx-1 px-2 btnCart' type="submit" data-id='{{ $item->id }}' data-token="{{ csrf_token() }}">Add to cart</a>

        {{-- <form action="{{ route('cart-add', $item->id) }}" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-info" type="submit">


          Add to Cart
        </button>
        </form> --}}
      </td>
    </tr>
    @empty

    @endforelse




  </tbody>
</table>
<script>


  // Update Cart Data
  $(function() {
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

    // $('.changeQuantity').click(function(e) {
    //   e.preventDefault();

    //   var quantity = $(this).closest(".cartpage").find('.qty-input').val();
    //   var product_id = $(this).closest(".cartpage").find('.product_id').val();

    //   var data = {
    //     '_token': $('input[name=_token]').val()
    //     , 'total': quantity
    //     , 'inventories_id': product_id
    //   , };

    //   $.ajax({
    //     url: '/update-to-cart'
    //     , type: 'POST'
    //     , data: data
    //     , success: function(response) {
    //       window.location.reload();
    //       alertify.set('notifier', 'position', 'top-right');
    //       alertify.success(response.status);
    //     }
    //   });
    // });
    
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
          const h4 = document.querySelector('.card-header.peminjaman');
          h4.innerHTML = h{{ $inCart >= 1 ? $inCart : '' }};
            
        }
      , error: function(jqXhr, textStatus, errorMessage) {
        $("p").append("inikah");
        
      }
  
    });
  
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
