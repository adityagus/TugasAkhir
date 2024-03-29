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
          <h3>Data Barang</h3>
          <p class="text-subtitle text-muted">Daftar Alat dan Bahan yang tersedia di Jurusan Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        @if (session('success'))
        <div class="alert alert-success p-2">
          {{ session('success') }}
        </div>
        @endif
        
        <div class="card-header d-flex justify-content-between">
          <div class="">
            <a href="{{ route('admin.inventory.create') }}">
              <button class='btn btn-primary btn-opacity-70 rounded'>
                <i class='bi bi-plus bi-sub'></i>Tambah Barang
              </button>
            </a>
          </div>
          <div class="export">
            <a href="{{ route('admin.cetakdatabarang') }}" target="_blank">
              <button class='btn-red'>
                Export PDF &nbsp;  <i class="bi bi-file-earmark-arrow-down "></i>
              </button>
            </a>
          </div>
          
          
          
          
        </div>
        <div class="card-body">

          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Alat & Bahan</th>
                <th>Kategori</th>
                <th>Keseluruhan</th>
                <th>Dipinjam</th>
                <th>Ketersedian</th>
                <th>Lab</th>
                <th class="">Aksi</th>
              </tr>
            </thead>
            @php
            $nomor = 1;
            @endphp
            <tbody>
              {{-- @forelse ( $items as $item) --}}
              @forelse ($items as $item)
              <tr>
                <td>{{ $nomor++ }}</td>
                <td>{{ $item->nama}}</td>
                <td >{{ $item->category_items->namakategori }}</td>
                <td>{{ $item->jumlah}}</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>{{ $item->labs->name }}</td>
                <td class="d-flex justify-content-center">
                  <span class='d-flex d-inline-block'>
                    <a href="{{ route('admin.inventory.show',$item->id) }}" class="btn btn-primary">
                      <i class="fa fa-eye"></i>
                      Detail
                    </a>
                    <a href="{{ route('admin.inventory.edit',$item->id) }}" class="btn btn-info mx-2">
                      Edit
                    </a>
                  </span>

                  <form action="{{ route('admin.inventory.destroy', $item->id )  }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-danger" data-bs-toggle='modal' data-bs-target="#{{ Str::slug($item->nama) }}">
                      Delete
                    </button>
                    
                    <div class="modal fade" id="{{ Str::slug($item->nama)  }}" aria-hidden="true" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title">Hapus Data</h5>
                             <i class="bi bi-x-circle-red"></i>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Apakah {{ $item->nama }} yakin dihapus?</p>
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
                <td colspan="8" class="text-center" value="language"></td>
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
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
@endpush

@push('prepend-script')
<script src="{{ url('user/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

<script>
  // Simple Datatable
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1, {
    "oLanguage": {
      "sEmptyTable": "Data Tidak ada",
      "button" : ['copy', 'csv', 'excel', 'pdf', 'print']
    }
});
  // let dataTable1 = new noRows.DataTable(table1)->'tidak ada';
  
</script>



@endpush