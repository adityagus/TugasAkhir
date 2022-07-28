@extends('layouts.main-admin')

@section('title')
Edit Inventaris
@endsection

@section('content')


<div id="main-content">

  <div class="page-heading ">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit Data Barang <span class='text-primary'>{{ $item->nama }}</span></h3>
          <p class="text-subtitle text-muted">Membuat Alat dan Bahan yang tersedia di Jurusan Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.inventory.index') }}">CRUD Data Barang</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body">
        
         @if ($errors->any())
            <div class="mb-3" role="alert">
              <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                There's Something Wrong!!
              </div>
            <div class="border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text red-700">
              <p>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{ $error }</li>
                  @endforeach
                </ul>
              </p>
            </div>
            </div>
          @endif
          
          <form action="{{ route('admin.inventory.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
              <label for="kode" class="form-label">Kode Barang</label>
              <input type="text" class="form-control text-bold" name="kd_brg" value="{{ old('kd_brg') ?? $item->kd_brg }}" id="kode" placeholder="Masukan Kode Barang" required>
            </div>

            <div class="mb-2">
              <label for="nama" class="form-label">Nama Barang</label>
              <input type="text" class="form-control text-bold" name="nama" value="{{ old('nama') ?? $item->nama}}" id="nama" placeholder="Masukan Nama Barang">
            </div>

            <div class="mb-2">
              <label for="namakategori" class="">Kategori </label>
              <select name="category_id" id="namakategori" required class="form-select">
                <option value="{{ $item->category_id }}" class=''>Jangan Diubah</option>
                @foreach ($items as $category)
                <option value="{{ $category->id }}">
                  {{ $category->namakategori }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="mb-2">
              <label for="deskripsii" class="form-label">Deskripsi</label>
              <textarea name="deskripsi" type="text" rows="12" required autofocus class="form-control text-bold" id="deskripsii" placeholder="Masukan Deskripsi Barang" required>{!!  old('deskripsi') ?? $item->deskripsi  !!}</textarea>
            </div>

            <div class="mb-2">
              <label for="jumlah" class="form-label">Jumlah</label>
              <input type="text" class="form-control text-bold" name="jumlah" value="{{ old('jumlah') ?? $item->jumlah }}" id="jumlah" placeholder="Masukan Jumlah Barang" required>
            </div>

            <div class="mb-4">
              <label for="satuan" class="form-label">Satuan</label>
              <input type="text" class="form-control text-bold text-gray-600" value="{{ old('satuan') ?? $item->satuan }}" name="satuan" id="satuan" placeholder="Masukan Jumlah Barang" required>
            </div>

            <div class="mb-2 d-grid gap-1">
              <button class='btn btn-success w-full' type='submit'>Update Barang</button>
            </div>

          </form>
        </div>

      </div>
    </section>
  </div>

  <footer>
    <div class="footer clearfix mb-0 text-muted">
      <div class="float-end">
        <p>2022 &copy; Jurusan Teknik Elektro</p>
      </div>
    </div>
  </footer>
</div>
@endsection

@push('prepend-script')
<link rel="stylesheet" href="{{ url('user/dist/assets/vendors/simple-datatables/style.css') }}">
@endpush

@push('prepend-script')
<script src="{{ url('user/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

<script>
  // Simple Datatable
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1);

</script>

@endpush
@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
          .create( document.querySelector( '#deskripsii' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
@endpush
