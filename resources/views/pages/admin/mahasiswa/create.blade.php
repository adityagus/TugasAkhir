@extends('layouts.main-admin')

@section('title')
Create Inventaris
@endsection

@section('content')


<div id="main-content">

  <div class="page-heading ">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Create Data Barang</h3>
          <p class="text-subtitle text-muted">Membuat Alat dan Bahan yang tersedia di Jurusan Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.inventory.index') }}">CRUD Data Barang</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body">

          {{-- @if ($errors->any())
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
          @endif --}}

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{ route('admin.mahasiswa.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
              <label for="kode" class="form-label">Nama Mahasiswa</label>
              <input type="text" class="form-control text-bold" name="nama_mhs" value="{{ old('nama_mhs') }}" id="kode" placeholder="Masukan Nama Mahasiswa" required>
            </div>

            <div class="mb-2">
              <label for="kelas" class="form-label">Kelas</label>
              <input type="text" class="form-control text-bold" name="kelas" value="{{ old('kelas') }}" id="kelas" placeholder="Masukan Kelas Mahasiswa">
            </div>
            
            <div class="mb-2">
              <label for="nim" class="form-label">Nim</label>
              <input type="text" class="form-control text-bold" name="nim" value="{{ old('nim') }}" id="nim" placeholder="Masukan Nim Mahasiswa">
            </div>

            <div class="mb-4">
              <label for="prodi" class="form-label">Prodi</label>
              <input type="text" class="form-control text-bold" value="{{ old('prodi') }}" name="prodi" id="prodi" placeholder="Masukan Prodi Mahasiswa" required>
            </div>

            <div class="mb-2 d-grid gap-1">
              <button class='btn btn-success w-full' type='submit'>Submit</button>
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
