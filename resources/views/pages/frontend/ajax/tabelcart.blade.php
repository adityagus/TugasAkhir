<table id='read' class="table table-responsive table-striped table1"  class='table-item'>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Alat & Bahan</th>
      <th>Lab</th>
      <th>Kategori</th>
      <th>Jenis</th>
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
      <td>{{ $item->jenis }}</td>
      
      <td>{{ $item->category_items ? $item->category_items->namakategori : " " }}</td>
      
      {{-- @if ($item->loan_items->total == 0)
        <td>0</td>
            
        @else
        <td>{{ $item->loan_items->total }}</td>

      @endif --}}
      <td>{{ $item->studyprograms->name }}</td>
      <td class="d-flex justify-content-center">
        <span class='d-flex d-inline-block px-2'>
          <a href='{{ route('details', $item->slug) }}'>
            <button class='btn btn-primary mx-1' type="submit">Detail</button>
          </a>
        </span>
        <a class='btn btn-info mx-1 px-2 btnCart' type="submit" data-id='{{ $item->id }}' data-token="{{ csrf_token() }}">Pinjam</a>
        

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
    $(document).ready(function(){
      read();

    });
    
    function read() {
      $.get("{{ url('read') }}", {}, function(inCart,status){
        $("#read").html(inCart);

        
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
