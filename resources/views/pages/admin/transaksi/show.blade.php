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
          <h3>Transaksi Detail</h3>
          <p class="text-subtitle text-muted">Transaksi Detail yang Meminjam di Jurusan Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.transaction.index') }}">Peminjaman</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                transaksi &raquo; #{{ $transaction->id }} <span class='text-primary'>{{ $transaction->name }}</span>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body">
          <div class="card-header">
            <div class="export d-flex justify-content-end">
              <a href="{{ route('admin.cetakpeminjaman', $transaction->id) }}" target="_blank">
                <button class='btn-red'>
                  Export PDF &nbsp;  <i class="bi bi-file-earmark-arrow-down "></i>
                </button>
              </a>
            </div>
          </div>
          <table class="table table-bordered middle">
            <tr>
              <th class="px-6 py-4 text-end">Nama</th>
              <td class="px-6 py-4">{{ $transaction->name }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">Nim</th>
              <td class="px-6 py-4">{{ $transaction->nim }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">Kelas</th>
              <td class="px-6 py-4">{{ $transaction->kelas }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">No. Telp</th>
              <td class="px-6 py-4">{{ $transaction->phone }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">Waktu Peminjaman</th>
              <td class="px-6 py-4">{{ $transaction->created_at->format('d M Y / H:i a')}}</td>
              
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">Mata Kuliah</th>
              <td class="px-6 py-4">{{ $transaction->studies->matakuliah }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end">Pertemuan Ke</th>
              <td class="px-6 py-4">{{ $transaction->pertemuan_ke }}</td>
            </tr>
            <tr>
              <th class="border px-6 py-4 text-end">Keperluan</th>
              <td class="border px-6 py-4">{{ $transaction->keperluan }}</td>
            </tr>
            <tr>
              <th class="border px-6 py-4 text-end">Laboratorium</th>
              <td class="border px-6 py-4">{{ $transaction->labs->name }}</td>
            </tr>
            <tr>
              <th class="border px-6 py-4 text-end">Status</th>
              <td class="border px-6 py-4">{{ $transaction->status}}</td>
            </tr>
            

          </table>
        </div>

      </div>
    </section>
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Transaksi Item</h3>
        <p class="text-subtitle text-muted">Transaksi Item yang di pinjam di Jurusan Elektro</p>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Alat dan Bahan</th>
                <th>Banyak</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $nomor = 1;
              @endphp
{{-- <td>{{ $no++ }}</td> --}}

               @foreach ( $loanitem as $loan) 
               
               <tr>
                 <td>{{ $loan->id }}</td>
                 <td>{{ $loan->inventory->nama }}</td>
                 <td>{{ $loan->total }}</td>
                 <td>
                  <form action="{{ route('admin.delete-loan', $loan->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">
                      <i class="bi-trash" style="height: 16px;"></i>
                  </form>
                 </td>
              
              </tr>
              @endforeach
              {{-- @empty
              <tr>
                <td colspan="8" class="text-center">Data Kosong</td>
              </tr>
              @endforelse  --}}
              
              
              
            
            </tbody>
          </table>
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
  let pdfButtonTrans = new {
    {
      trans('global.datatables.pdf')
    }
  };

</script>
@endpush
