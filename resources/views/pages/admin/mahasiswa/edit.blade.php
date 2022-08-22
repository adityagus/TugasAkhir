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
          <h3>Edit Mahasiswa <span class='text-primary'>{{ $mahasiswa->nama_mhs }}</span></h3>
          <p class="text-subtitle text-muted">Mengubah data mahasiswa jurusan Teknik Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.mahasiswa.index') }}">Data Mahasiswa</a></li>
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
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
          
        <form action="{{ route('admin.mahasiswa.update', $mahasiswa->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
              <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
              <input type="text" class="form-control text-bold" name="nama_mhs" value="{{ old('nama_mhs') ?? $mahasiswa->nama_mhs }}" id="nama_mhs" placeholder="Masukan Kode Barang" required>
            </div>

            <div class="mb-2">
              <label for="kelas" class="form-label">Kelas</label>
              <input type="text" class="form-control text-bold" name="kelas" value="{{ old('kelas') ?? $mahasiswa->kelas}}" id="kelas" placeholder="Masukan Kelas Mahasiswa">
            </div>
            
            <div class="mb-2">
              <label for="nim" class="form-label">Nim</label>
              <input type="text" class="form-control text-bold" name="nim" value="{{ old('nim') ?? $mahasiswa->nim}}" id="nim" placeholder="Masukan Nim Mahasiswa">
            </div>

            <div class="mb-4">
              <label for="prodi" class="form-label">Prodi</label>
              <input type="text" class="form-control text-bold" name="prodi" value="{{ old('prodi') ?? $mahasiswa->prodi }}" id="prodi" placeholder="Masukan Prodi" required>
            </div>

            <div class="mb-2 d-grid gap-1">
              <button class='btn btn-success w-full' type='submit'>Update Data Mahasiswa</button>
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
