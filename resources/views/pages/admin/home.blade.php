@extends('layouts.main-admin')

@section('title')
    Dashboard Admin
@endsection

@section('content')


<div class="px-5 pb-5">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-7 ">
        <h3>Dashboard</h3>
        <h6>Daftar Mahasiswa Jurusan Teknik Elektro</h6>
      </div>
      {{-- <div class="col-md-5 ">
      <form action="{{ route('index') }}">
      <div class="d-flex col-12 jus ">
          <div class="col-9 form-group inline">
          <input type="text" class="form-control" placeholder="Masukan Daftar Mahasiswa" name='search' value="{{ request('search') }}">
          </div>
          <div class="col-3 form-group inline">
            <button class="btn-cari" type="submit">Cari...</button>
          </div>
        </div>
      </form>
    </div> --}}
    </div>
  </div>
  <div class="page-content">
<!--    <section class="list-mahasiswa">
      @if(request('search'))  
        <div class="card ">
          <div class="card-header blue text-white">
              Biodata Mahasiswa
          </div>
          <div class="card-body display d-flex">
            <div class="img">
              @forelse ($mhs as $item)

              {{-- <img src="{{ Storage::url($item->image) }}" alt="alat dan bahan" style="width: 250px; height:160px" class="img-thumbnail"> --}}
              <img src="{{ url('user\dist\assets\images\faces\1.jpg') }} ? " alt="" class="img-thumbnail my-3" width="150px">
              
              @empty
                
              <img src="{{ 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}" alt="alat dan bahan" style="width: 250px; height:160px" class="img-thumbnail">
              
              @endforelse
            </div>
            <div class="descriptions">
              <table>
                @forelse ($mhs as $mhs)
                    
                <tr>
                  <td width='10%'>Nama</td>
                  <td width='5%'>:</td>
                  <td width='0%'>{{ $mhs->nama_mhs }}</td>
                </tr>
                <tr>
                  <td width='10%'>Nim</td>
                  <td width='5%'>:</td>
                  <td width='0%'>{{ $mhs->nim }}</td>
                </tr>
                <tr>
                  <td width='10%'>Prodi</td>
                  <td width='5%'>:</td>
                  <td width='0%'">Teknik Elektronika</td>
                </tr>
                
                @empty
                    
                <tr>
                  <td colspan="3">Data Tidak Ada</td>
                </tr>
                
                @endforelse
                
              </table>
              <h6></h6>
              <h6></h6>
            </div>
                
          </div>
        </div>
        
      </div>
      @endif
    </section> -->
    
    
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
            <div class="card max" style="min-height: 4rem">
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
        
  {{-- Peminjaman mahasiswa --}}
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="div">
                    <h4 class=''>Mahasiswa yang ingin Meminjam</h4>
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
                      <th>Nama Mahasiswa</th>
                      <th>Nim</th>
                      <th>Kelas</th>
                      {{-- <th>Phone</th> --}}
                      <th>Tempat</th>
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
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->nim }}</td>
                      <td>{{ $item->kelas }}</td>
                      {{-- <td>{{ $item->phone }}</td> --}}
                      <td> {{ $item->labs->name }}</td>
                      <td> {{ $item->status }}</td>
                      <td class="d-flex justify-content-center">
                        <span class='d-flex d-inline-block'>
                          <a href="{{ route('admin.transaction.show',$item->id) }}" class="btn btn-primary">
                            <i class="fa fa-eye"></i>
                            Tampilkan
                          </a>
                          <a href="{{ route('admin.transaction.edit',$item->id) }}" class="btn btn-info mx-2">
                            Ubah Status
                          </a>
                        </span>
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

              </div>
            </div>
          </div>
        </div>
   {{-- Pengembalian Mahasiswa --}}
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="div">
                    <h4 class=''>Mahasiswa yang ingin mengembalikan</h4>
                  </div>
                </div>
              </div>
              <div class="card-body table-responsive">
                {{-- Auth --}}
                @auth
                <table class='table table-bordered table-striped '>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Peminjam</th>
                      <th>Phone</th>
                      <th>Keperluan</th>
                      <th>Lab</th>
                      <th>Kondisi Terakhir</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $nomor =1
                    @endphp
                    @forelse ($pengembalian as $item)
                    @if (!$item->status == 'SUCCESS')
                    
                        

                    <tr>
                      <td>{{ $nomor++ }}</td>
                      <td>{{ $item->name}}</td>
                      <td>{{ $item->phone }}</td>
                      <td>{{ $item->keperluan}}</td>
                      <td>{{ $item->laboratorium}}</td>
                      <td>{{ $item->kondisi}}</td>
                      <td>{{ $item->status}}</td>
                      <td class="d-flex justify-content-center">
                        <span class='d-flex d-inline-block'>
                          <a href="{{ route('admin.return.show',$item->id) }}" class="btn btn-primary">
                            <i class="fa fa-eye"></i>
                            Show
                          </a>
                          <a href="{{ route('admin.return.edit',$item->id) }}" class="btn btn-info mx-2">
                            Edit
                          </a>
                        </span>
                      </td>

                      
                      @endif
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
