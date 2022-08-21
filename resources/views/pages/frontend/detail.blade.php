@extends('layouts.main')

@section('title')
Detail {{ $inventory->nama }}
@endsection


@section('content')


<div id="main-content">

  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Detail &raquo; <span class='text-primary'>{{ $inventory->nama }}</span></h3>
          <p class="text-subtitle text-muted">Detail Alat dan Bahan yang tersedia di Jurusan Elektro</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('barang') }}">List Barang</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered middle">
            <tr>
              <th class="px-6 py-4 text-end align-middle">Gambar</th>
              <td class="px-6 py-4">
                @forelse ($inventory->galleries as $item)

                <img src="{{ Storage::url($item->image) }}" alt="alat dan bahan" style="width: 250px; height:160px" class="img-thumbnail">
                
                @empty
                  
                <img src="{{ 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}" alt="alat dan bahan" style="width: 250px; height:160px" class="img-thumbnail">
                
                @endforelse
              </td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end col-2">Kode</th>
              <td class="px-6 py-4">{{ $inventory->kd_brg }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end col-2">Nama</th>
              <td class="px-6 py-4">{{ $inventory->nama }}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end col-2">Deskripsi</th>
              <td class="px-6 py-4">{!! $inventory->deskripsi !!}</td>
            </tr>
            <tr>
              <th class="px-6 py-4 text-end col-2">Jumlah</th>
              <td class="px-6 py-4">{{ $inventory->jumlah }}</td>
            </tr>
            <tr>
              <th class="border px-6 py-4 text-end col-2">Satuan</th>
              <td class="border px-6 py-4">{{ $inventory->satuan }}</td>
            </tr>
            

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
  let pdfButtonTrans = new {
    {
      trans('global.datatables.pdf')
    }
  };

</script>
@endpush
