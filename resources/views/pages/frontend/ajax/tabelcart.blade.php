<table class='table table-borderedtable-striped'>
  <thead>
    <p style="color: red"></p>
    <tr>
      <th>Nama Alat & Bahan</th>
      <th>Kategori</th>
      <th>Kuantitas</th>
      <th>Jenis</th>
      <th class="">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <div id='isi'>
      @forelse ($carts as $item)
      <tr class="cartpage">
        <!-- <td colspan='7'><center>No Data</center></td> -->
        <td>{{ $item->inventory->nama }}</td>
        <td class="">{{ $item->inventory->category_items->namakategori }}</td>
        <td class="cart-product-quantity" width="140px" align="center">
          <input type="hidden" class="product_id" value="{{ $item->inventory->nama }}">

          <div class="input-group quantity">
            <div class="input-group-prepend decrement-btn updateQty" style="cursor: pointer">
              <span class="input-group-text">-</span>
            </div>
            <input type="text" class="qty-input form-control qty_input" name='total' maxlength="2" max="10" value="1">
            <div class="input-group-append increment-btn updateQty" style="cursor: pointer">
              <span class="input-group-text">+</span>
            </div>
          </div>
        </td>
        <td>{{ $item->inventory->studyprograms->name }}</td>
        <td>
          <a class="btn btn-toggle shadow-none btnHapus" data-id='{{ $item->id }}' data-token="{{ csrf_token() }}">
            X
          </a>
          {{-- <button class="btn btn=dark" onclick="cartDelete({{ $item->id }})">X</button> --}}
        </td>

      </tr>

      @empty
      <td colspan="5" class='text-center'>
        <h6>Oopps Transaksi Belum Ada</h6>
        <a href="{{ route('alat-dan-bahan') }}" class="no-underline">Kembali</a>
      </td>
      @endforelse

    </div>
  </tbody>

</table>
<script>


  // Update Cart Data
  $(document).ready(function() {

    $('.changeQuantity').click(function(e) {
      e.preventDefault();

      var quantity = $(this).closest(".cartpage").find('.qty-input').val();
      var product_id = $(this).closest(".cartpage").find('.product_id').val();

      var data = {
        '_token': $('input[name=_token]').val()
        , 'total': quantity
        , 'inventories_id': product_id
      , };

      $.ajax({
        url: '/update-to-cart'
        , type: 'POST'
        , data: data
        , success: function(response) {
          window.location.reload();
          alertify.set('notifier', 'position', 'top-right');
          alertify.success(response.status);
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
