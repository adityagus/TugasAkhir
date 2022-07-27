@extends('layouts.main')

@section('title')
Checkout
@endsection

@section('content')
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
              <li class="breadcrumb-item"><a href="{{ route('peminjaman') }}">Peminjaman</a></li>
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
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('checkout') }}" method="POST">




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
                  {{-- <input type='hidden' readonly value="{{ Auth::user()->name }}" name="nama"> --}}
                  <input readonly value="{{ Auth::user()->name }}" type="text" name="name" class="form-control" id="nama" placeholder="{{ Auth::user()->name }}" required>
                </div>

                <div class="form-group">
                  <label for="nama-peminjam">Nim</label>
                  <input type="number" name="nim" class="form-control" id="nama-peminjam" placeholder='Masukan Nama Anda' value='{{ old('nim') }}' required>
                </div>

                <div class="form-group">
                  <label for="kelas-peminjam">Kelas</label>
                  <input type="text" name="kelas" class="form-control" id="kelas-peminjam" placeholder="Masukan Kelas Anda" value='' required>
                </div>

                <div class="form-group">
                  <label for="phone">No. Telp</label>
                  <input type="number" name="phone" class="form-control" id="phone" placeholder="Masukan Kelas Anda" value='{{ old('phone') }}' required>
                </div>

                <div class="form-group">
                  <label for="mata-kuliah">Keperluan Alat</label>
                  <fieldset class="form-group">
                    <select class="form-select" name='keperluan' id="basicSelect" value='{{ old('keperluan') }}'>
                      <option value="PENELITIAN">Penelitian</option>
                      <option value="PRAKTIKUM">Praktikum</option>
                      <option value="PKM">PKM</option>
                    </select>
                  </fieldset>
                </div>
              </div>


              <div class="col-md-6">

                <div class="form-group">
                  <label for="mata-kuliah">Mata Kuliah</label>
                  <small class="text-muted">contoh. <i>elektronika dasar</i></small>
                  <select class="form-select" id="mata-kuliah" name="matakuliah_id" placeholder="Masukan Mata Kuliah Anda" required>
                    <option selected disabled value="{{ false }}">Pilih Mata Kuliah Anda</option>
                    @foreach ($studies as $study)
                    <option value={{ $study->id }}>{{ $study->matakuliah }}</option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group">
                  <label for="pertemuan">Pertemuan Ke</label>
                  <small class="text-muted">contoh. <i>1</i></small>
                  <input type="text" name="pertemuan_ke" class="form-control" id="pertemuan" placeholder="Masukan Pertemuan ke Anda">
                </div>

                <div class="form-group">
                  <label for="laboratorium">Laboratorium</label>
                  <input type="text" name="laboratorium" class="form-control" id="laboratorium" placeholder="Masukan Mata Kuliah Anda">
                </div>




                {{-- <div class="form-group">
                  <label for="disabledInput">Readonly Input</label>
                  <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="You can't update me :P">
                </div>

                <div class="form-group">
                  <label for="disabledInput">Static Text</label>
                  <p class="form-control-static" id="staticInput">email@mazer.com</p>
                </div> --}}
              </div>

            </div>



          </div>
      </section>



      {{-- Start Cart Section --}}
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Checkout Item</h4>
          </div>
          <div class="card-body table-responsive">
            <div id="read""></div>

            <div class="check d-flex justify-content-between align-content-center mt-4 table-footer">
              <h4 id='total'>Alat yang anda pinjam ({{ $inCart }})</h4>
              <button id='checkouty' class='btn btn-primary btn-checkout px-lg-5 py-2 ' type="submit">Checkout</button>
            </div>


          </div>
        </div>

      </section>
    </form>

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
@push('addon-script')
<script>
    $(document).ready(function() {
      read()
      
      $(document).on('click','.checkout-item', function(e){
      e.preventDefault();
      // console.log('ok');
      const data = {
        'total ' : $('.qty-input').val(),
      }
      console.log(data);
      
      
      })
      
      

    function read() {
      $.get("{{ url('read') }}", {}, function(carts, status) {
        $("#read").html(carts);
      })
    }
  });



</script>
@endpush

@push('addon-style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
