@extends('layouts.main')

@section('content')

<div class="px-5 pb-5">
  <header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
      <i class="bi bi-justify fs-3"></i>
    </a>
  </header>
  <div class="page-heading">
    <h3>Dashboard</h3>
    <h6>Halo, Selamat datang Aditya Gustian</h1>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon purple">
                      <i class="iconly-boldShow"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Kesulitan Alat Mudah</h6>
                    <h6 class="font-extrabold mb-0">450</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon blue">
                      <i class="iconly-boldProfile"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Kesulitan Alat Sedang</h6>
                    <h6 class="font-extrabold mb-0">350</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon green">
                      <i class="iconly-boldAdd-User"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Kesulitan Alat Sulit</h6>
                    <h6 class="font-extrabold mb-0">80</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon red">
                      <i class="iconly-boldBookmark"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Alat di pinjam</h6>
                    <h6 class="font-extrabold mb-0">11</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="div">
                    <h4 class=''>Alat Yang Anda Pinjam</h4>
                  </div>
                  <div class="bd-highlight">
                    <form action="">
                      <input type="search" class='form-control'>
                      <i></i>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body table-responsive">
                <table class='table table-bordered table-striped'>
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
                    <tr>
                      <!-- <td colspan='7'><center>No Data</center></td> -->
                      <td>1.</td>
                      <td>Resistor</td>
                      <td>Sulit</td>
                      <td>12 pcs</td>
                      <td>Te</td>
                      <td>Dipinjam</td>
                      <td class='d-flex justify-content-center'>
                        <button class='btn-outline-primary rounded py-1 px-3 mx-2'>Detail</button>
                        <button class='btn-warning rounded py-1 px-3'>Pengembalian</button>
                      </td>
                    </tr>
                    <tr>
                      <!-- <td colspan='7'><center>No Data</center></td> -->
                      <td>2.</td>
                      <td>Resistor</td>
                      <td>Sulit</td>
                      <td>12 pcs</td>
                      <td>Te</td>
                      <td>Dipinjam</td>
                      <td class='d-flex justify-content-center'>
                        <button class='btn-outline-primary rounded py-1 px-3 mx-2'>Detail</button>
                        <button class='btn-warning rounded py-1 px-3'>Pengembalian</button>
                      </td>
                    </tr>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

  <footer>
    <div class="footer clearfix mb-0 text-muted">
      <div class="float-start">
        <p>2021 &copy; Elektro Peminjaman</p>
      </div>
    </div>
  </footer>
</div>
@endsection

@push('addon-styles')
<style>
  .sidebar-wrapper{
    background-color: #dfe1f8;
  }
</style>
@endpush