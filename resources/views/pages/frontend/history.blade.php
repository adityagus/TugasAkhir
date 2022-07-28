@extends('layouts.main')

@section('title')
Pengembalian Alat
@endsection
@section('content')
<div id="main-content">

  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        

        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>History Peminjaman Alat dan Bahan</h3>
          <p class="text-subtitle text-muted">Riwayat Peminjaman di Jurusan Teknik Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header">
              <h4 class=''>Alat Yang Anda Pinjam</h4>
          </div>
        <div class="card-body table-responsive">
          <table class='table table-striped' id='table1'>
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
              @php
                  $no = 1;
              @endphp
              @forelse ($transaction as $item)

              <tr>
                <!-- <td colspan='7'><center>No Data</center></td> -->
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->phone }}</td>
                <td> {{ $item->laboratorium }}</td>
                <td> {{ $item->status }}</td>
                <td class="d-flex justify-content-center">
                  <span class='d-flex d-inline-block'>
                    <a href="{{ route('admin.transaction.show',$item->id) }}">
                      <button class='btn-outline-primary rounded py-1 px-3 mx-2'>Detail</button>
                    </a>
                  </span>
                </td>    
                </tr>
              @empty
              <tr>
                <td colspan="7" align="center">Pengembalian Kosong</td>
              </tr>
                  
              
              @endforelse
                            
            </tbody>

          </table>
        </div>

      </div>
    </section>
  </div>
</div>

  <footer>
    <div class="footer d-flex justify-content-center mb-0 text-muted">
      <div class="float-center">
        <p class='text-center'>2022 &copy; Teknik Elektro</p>
      </div>
  </footer>
</div>
@endsection


@push('prepend-styles')
<link rel="stylesheet" href="user/dist/assets/vendors/simple-datatables/style.css">
@endpush

@push('addon-script')
<script src="{{ url('user/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

@include('sweetalert::alert')

<script>
// Simple Datatable
let table1 = document.querySelector('#table1');
let dataTable = new simpleDatatables.DataTable(table1);

</script>
@endpush

