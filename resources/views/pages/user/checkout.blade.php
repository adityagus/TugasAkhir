@extends('layouts.main')

@section('title')
    Checkout
@endsection

@section('content')
<div id="main-content">

  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <div class="d-flex d-inline-block ">
            <i class="bi bi-cart bi-sub fs-5 bold text-gray-600 mx-4"></i>
            <h3>Checkout</h3>
          </div>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="peminjaman.html">Peminjaman</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="form-group">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Biodata Diri</h4>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama-peminjam">Nama</label>
                <input type="text" class="form-control"  id="nama-peminjam" placeholder='Masukan Nama Anda'>
              </div>

              <div class="form-group">
                <label for="kelas-peminjam">Kelas</label>
                <input type="text" class="form-control" id="kelas-peminjam" placeholder="Masukan Kelas Anda">
              </div>

              <div class="form-group">
                <label for="mata-kuliah">Mata Kuliah</label>
                <small class="text-muted">contoh. <i>elektronika dasar</i></small>
                <input type="text" class="form-control" id="mata-kuliah" placeholder="Masukan Mata Kuliah Anda">
              </div>
              
              <div class="form-group">
                <label for="mata-kuliah">Pertemuan Ke</label>
                <small class="text-muted">contoh. <i>1</i></small>
                <input type="text" class="form-control" id="mata-kuliah" placeholder="Masukan Mata Kuliah Anda">
              </div>
            </div>
            
            
            <div class="col-md-6">
              
              <div class="form-group">
                <label for="mata-kuliah">Keperluan Alat</label>
                <fieldset class="form-group">
                  <select class="form-select" id="basicSelect">
                      <option>Penelitian</option>
                      <option>Pratikum</option>
                      <option>PKM</option>
                  </select>
              </fieldset>
              </div>
              
              <div class="form-group">
                <label for="disabledInput">Disabled Input</label>
                <input type="text" class="form-control" id="disabledInput" placeholder="Disabled Text" disabled="">
              </div>
              <div class="form-group">
                <label for="disabledInput">Readonly Input</label>
                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="You can't update me :P">
              </div>

              <div class="form-group">
                <label for="disabledInput">Static Text</label>
                <p class="form-control-static" id="staticInput">email@mazer.com</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Simple Datatable</h4>
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
                  <a href="" class='text-red-500'>X</a>
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
                  <a href="" class='text-red-500'>X</a>
                </td>
              </tr>
            </tbody>

          </table>
          <div class="d-flex justify-content-between align-content-center mt-4 table-footer">
            <h4>Alat yang anda pinjam (14)</h4>
            <a href="/checkout-success">
              <button class='btn btn-primary px-lg-5 py-2 '>Checkout</button>
            </a>
            
          </div>
        </div>

      </div>
    </section>
  </div>

  <footer>
    <div class="footer clearfix  mt-2 mb-0 ">
      <div class="container">
        <h6>Catatan :</h6>
        <ol type="1">
          <li>Kerusakan dan kehilangan alat/bahan wajib diganti sesuai dengan spesifikasi alat yang sama dan akan ditanggung oleh peminjam atau kelompok</li>
          <li>Keterlambatan pengembalian alat/bahan akan dikenakan denda sesuai aturan yang berlaku</li>
        </ol>
      </div>
    </div>
  </footer>
</div>
@endsection