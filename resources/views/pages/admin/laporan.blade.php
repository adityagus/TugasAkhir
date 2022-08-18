@extends('layouts.main-admin')

@section('title')
    Laporan Jurusan Teknik Elektro
@endsection

@section('content')
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
          <a class="nav-link active" href="{{ route('admin.user.index') }}" tabindex="-1">Laporan</a>
        </li>
      </ul>
      <div class="card-headers">
      {{-- <div class="export">
        <a href="{{ route('admin.cetakdatabarang') }}" target="_blank">
          <button class='btn-red'>
            Export PDF &nbsp;  <i class="bi bi-file-earmark-arrow-down "></i>
          </button>
        </a>
      </div> --}}
    </div>
      
      
      
      
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
</section>
@endsection