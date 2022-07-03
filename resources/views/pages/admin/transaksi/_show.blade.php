@extends('layouts.main-admin')

@section('title')
Admin Inventaris
@endsection

@section('content')


<div id="main-content">

  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Detail &raquo; <span class='text-primary'></span></h3>
          <p class="text-subtitle text-muted">Detail Alat dan Bahan yang tersedia di Jurusan Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.transaction.index') }}">Peminjaman</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        @foreach ($item as $items)
        <div class="card-body">
          
          <table class="table table-bordered middle">
            <tr>
              <th class="px-6 py-4 text-end">Gambar</th>
              <td class="px-6 py-4 text-black">{{ $items->inventory->nama }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">Kode</th>
              <td class="px-6 py-4">{{ $items->kd_brg }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">Nama</th>
              <td class="px-6 py-4">{{ $items->nama }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">Deskripsi</th>
              <td class="px-6 py-4">{{ $items->deskripsi }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">Jumlah</th>
              <td class="px-6 py-4">{{ $items->jumlah }}</td>
            </tr>
            <tr>
              <th class="border px-6 py-4 text-end">Satuan</th>
              <td class="border px-6 py-4">{{ $items->satuan }}</td>
            </tr>
            
            
          </table>
        </div>
        @endforeach
        
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
  let pdfButtonTrans = new {
    {
      trans('global.datatables.pdf')
    }
  };

</script>
@endpush
