<table class='table table-striped'>
  <thead>
    <p style="color: red"></p>
    <tr>
      <th>Nama Alat & Bahan</th>
      <th>Kategori</th>
      <th>Jumlah Dipinjam</th>
      <th>Jenis</th>
      <th class="">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <div id='isi'>
      @forelse ($carts as $item)
      <tr>
        <!-- <td colspan='7'><center>No Data</center></td> -->
        <td>{{ $item->inventory->nama }}</td>
        <td>{{ $item->inventory->category_items->namakategori }}</td>
        <td>{{ $item->inventory->jumlah }}</td>
        <td>{{ $item->inventory->labs->name }}</td>
        <td>
          <a class="btn btn-primary btnHapus" data-id='{{ $item->id }}' data-token="{{ csrf_token() }}">
            X
          </a>
          {{-- <button class="btn btn=dark" onclick="cartDelete({{ $item->id }})">X</button> --}}
        </td>

      </tr>

      @empty
      <td colspan="5" class='text-center'>
        <h6>Oopps Transaksi Belum Ada</h6>
        <a href="{{ route('peminjaman') }}" class="no-underline">Kembali</a>
      </td>
      @endforelse

    </div>
  </tbody>
</table>
<script>

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

    $('.btnHapus').on('click', function() {
        console.log('ok');
        const id = $(this).data('id');
        const token = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({
            url: "{{ url('cart') }}/" + id,
            data: {
              'id': id,
              // '_token': token,
            },
            type: 'delete',
            dataType: 'json',
            success: function(carts) {
            read();
          }
          , error: function(jqXhr, textStatus, errorMessage) {
            $("p").append("Delete request is Fail.");
          }

        });

    });



  });

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