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
              <li class="breadcrumb-item"><a href="#">Approval</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.return.index') }}">Peminjaman</a></li>
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
          
          <form action="{{ route('admin.return.update', $return->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
              <label for="status" class="">Name</label>
              <select name="status" id="status" required class="form-select">
                <option class='' style="color:#607080" value="{{ $return->status }}">{{ $return->status }}</option>
                <option disabled>-----------------------------------------------------------------------------------------------------------------------------------------------------</option>
                <option value="VERTIFIKASI">VERTIFIKASI</option>
                <option value="DIKEMBALIKAN">DIKEMBALIKAN</option>
                <option value="FAILED">FAILED</option>
                <option value="CANCEL">CANCEL</option>
              </select>
            </div>



            <div class="mb-2 d-grid gap-1">
              <button class='btn btn-success w-full' type=''>Update Data</button>
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
