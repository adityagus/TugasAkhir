@extends('layouts.main-admin')

@section('title')
    Laporan Jurusan Teknik Elektro
@endsection

@section('content')
<div id="main-content">
<section class="section">
  <div class="card">
    <div class="card-header">
      
      @if (session('success'))
      <div class="alert alert-success d-flex justify-content-between">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"  aria-selected="false" tabindex="-1">Laporan</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" href="{{ route('admin.matakuliah.index') }}" role="tab" aria-controls="profile" aria-selected="true">Mata Kuliah</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" href="{{ route('admin.mahasiswa.index') }}" role="tab" aria-controls="profile" aria-selected="true">Laboratorium</a>
          </li>
        </ul>
      </div>
      
      
      
      

    <div class="card-body">

      <table class="table table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Laporan</th>
            <th>Print</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Ketersedian Barang TE</td>
            <td><a href="{{ route('admin.cetakTe') }}" target="_blank" rel="noopener noreferrer">Download</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Ketersedia Barang TL</td>
            <td><a href="{{ route('admin.cetakdatabarang') }}" target="_blank" rel="noopener noreferrer">Download</a></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Peminjaman Bulan Kemaren</td>
            <td><a href="{{ route('admin.laporanbulanlalu') }}" target="_blank" rel="noopener noreferrer">Download</a></td>
          </tr>
          <tr>
            <td>4</td>
            <td>Peminjaman Bulan ini</td>
            <td><a href="{{ route('admin.laporansebulan') }}" target="_blank" rel="noopener noreferrer">Download</a></td>
          </tr>
          <tr>
            <td>5</td>
            <td>Daftar Mahasiswa Jurusan Teknik Elektro</td>
            <td><a href="{{ route('admin.cetakmahasiswa') }}" target="_blank" rel="noopener noreferrer">Download</a></td>
          </tr>
        </thead>
        @php
        $nomor = 1;
        @endphp
        <tbody>
          {{-- @forelse ( $items as $item) --}}
         
        </tbody>

      </table>
    </div>

  </div>
</div>
</section>
@endsection