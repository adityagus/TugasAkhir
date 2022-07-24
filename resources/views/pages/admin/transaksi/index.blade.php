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
            <h3>Transaksi</h3>
            <p class="text-subtitle text-muted">Transaksi peminjaman Alat dan Bahan</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <section class="section">
        <div class="card">
          <div class="card-body">
              <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Peminjam</th>
                  <th>phone</th>
                  <th>keperluan</th>
                  <th>laboratorium</th>
                  <th>waktu peminjaman</th>
                  <th>Status</th>
                  <th class="">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $nomor = 1;
                @endphp
                
                {{-- <tr>
                  <th>No</th>
                  <th>Nama Alat & Bahan</th>
                  <th>Kategori</th>
                  <th>Ketersedian</th>
                  <th>Jenis</th>
                  <th>Aksi</th>
                </tr> --}}
                @forelse ( $transaction as $item)
                    
                <tr>
                  <td>{{ $nomor++ }}</td>
                  <td>{{ $item->name}}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->keperluan}}</td>
                  <td>{{ $item->laboratorium}}</td>
                  <td>{{ $item->created_at->format('d M Y / H:i a')}}</td>
                  <td>{{ $item->status}}</td>
                  <td class="d-flex justify-content-center">
                    <span class='d-flex d-inline-block'>
                      <a href="{{ route('admin.transaction.show',$item->id) }}" class="btn btn-primary">
                        <i class="fa fa-eye"></i>
                        Show
                      </a>
                      <a href="{{ route('admin.transaction.edit',$item->id) }}" class="btn btn-info mx-2">
                        Edit
                      </a>
                    </span>
                  </td>
                  {{-- <td>{{ $item->roles }}</td> --}}
                  
                  {{-- <td class="d-flex justify-content-center">
                    <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-info mx-2">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('admin.users.destroy', $item->id)  }}" method="POST" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td> --}}
                </tr>
                @empty
                <tr>
                  <td colspan="8" class="text-center">Data Kosong</td>
                </tr>
                @endforelse 
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
  let pdfButtonTrans = new {{ trans('global.datatables.pdf') }};
</script>
@endpush