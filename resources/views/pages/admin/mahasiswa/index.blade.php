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
          <h3>Data Mahasiswa</h3>
          <p class="text-subtitle text-muted">Daftar Mahasiswa/i terdaftar   di Jurusan Elektro</p>  
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
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
              <a class="nav-link" href="{{ route('admin.user.index') }}" tabindex="-1">User</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="profile-tab" href="{{ route('admin.mahasiswa.index') }}" role="tab" aria-controls="profile" aria-selected="true">Mahasiswa</a>
            </li>
          </ul>
          <div class="card-headers d-flex justify-content-between pt-4">
          <div>
            <a href="{{ route('admin.mahasiswa.create') }}">
              <button class='btn btn-primary btn-opacity-70 rounded'>
                <i class='bi bi-plus bi-sub'></i>Tambah Mahasiswa
              </button>
            </a>
          </div>
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
                <th>Nama</th>
                <th>Nim</th>
                <th>Prodi</th>
                {{-- <th>Dipinjam</th>
                <th>Ketersedian</th> --}}
                <th class='text-center'>Aksi</th>
              </tr>
            </thead>
            @php
            $nomor = 1;
            @endphp
            <tbody>
              {{-- @forelse ( $items as $item) --}}
              @forelse ($mahasiswa as $mhs)
              <tr>
                <td>{{ $nomor++ }}</td>
                <td>{{ $mhs->nama_mhs}}</td>
                <td >{{ $mhs->nim }}</td>
                <td>{{ $mhs->prodi}}</td>
                {{-- <td>{{ $item->sisa_pinjam}}</td> --}}
                <td class="d-flex justify-content-center">
                  <span class='d-flex d-inline-block'>
                    <a href="{{ route('admin.mahasiswa.edit',$mhs->id) }}" class="btn btn-info mx-2">
                      Edit
                    </a>
                  </span>

                  <form action="{{ route('admin.mahasiswa.destroy', $mhs->id )  }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-danger" data-bs-toggle='modal' data-bs-target="#{{ Str::slug($mhs->nama_mhs) }}">
                      Delete
                    </button>
                    
                    <div class="modal fade" id="{{ Str::slug($mhs->nama_mhs)  }}" aria-hidden="true" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title">Menghapus Data Mahasiswa</h5>
                             <i class="bi bi-x-circle-red"></i>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Apakah Data Mahasiswa {{ $mhs->nama_mhs }} yakin dihapus?</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus Data</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="8" class="text-center" value="language">Data Tidak ada</td>
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
  let dataTable = new simpleDatatables.DataTable(table1, {
    "oLanguage": {
      "sEmptyTable": "Data Tidak ada",
    }
});
  
</script>



@endpush