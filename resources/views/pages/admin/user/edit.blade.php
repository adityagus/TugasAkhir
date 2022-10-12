@extends('layouts.main-admin')

@section('title')
Edit Inventaris
@endsection

@section('content')


<div id="main-content">

  <div class="page-heading ">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit User <span class='text-primary'>{{ $user->name }}</span></h3>
          <p class="text-subtitle text-muted">Membuat Alat dan Bahan yang tersedia di Jurusan Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Data User</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body">
        
         @if ($errors->any())
            <div class="mb-3" role="alert">
              <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                There's Something Wrong!!
              </div>
            <div class="border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text red-700">
              <p>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{ $error }</li>
                  @endforeach
                </ul>
              </p>
            </div>
            </div>
          @endif
          
          <form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control text-bold" name="name" value="{{ old('name') ?? $user->name }}" id="kode" placeholder="Masukan Nama Anda" required>
            </div>

            <div class="mb-2">
              <label for="nama" class="form-label">Email</label>
              <input type="text" class="form-control text-bold" name="email" value="{{ old('email') ?? $user->email}}" id="nama" placeholder="Masukan Email Anda">
            </div>
            
            <div class="mb-2">
              <label for="nip" class="form-label">Nip</label>
              <input type="text" class="form-control text-bold" name="nip" value="{{ old('nip') ?? $user->nip }}" id="nip" placeholder="Masukan NIP Anda">
            </div>
            

            <div class="mb-4">
              <label for="roles" class="form-label">Roles</label>
              <select name="roles_id" id="roles" class="form-select text-bold">
                <option value="{{ $user->roles_id }}" disabled>{{ $user->roles->name == 'KepalaLab' ? 'Kepala Lab' : 'Admin'}}</option>
                <option value="1">Kepala Lab</option>
                <option value="2">Admin</option>
              </select>
            </div>

            <div class="mb-2 d-grid gap-1">
              <button class='btn btn-success w-full' type='submit'>Update Kelola User</button>
            </div>

          </form>
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

</script>
@endpush
