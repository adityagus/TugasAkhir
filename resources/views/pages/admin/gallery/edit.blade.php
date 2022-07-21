@extends('layouts.main-admin')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
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

          
        <div class="card shadow">
          <div class="card-body">
            <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="inventories_id">Alat dan bahan</label>
                 <select name="inventories_id" required class="form-control">
                  <option value="{{ $item->inventories_id}}">Jangan Di Ubah</option>
                   @foreach ($inventories as $inventory)
                      <option value="{{ $inventory->id }}">
                         {{ $inventory->nama }}
                       </option>
                     @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" placeholder="Image">
              </div>

             <button type="submit" class="btn btn-primary btn-block ">
               Ubah
             </button>
            </form>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection