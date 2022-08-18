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
          <h3>Ubah Status</h3>
          <p class="text-subtitle text-muted">Membuat Alat dan Bahan yang tersedia di Jurusan Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.transaction.index') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.transaction.index') }}">Approval Peminjaman</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Ubah &raquo; #{{ $transaction->id }} <span class='text-primary'>{{ $transaction->name }}</span>
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
          
          <form action="{{ route('admin.transaction.update', $transaction->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            
            <div class="mb-2">
              <label for="keterangan" class="form-label">Keterangan</label>
              <textarea name="keterangan" type="text" rows="2"  class="form-control text-bold" id="keterangan" placeholder="Masukan Deskripsi Barang">{!!  old('keterangan') ?? $transaction->keterangan  !!}</textarea>
            </div>

            <div class="mb-4">
              <label for="status" class="">Status</label>
              <select name="status" id="status" required class="form-select">
                <option class='' style="color:#607080" value="{{ $transaction->status }}">{{ $transaction->status }}</option>
                <option disabled>-----------------------------------------------------------------------------------------------------------------------------------------------------</option>
                <option value="Verifikasi">Verifikasi</option>
                <option value="Meminjam">Meminjam</option>
                <option value="Ditolak">Ditolak</option>
              </select>
            </div>



            <div class="mb-2 d-grid gap-1">
              <button class='btn btn-success w-full' type='submit'>Update Data</button>
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

@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
          .create( document.querySelector( '#keterangan' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
@endpush

@push('prepend-script')
<script src="{{ url('user/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

<script>
  // Simple Datatable
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1);
  
  // 

</script>

{{-- ckeditor --}}

@endpush
