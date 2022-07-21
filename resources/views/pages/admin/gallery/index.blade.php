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
                    <th>Alat dan Bahan</th>
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
                    <td align="center">
                      <a href="{{ route('admin.gallery.edit' ,$item->id) }}" class="btn btn-info">
                        Edit
                      </a>
                      <form action="{{ route('admin.gallery.destroy' ,$item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger" data-bs-toggle='modal' data-bs-target="#galleryHapus">
                          Hapus
                        </button>
                        
                        <div class="modal fade" id="galleryHapus" aria-hidden="true" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title">Hapus Data</h5>
                                 <i class="bi bi-x-circle-red"></i>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" align='left'>
                                  <p>Apakah {{ $item->nama }} gambar yakin dihapus?</p>
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
