@extends('layouts.main-admin')

@section('title')
Menambahkan Staff
@endsection

@section('content')


<div id="main-content">

  <div class="page-heading ">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Menambahkan Staff</h3>
          <p class="text-subtitle text-muted">Menambahkan Staff Baru Di Ruang Alat</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Staff</a></li>
              <li class="breadcrumb-item active" aria-current="page">Menambahkan</li>
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
          
          <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-2">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control text-bold" name="name" value="{{ old('name') }}" id="kode" placeholder="Masukan Nama Anda" required>
            </div>

            <div class="mb-2">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control text-bold" name="email" value="{{ old('email') }}" id="email" placeholder="Masukan Email Anda">
            </div>
            <div class="mb-2">
              <label for="nip" class="form-label">Nip</label>
              <input type="text" class="form-control text-bold" name="nip" value="{{ old('nip')  }}" id="nip" placeholder="Masukan NIP Anda">
            </div>
            
            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control text-bold" name="password" value="{{ old('password') }}" id="password" placeholder="Masukan Password Anda">
            </div>

            <div class="mb-4">
              <label for="roles" class="form-label">Roles</label>
              <select name="roles_id" id="roles" class="form-select text-bold">
                <option disabled selected>Belum Diisi</option>
                <option value="1">Kepala Lab</option>
                <option value="2">Admin</option>
              </select>
            </div>

            <div class="mb-2 d-grid gap-1">
              <button class='btn btn-success w-full' type='submit'>Tambahkan Staff</button>
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
