@extends('layouts.main-admin')

@section('title')
Admin Inventaris
@endsection

@section('content')


<div id="main-content">

    <section class="section">
      <div class="card">
        <div class="card-header">
          
        
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link" id='laporan-tab' href="{{ route('admin.laporan') }}" role="tab" arial-control='matakuliah'>Laporan</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" href="{{ route('admin.matakuliah.index') }}" role="tab" aria-controls="matakuliah" aria-selected="true">Mata Kuliah</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="profile-tab" href="{{ route('admin.mahasiswa.index') }}" role="tab" aria-controls="laboratorium" aria-selected="true">Laboratorium</a>
          </li>
        </ul>
        <div class="card-headers d-flex justify-content-between pt-4">
          <div>
            <a href="{{ route('admin.laboratorium.create') }}" >
              <button class='btn btn-primary mb-2' >
                <i class='bi bi-plus bi-sub'></i>Tambah Laboratorium
              </button>
            </a>
          </div>
        </div>


        @if (session('success'))
        <div class="alert alert-success d-flex justify-content-between">
        {{ session('success') }}
        <a type="button" class="btn-close btn-close-white btn-close-focus-opacity" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
      @endif
          
          
        </div>
        <div class="card-body">

          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Laboratorium</th>
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
              @forelse ($labs as $lab)
              <tr>
                <td>{{ $nomor++ }}</td>
                <td>{{ $lab->name}}</td>

                <td>
                  <div class="d-flex justify-content-center">
                    
                    <span class='d-flex d-inline-block'>
                      <a href="{{ route('admin.laboratorium.edit', $lab->id) }}" class="btn btn-info mx-2">
                        Edit
                      </a>
                    </span>
  
                    <form action="{{ route('admin.laboratorium.destroy', $lab->id )  }}" method="POST" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="button" class="btn btn-danger" data-bs-toggle='modal' data-bs-target="#{{ Str::slug($lab->name) }}">
                        Delete
                      </button>
                      
                      <div class="modal fade" id="{{ Str::slug($lab->name)  }}" aria-hidden="true" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title">Hapus Laboratorium</h5>
                               <i class="bi bi-x-circle-red"></i>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p>Apakah {{ $lab->name }} yakin dihapus ?</p>
                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-danger">Hapus Data</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
@endpush

@push('prepend-script')
<script src="{{ url('user/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

<script>
  // Simple Datatable
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1, {
    "oLanguage": {
      "sEmptyTable": "Data Tidak ada"
    }
});
  // let dataTable1 = new noRows.DataTable(table1)->'tidak ada';
  
</script>



@endpush