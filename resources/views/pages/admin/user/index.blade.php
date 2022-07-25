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
            <h3>Users</h3>
            <p class="text-subtitle text-muted">Daftar user yang ada di Jurusan Elektro</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <section class="section">
        <div class="card">
          <div class="card-header">

          </div>
          <div class="card-body">
              <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>email</th>
                  <th>roles</th>
                  <th class="">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $nomor = 1;
                @endphp
                
                @forelse ( $user as $users)
                <tr>
                  <td>{{ $nomor++ }}</td>
                  <td>{{ $users->id}}</td>
                  <td>{{ $users->name}}</td>
                  <td>{{ $users->email }}</td>
                  <td>{{ $users->roles->name}}</td>
                  <td class="d-flex justify-content-center">
                    <span class='d-flex d-inline-block'>
                      <a href="{{ route('admin.user.edit', $users->id) }}" class="btn btn-info mx-2">
                        Edit
                      </a>
                    </span>
                   
                    <form action="{{ route('admin.user.destroy', $users->id)  }}" onclick="return confirm('Yakin Hapus?')" method="POST" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">
                        Delete
                      </button>
                    </form> 
                  </td>
                  {{-- <td>{{ $item->roles }}</td> --}}
                  
                  {{-- <td class="d-flex justify-content-center">
                    <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-info mx-2">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('admin.users.destroy', $item->id)  }}" method="POST" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td> --}}
                </tr>
                @empty
                <tr>
                  <td colspan="7" class="text-center">Data Kosong</td>
                </tr>
                @endforelse 
                  </tbody>
                
                
                
              
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
  let dataTable = new simpleDatatables.DataTable(table1);
  let pdfButtonTrans = new {{ trans('global.datatables.pdf') }};
</script>
@endpush