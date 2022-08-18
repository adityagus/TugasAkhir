@extends('layouts.main')

@section('title')
Checkout
@endsection

@section('content')
{{-- <script>
  $(document).ready(function(){
    $('upCart').on('change key', function(){
      
      alert('i am here');
      
    })
  })
</script> --}}




<meta name="csrf-token" content="{{ csrf_token() }}">

<div id="main-content">

  {{-- Start Heading --}}
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <div class="d-flex d-inline-block ">
            <i class="bi bi-cart bi-sub fs-5 bold text-gray-600 me-3"></i>
            <h3>Checkout</h3>
          </div>
          <p class="text-subtitle text-muted">Checkout Peminjaman Barang</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('peminjaman', '#peminjamana') }}">Peminjaman</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('checkout') }}" method="POST" id='Form1'>
      @csrf
      @method('POST')
      <section class="form-group">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Biodata Diri</h4>
          </div>

          <div class="card-body">
            <div class="row">

              <div class="col-md-6">

                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="name" class="form-control" id="nama" placeholder='Masukan Nama Anda' form="Form1" value="{{ session()->get(1) }}" readonly required>
                </div>
                
                
                <div class="form-group">
                  <label for="nama-peminjam">Nim</label>
                  <input type="number" name="nim" class="form-control" id="nama-peminjam" placeholder='Masukan Nama Anda' form="Form1" value='{{ session()->get(0) }}' readonly required>
                </div>
                
                <div class="form-group">
                  <label for="kelas-peminjam">Kelas</label>
                  <input type="text" name="kelas" class="form-control" id="nama-peminjam" placeholder='Masukan Nama Anda' form="Form1" value='{{ session()->get(2) }}' readonly required>
                </div>

                <div class="form-group">
                  <label for="phone">No. Telp</label>
                  <input type="number" name="phone" class="form-control" form="Form1" id="phone" placeholder="Masukan Kelas Anda" value='{{ old('phone') }}' autofocus autocomplete="on" required>
                </div>

                <div class="form-group">
                  <label for="keperluan">Keperluan Alat</label>
                    <select class="form-select" name='keperluan' form="Form1" id="keperluan" value="{{ old('keperluan') }}" required>
                      <option selected disabled value="">Pilih Keperluan Anda</option>
                      <option value="PENELITIAN">Penelitian</option>
                      <option value="PRAKTIKUM">Praktikum</option>
                      <option value="PKM">PKM</option>
                    </select>
                </div>
              </div>


              <div class="col-md-6">

                <div class="form-group">
                  <label for="mata-kuliah">Mata Kuliah</label>
                  <small class="text-muted">contoh. <i>elektronika dasar</i></small>
                  <select class="form-select" id="mata-kuliah" name="matakuliah_id" form="Form1" placeholder="Masukan Mata Kuliah Anda"  value="{{ old('matakuliah_id') }}" required>
                    <option selected disabled value="{{ false }}">Pilih Mata Kuliah Anda</option>
                    @foreach ($studies as $study)
                    <option value={{ $study->id }}>{{ $study->matakuliah }}</option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group">
                  <label for="pertemuan">Pertemuan Ke</label>
                  <small class="text-muted">contoh. <i>1</i></small>
                  {{-- <input type="text" name="pertemuan_ke" class="form-control" id="pertemuan" placeholder="Masukan Pertemuan ke Anda"> --}}
                  <select  class="form-select" id="pertemuan" form="Form1" name="pertemuan_ke" required>
                    <option selected disabled value="{{ false }}">
                      Pilih Pertemuan ke
                    </option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="laboratorium">Laboratorium</label>
                  <select  id="" class="form-select" name="labs_id" form="Form1" required>
                    <option selected disabled value="{{ false }}">
                      Masukan Tempat Laboratorium
                    </option>
                    @foreach ($labs as $lab)
                    <option value={{ $lab->id }}>{{ $lab->name }}</option>
                    @endforeach

    
                  </select>
                </div>

              </div>

            </div>



          </div>
      </section>
    </form>


      {{-- Start Cart Section --}}
      <section class="section">
        <div class="card">
          <div class="card-header">
            @if (session('cart_update'))
              <div class="alert alert-success alert dismissible fade show" role="alert">
                <button type="button" class="btn btn-success" data-dismiss="alert" aria-label="Close">
                  <strong>
                    {{ session('cart_update') }}
                  </strong>
                </button>
              </div>
            @endif
            <h4 class="card-title" id='keranjang'>Checkout Item</h4>
          </div>
          <div class="card-body table-responsive">
            <table class='table table-borderedtable-striped'>
              <thead>
                <p style="color: red"></p>
                <tr>
                  <th>Nama Alat & Bahan</th>
                  <th>Kategori</th>
                  <th style="width: 200px">Kuantitas</th>
                  <th>Jenis</th>
                  <th class="">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($carts as $item)
                <div id='isi' class="product_data">
                  <input type="hidden" name="inventory_id" value="{{ $item->inventory->id }}" form="Form1">
                  <tr class="cartpage">
                    <!-- <td colspan='7'><center>No Data</center></td> -->
                    <td >{{ $item->inventory->nama }}</td>
                    <td class="">{{ $item->inventory->category_items->namakategori }}</td>
                    <td class="cart-product-quantity" width="10px" align="center">
                      
                      <form action="{{ route('cart.store', $item->id ) }}" method='POST'>
                        <div class="input-group quantity">
                          @csrf
                        <input type="hidden" name="inventory_id" value="{{ $item->inventory->id }}">
                          <div class="input-group-prepend decrement-btn updateQty" style="cursor: pointer">
                              <span class="input-group-text">-</span>
                          </div>
                          <input type="text" class="qty-input form-control qty_input" name='inven_qty' maxlength="2" max="10" value="{{ $item->inven_qty }}">
                          <div class="input-group-append increment-btn updateQty" style="cursor: pointer">
                              <span class="input-group-text">+</span>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Update Qty</button>
                      </form>
                  </td>
                    <td>{{ $item->inventory->studyprograms->name }}</td>
                    <td>
                      <form action="{{ route('cart-delete', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn">
                          X
                        </button>
                      </form>
                    </td>
            
                  </tr>
            
                </div>
                  @empty
                  <td colspan="5" class='text-center'>
                    <h6>Oopps Transaksi Belum Ada</h6>
                    <a href="{{ route('barang') }}" class="no-underline">Kembali</a>
                  </td>
                  @endforelse
            
              </tbody>
            
            </table>
            <div class="check d-flex justify-content-between align-content-center mt-4 table-footer">
              <h4 id='total'>Alat yang anda pinjam ({{ $inCart }})</h4>
              <button id='checkouty' class='btn btn-primary btn-checkout px-lg-5 py-2 ' form="Form1" type="submit">Checkout</button>
            </div>

  {{-- End Cart Section --}}


          </div>
        </div>

      </section>

    {{-- End Cart Section --}}


    <footer>
      <div class="footer clearfix  mt-2 mb-0 ">
        <div class="container">
          <h6>Catatan :</h6>
          <ol type="1">
            <li>Kerusakan dan kehilangan alat/bahan wajib diganti sesuai dengan spesifikasi alat yang sama dan akan ditanggung oleh peminjam atau kelompok</li>
            <li>Keterlambatan pengembalian alat/bahan akan dikenakan denda sesuai aturan yang berlaku</li>
          </ol>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection

@push('prepend')
    <script src="{{ url('frontend/scripts/script.js') }}"></script>

    
@endpush
@push('prepend-script')
<script type="text/javascript">
  window.addEventListener("hashchange", function() {
    alert('tidak bisa kembali')
  })
</script>

<script>
    $(document).ready(function() {
  //     read()
      
  //     $(document).on('click','.checkout-item', function(e){
  //     e.preventDefault();
  //     // console.log('ok');
  //     const data = {
  //       'total ' : $('.qty-input').val(),
  //     }
  //     console.log(data);
      
      
  //     })
      
      

  //   function read() {
  //     $.get("{{ url('read') }}", {}, function(carts, status) {
  //       $("#read").html(carts);
  //     })
  //   }
  
  $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

    
    function read() {
      $.get("{{ url('read') }}", {}, function(carts,status,total){
          
        $("#read").html(carts);
        
      })
    }


  });

</script>
@endpush

@push('addon-style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
