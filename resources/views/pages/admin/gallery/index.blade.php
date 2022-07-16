@extends('layouts.main-admin')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"> Gallery Inventory</h1>
            <a href="{{ route('admin.gallery.create') }}" class="btn sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Gallery Inventory
            </a>
        </div>


        <div class="card my-4">
        <div class="row">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0" >
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Travel</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @forelse ($items as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->inventory->nama }}</td>
                    <td>
                       <img src="{{ Storage::url($item->image) }}" alt="" style="width: 100px; height:100px" class="img-thumbnail">
                    </td>
                    <td>
                      <a href="{{ route('admin.gallery.edit' ,$item->id) }}" class="btn btn-info">
                        EDIT
                      </a>
                      <form action="{{ route('admin.gallery.destroy' ,$item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">
                          HAPUS
                        </button>
                      </form>
                    </td>
                  </tr>
                  @empty
                      <tr>
                        <td colspan="7" class="text-center">Data Kosong</td>
                      </tr>
                  @endforelse 
                </tbody>

              </table>
            </div>
          </div>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
