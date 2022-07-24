@extends('layouts.main')

@section('title')
Pengembalian Alat
@endsection
@section('content')
<div id="main-content">

  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Pengembalian Alat dan Bahan</h3>
          <p class="text-subtitle text-muted">Alat dan bahan yang anda pinjam yakk</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <div class="div">
              <h4 class=''>Alat Yang Anda Pinjam</h4>
            </div>
            <div class="bd-highlight">
              <form action="{{ route('return') }}" method="POST">
                @csrf
                @method('POST')
                <button type="button" name="" id="" class="btn btn-warning btn-md btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Kembalikan Semua</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pengembalian</h5>
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
                            <label for="message-text" class="col-form-label">Keterangan</label>
                            <textarea class="form-control" id="message-text" name="keterangan"></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit Pengembalian</button>
                        </div>
                      </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table class='table table-striped' id='table1'>
            <thead>
              <tr>
                <th>NO.</th>
                <th>Nama Alat & Bahan</th>
                <th>Kategori</th>
                <th>Jumlah Dipinjam</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($items as $item)
              @if ($item->transaction->status == 'SUCCESS')

              <tr>
                <!-- <td colspan='7'><center>No Data</center></td> -->
                <td>{{ $item->id }}</td>
                <td>{{ $item->inventory->nama }}</td>
                <td>{{ $item->inventory->category_items->namakategori }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->inventory->labs->name }}</td>
                <td>{{ $item->transaction->status }}</td>
                <td class='d-flex justify-content-center'>
                  <button class='btn-outline-primary rounded py-1 px-3 mx-2'>Detail</button>
                  {{-- <button class='btn-warning rounded py-1 px-3'>Pengembalian</button> --}}
                </td>
              </tr>

              @endif

              
              @empty
              <tr>
                <td colspan="7" align="center">Peminjaman Kosong</td>
              </tr>
                  
              
              @endforelse
                            
            </tbody>

          </table>
        </div>

      </div>
    </section>
  </div>

  <footer>
    <div class="footer d-flex justify-content-center mb-0 text-muted">
      <div class="float-center">
        <p class='text-center'>2022 &copy; Teknik Elektro</p>
      </div>
  </footer>
</div>
@endsection

@push('prepend-script')
<link rel="stylesheet" href="user/dist/assets/vendors/simple-datatables/style.css">
@endpush

@push('prepend-script')
<script src="{{ url('user/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

<script>
// Simple Datatable
let table1 = document.querySelector('#table1');
let dataTable = new simpleDatatables.DataTable(table1);

</script>
@endpush
