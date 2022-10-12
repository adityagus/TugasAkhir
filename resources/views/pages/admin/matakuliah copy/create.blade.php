@extends('layouts.main-admin')

@section('title')
Create Inventaris
@endsection

@section('content')


<div id="main-content">

  <div class="page-heading ">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Menambahkan Laboratorium</h3>
          <p class="text-subtitle text-muted">Menambahkan Laboratorium di Jurusan Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.inventory.index') }}">Lanjutan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body">

          {{-- @if ($errors->any())
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
          @endif --}}

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul style="margin-bottom:0">
              @foreach ($errors->all() as $error)
              <li type="none">{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          


          <form action="{{ route('admin.laboratorium.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
              <label for="name" class="form-label">Laboratorium Baru</label>
              <input type="text" class="form-control text-bold" name="name" value="{{ old('name') }}" id="name" placeholder="Masukan Laboratorium" >
            </div>


            <div class="mb-2 d-grid gap-1">
              <button class='btn btn-success w-full' type='submit'>Tambahkan</button>
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



