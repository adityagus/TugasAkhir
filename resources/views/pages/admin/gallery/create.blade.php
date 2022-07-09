@extends('layouts.main-admin')


@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Gallery</h1>

  </div>

  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif


  <div class="container-fluid">
    <div class="card shadow">
      <div class="card-body">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="inventory">Alat dan Bahan</label>
            <select id="inventory" name="inventories_id" required class="form-control">
              <option value="">Pilih Alat dan Bahan</option>
              @foreach ($inventory as $item)
              <option value="{{ $item->id }}">
                {{ $item->nama }}
              </option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" placeholder="Image">
          </div>

          <button type="submit" class="btn btn-primary btn-block ">
            Simpan
          </button>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- /.container-fluid -->
@endsection
