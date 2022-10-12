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
            <h3>Approval Peminjaman</h3>
            <p class="text-subtitle text-muted">Transaksi peminjaman Alat dan Bahan</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Approval Peminjaman</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <section class="section">
        <div class="card">
          <div class="card-body">
              <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Peminjam</th>
                  <th>Phone</th>
                  <th>Keperluan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $nomor = 1;
                @endphp
                
                {{-- <tr>
                  <th>No</th>
                  <th>Nama Alat & Bahan</th>
                  <th>Kategori</th>
                  <th>Ketersedian</th>
                  <th>Jenis</th>
                  <th>Aksi</th>
                </tr> --}}
                @forelse ( $transaction as $item)
                    
                <tr>
                  <td>{{ $nomor++ }}</td>
                  <td>{{ $item->name}}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->keperluan}}</td>
                  <td>{{ $item->status}}</td>
                  <td class="d-flex justify-content-center">
                    <span class='d-flex d-inline-block'>
                      <a href="{{ route('admin.transaction.show',$item->id) }}" class="btn btn-primary">
                        <i class="fa fa-eye"></i>
                        Lihat
                      </a>
                      <a href="{{ route('admin.transaction.edit',$item->id) }}" class="btn btn-info mx-2">
                        Ubah Status
                      </a>
                      <form action="{{ route('return', $item->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="button" name="" id="" class="btn btn-warning btn-md btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Pengembalian</button>
        
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pengembalian {{ $item->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <div class="mb-3">
                                    <label for="periksa" class="col-form-label">Bagaimana Kondisi Sesudah dipinjam?</label>
                                    <div class="d-flex">
                                      <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="kondisi" id="bagus" value="BAGUS">
                                        <label class="form-check-label" for="bagus">
                                          Bagus
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kondisi" id="rusak" value="RUSAK">
                                        <label class="form-check-label" for="rusak">
                                          Rusak
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="periksa" class="col-form-label">Status Pengembalian</label>
                                    <div class="d-flex">
                                      <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="status" id="ditangguhkan" value="Ditangguhkan">
                                        <label class="form-check-label" for="ditangguhkan">
                                          Ditangguhkan
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="selesai" value="Selesai">
                                        <label class="form-check-label" for="selesai">
                                          Selesai
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Keterangan</label>
                                    <textarea class="form-control" id="message-text" name="keterangan" required></textarea>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" >Submit Pengembalian</button>
                                </div>
                              </div>
                            </div>
                        </div>
                      </form>
                    </span>
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
                  <td colspan="8" class="text-center">Data Kosong</td>
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
@endpush

@include('sweetalert::alert')

@push('prepend-script')
<script src="{{ url('user/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

<script>
  // Simple Datatable
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1);
  let pdfButtonTrans = new {{ trans('global.datatables.pdf') }};
</script>
@endpush