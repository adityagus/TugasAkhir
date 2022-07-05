@extends('layouts.main')

@section('title')
    aaa
@endsection

@section('content')


  <div id="main-content">

    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Peminjaman Alat dan Bahan</h3>
            <p class="text-subtitle text-muted">Halaman untuk melihat data barang serta dapat meminjamnya</p>
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
          <div class="card-header">
            <h4 class="card-title">Simple Datatable</h4>
          </div>
          <div class="card-body">
              <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Alat & Bahan</th>
                  <th>Kategori</th>
                  <th>Ketersedian</th>
                  <th>Lab</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($items as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->category_items->namakategori }}</td>
                  <td>{{ $item->jumlah }}</td>
                  <td>{{ $item->labs->name }}</td>
                  <td>
                    <span class='d-flex d-inline-block'>
                      <a href='{{ route('login') }}'>
                        <button class='btn btn-primary mx-1'  type="submit">Detail</button>
                      </a>
                      <button class='btn btn-success mx-1'>Pinjam</button>
                    </span>
                  </td>
                </tr>
                @empty
                    
                @endforelse
                
                
                
              
              </tbody>
            </table>
          </div>

        </div>
      </section>
    </div>

    <footer>
      <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
          <p>2022 &copy; Teknik Elektro</p>
        </div>
      </div>
    </footer>
  </div>
@endsection

@push('prepend-script')
<link rel="stylesheet" href="user/dist/assets/vendors/simple-datatables/style.css">
@endpush

@push('prepend-script')
<script src="{{ url('user/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

<script>
  // Simple Datatable
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endpush