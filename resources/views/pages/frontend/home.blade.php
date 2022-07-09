@extends('layouts.main')

@section('content')


<div class="px-5 pb-5">
  <div class="page-heading">
    <h3>Dashboard</h3>
    <h6>Halo, Selamat datang
      @auth
      {{ Auth::user()->name }}
      @endauth
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card" style="min-height: 8rem">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon purple">
                      <i class="iconly-boldShow"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Jumlah Alat</h6>
                    <h6 class="font-extrabold mb-0">{{ $jumlah_alat }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card max" style="min-height: 6rem">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon blue">
                      <i class="iconly-boldProfile"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Mahasiswa yang meminjam </h6>
                    <h6 class="font-extrabold mb-0">{{ $user_pinjam }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card" style="min-height: 8rem">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon green">
                      <i class="iconly-boldAdd-User"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Pending</h6>
                    <h6 class="font-extrabold mb-0">{{ $loan_pending }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card" style="min-height: 8rem">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon red">
                      <i class="iconly-boldBookmark"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">SUCCESS</h6>
                    <h6 class="font-extrabold mb-0">{{ $loan_success }}</h6>
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
                {{-- Auth --}}
                @auth
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
                    @php
                    $no =1
                    @endphp
                    @forelse ($items as $item)

                    <tr>
                      <!-- <td colspan='7'><center>No Data</center></td> -->
                      <td>{{ $no++ }}</td>
                      <td>{{ $item->inventory->nama }}</td>
                      <td>{{ $item->inventory->category_items->namakategori }}</td>
                      <td>{{ $item->total }}</td>
                      <td>{{ $item->inventory->labs->name }}</td>
                      <td> {{ $item->transaction->status }}</td>
                      {{-- <td>{{ $status->status }}</td> --}}
                      {{-- @if ($item->sta)
                          
                      @elseif($condition)
                          
                      @endif --}}
                      <td class='d-flex justify-content-center'>
                        <button class='btn-outline-primary rounded py-1 px-3 mx-2'>Detail</button>
                        <button class='btn-warning rounded py-1 px-3'>Pengembalian</button>
                      </td>
                    </tr>




                    @empty


                    <tr>
                      <td colspan="8" class="text-center">Data Kosong</td>
                    </tr>


                    @endforelse




                  </tbody>

                </table>
                @endauth

                {{-- End Auth --}}

                {{-- Guest --}}
                @guest
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
                      <td colspan="8" class="text-center">Data Kosong</td>
                    </tr>
                  </tbody>

                </table>
                @endguest
                {{-- End Guest --}}
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
        <p>2022 &copy; Elektro Peminjaman</p>
      </div>
    </div>
  </footer>
</div>
@endsection
