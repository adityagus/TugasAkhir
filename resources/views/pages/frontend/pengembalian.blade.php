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
          <h3>Pengembalian Alat dan Bahan</h3>
          <p class="text-subtitle text-muted">List Penngembalian di Jurusan Teknik Elektro</p>
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
              <h4 class=''>Pengembalian</h4>
        </div>
        <div class="card-body table-responsive">
          <table class='table table-striped' id='table1'>
            <thead>
              <tr>
                <th>NO.</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Kelas</th>
                <th>Mata Kuliah</th>
                <th>Waktu Pengembalian</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @forelse ($items as $item)
              @if ($item->status == 'Selesai' || $item->status == 'Verifikasi' ) 

              <tr>
                <!-- <td colspan='7'><center>No Data</center></td> -->
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->matakuliah }}</td>
                <td>{{ $item->studies }}</td>
                <td>{{ $item->created_at->format('d M Y / H:i A') }}</td>
                <td>
                  
                  @if ($item->status == 'Verifikasi')
                  <span class="badge rounded-pill bg-primary">Dicek</span>
                  
                  @elseif($item->status == 'Selesai')
                  <span class="badge rounded-pill bg-success">Selesai</span>
                  
                  
                  @endif
                </td>
                <td>
                  <span class='d-flex justify-content-center d-inline-block'>
                    <a href="{{ route('showpengembalian', $item->id) }}">
                      <button class='btn-outline-primary rounded py-1 px-3 mx-2'>Detail</button>
                    </a>
                  </span>
                </td>    
                </tr>
              @endif
              @empty
              <tr>
                <td colspan="7" align="center">Peminjaman Kosong</td>
              </tr>
                  
              
              @endforelse
                            
            </tbody>

          </table>
        </div>

      </div>
    </section>
  </div>
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


<script>
// Simple Datatable
let table1 = document.querySelector('#table1');
let dataTable = new simpleDatatables.DataTable(table1);

</script>
@endpush
