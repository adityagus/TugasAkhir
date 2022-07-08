@extends('layouts.main')

@section('title')
    Pengembalian Alat
@endsection
@section('content')
  <div id="main-content">

    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Pengembalian Alat dan Bahan</h3>
            <p class="text-subtitle text-muted">Alat dan bahan yang anda pinjam yakk</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Simple Datatable</h4>
          </div>
          <div class="card-body table-responsive">
            <table class='table table-bordered table-striped  fa-scroll'>
              <thead>
                <tr>
                  <th>NO.</th>
                  <th>Nama Alat & Bahan</th>
                  <th>Kategori</th>
                  <th>Jumlah Dipinjam</th>
                  <th>Jenis</th>
                  <th>Status</th>
                  <th>Aksi</th>
                 </tr>
              </thead>
              <tbody>
                @forelse ($items as $item)
                    
                <tr>
                  <!-- <td colspan='7'><center>No Data</center></td> -->
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->inventory->nama }}</td>
                  <td>{{ $item->inventory->category_items->namakategori }}</td>
                  <td>{{ $item->total }}</td>
                  <td>{{ $item->inventory->labs->name }}</td>
                  <td>{{ $item->transaction->status }}</td>
                  <td class='d-flex justify-content-center'>
                    <button class='btn-outline-primary rounded py-1 px-3 mx-2'>Detail</button>
                    <button class='btn-warning rounded py-1 px-3'>Pengembalian</button>
                  </td>
                </tr>
                    
                @empty
                    <tr>
                      <td colspan="8" class='text-center'>Data Kosong</td>
                    </tr>
                @endforelse

              </tbody>
              
            </table>
          </div>

        </div>
      </section>
    </div>

    <footer>
      <div class="footer d-flex justify-content-center mb-0 text-muted">
        <div class="float-center">
          <p class='text-center'>2022 &copy; Teknik Elektro</p>
      </div>
    </footer>
  </div>
@endsection

@push('prepend-script')
<link rel="stylesheet" href="user/dist/assets/vendors/simple-datatables/style.css">
@endpush

{{-- @push('prepend-script')
<script src="{{ url('user/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

<script>
  // Simple Datatable
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endpush --}}