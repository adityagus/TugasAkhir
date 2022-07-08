@extends('layouts.main')

@section('title')
Checkout
@endsection

@section('content')


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
                  <label for="nam">Nama</label>
                  {{-- <input type='hidden' readonly value="{{ Auth::user()->name }}" name="nama"> --}}
                  <input readonly value="{{ Auth::user()->name }}" type="text" name="name" class="form-control" id="nama" placeholder="{{ Auth::user()->name }}"  required>
                </div>

                <div class="form-group">
                  <label for="nama-peminjam">Nim</label>
                  <input type="text" name="nim" class="form-control" id="nama-peminjam" placeholder='Masukan Nama Anda' required>
                </div>

                <div class="form-group">
                  <label for="kelas-peminjam">Kelas</label>
                  <input type="text" name="kelas" class="form-control" id="kelas-peminjam" placeholder="Masukan Kelas Anda" required>
                </div>

                <div class="form-group">
                  <label for="phone">No. Telp</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Masukan Kelas Anda">
                </div>

                <div class="form-group">
                  <label for="mata-kuliah">Keperluan Alat</label>
                  <fieldset class="form-group">
                    <select class="form-select" name='keperluan' id="basicSelect">
                      <option value="PENELITIAN">Penelitian</option>
                      <option value="PRAKTIKUM">Praktikum</option>
                      <option value="PKM">PKM</option>
                    </select>
                  </fieldset>
                </div>
              </div>


              <div class="col-md-6">

                {{-- <div class="form-group">
                  <label for="mata-kuliah">Mata Kuliah</label>
                  <small class="text-muted">contoh. <i>elektronika dasar</i></small>
                  <select type="text" class="form-control" id="mata-kuliah" placeholder="Masukan Mata Kuliah Anda">
                    {{-- @foreach ($carts as $item)
                <option value="{{ $item->study->matakuliah }}">{{ $item->study->matakuliah }}</option>
                @endforeach

                </select>
              </div> --}}

              <div class="form-group">
                <label for="mata-kuliah">Pertemuan Ke</label>
                <small class="text-muted">contoh. <i>1</i></small>
                <input type="text" name="pertemuan_ke" class="form-control" id="mata-kuliah" placeholder="Masukan Pertemuan ke Anda">
              </div>

              <div class="form-group">
                <label for="mata-kuliah">Laboratorium</label>
                <input type="text" name="laboratorium" class="form-control" id="mata-kuliah" placeholder="Masukan Mata Kuliah Anda">
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
          <div class="d-flex justify-content-between align-content-center mt-4 table-footer">
            <h4>Alat yang anda pinjam ({{ $inCart }})</h4>
            <button class='btn btn-primary px-lg-5 py-2 ' type="submit">Checkout</button>
          </div>
          </form>

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
        <table class='table table-striped'>
          <thead>
            <tr>
              <th>Nama Alat & Bahan</th>
              <th>Kategori</th>
              <th>Jumlah Dipinjam</th>
              <th>Jenis</th>
              <th class="">Aksi</th>
            </tr>
          </thead>
          <tbody >
            <div>
              @forelse ($carts as $item)
              <tr>
                <!-- <td colspan='7'><center>No Data</center></td> -->
                <td>{{ $item->inventory->nama }}</td>
                <td>{{ $item->inventory->category_items->namakategori }}</td>
                <td>{{ $item->inventory->jumlah }}</td>
                <td>{{ $item->inventory->labs->name }}</td>
                <td>
                  <button class="btn btn-toggle shadow-none" onClick="cartDelete({{ $item->id }})">
                    X
                  </button>
                </td>

              </tr>

              @empty
              <td colspan="5" class='text-center'>
                <h6>Oopps Transaksi Belum Ada</h6>
                <a href="{{ route('peminjaman') }}" class="no-underline">Kembali</a>
              </td>
              @endforelse

          </tbody>
        </table>


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

@push('addon-script')
<script>
  function cartDelete($id) {
    $.ajax({
      type: 'get'
      , url: "{{ url('cart') }}/" + id
      , data: "name=" + nama
      , succes: function(data) {
        $(".btn-close").click();
        read()
      }

    })
  }

</script>
@endpush
