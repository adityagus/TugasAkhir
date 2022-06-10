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
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>jumlah alat</th>
                  <th>Sedang dipinjam</th>
                  <th>Sisa Alat</th>
                  <th>Jenis</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Kapasitor</td>
                  <td>Mudah</td>
                  <td>15</td>
                  <td>12</td>
                  <td>3</td>
                  <td>TE</td>
                  <td>
                    <span class='d-flex d-inline-block'>
                      <button class='btn btn-primary mx-1'>Detail</button>
                      <button class='btn btn-success mx-1'>Pinjam</button>
                    </span>
                  </td>
                </tr>
                
                <tr>
                  <td>Kapasitor</td>
                  <td>Mudah</td>
                  <td>15</td>
                  <td>12</td>
                  <td>3</td>
                  <td>TE</td>
                  <td>
                    <span class='d-flex d-inline-block'>
                      <button class='btn btn-primary mx-1'>Detail</button>
                      <button class='btn btn-success mx-1'>Pinjam</button>
                    </span>
                  </td>
                </tr>
                
                <tr>
                  <td>Kapasitor</td>
                  <td>Mudah</td>
                  <td>15</td>
                  <td>12</td>
                  <td>3</td>
                  <td>TE</td>
                  <td>
                    <span class='d-flex d-inline-block'>
                      <button class='btn btn-primary mx-1'>Detail</button>
                      <button class='btn btn-success mx-1'>Pinjam</button>
                    </span>
                  </td>
                </tr>
                
                <tr>
                  <td>Kapasitor</td>
                  <td>Mudah</td>
                  <td>15</td>
                  <td>12</td>
                  <td>3</td>
                  <td>TL</td>
                  <td>
                    <span class='d-flex d-inline-block'>
                      <button class='btn btn-primary mx-1'>Detail</button>
                      <button class='btn btn-success mx-1'>Pinjam</button>
                    </span>
                  </td>
                </tr>
                
                <tr>
                  <td>Multimeter</td>
                  <td>Sedang</td>
                  <td>15</td>
                  <td>12</td>
                  <td>3</td>
                  <td>TL</td>
                  <td>
                    <span class='d-flex d-inline-block'>
                      <button class='btn btn-primary mx-1'>Detail</button>
                      <button class='btn btn-success mx-1'>Pinjam</button>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Kapasitor</td>
                  <td>Mudah</td>
                  <td>15</td>
                  <td>12</td>
                  <td>3</td>
                  <td>TL</td>
                  <td>
                    <span class='d-flex d-inline-block'>
                      <button class='btn btn-primary mx-1'>Detail</button>
                      <button class='btn btn-success mx-1'>Pinjam</button>
                    </span>
                  </td>
                </tr>
                
                
                
                
              
              </tbody>
            </table>
          </div>

        </div>
      </section>
    </div>

    <footer>
      <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
          <p>2021 &copy; Aditya Gustian</p>
        </div>
        <div class="float-end">
          <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
            by <a href="https://ahmadsaugi.com"></a></p>
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