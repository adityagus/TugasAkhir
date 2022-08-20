@extends('layouts.main')

@section('title')
Peminjaman Alat
@endsection



@section('content')


<div id="main-content">

  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Peminjaman Alat dan Bahan</h3>
          <p class="text-subtitle text-muted">Halaman untuk melihat data barang serta dapat meminjamnya</p>


        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
            </ol>
          </nav>
        </div>
      </div>
      @if (session('message'))
      <div class="alert alert-success form-control">
        {{ session('message') }}
      </div>
      @endif
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Alat dan Bahan</h4>
          <h4 class='peminjaman'>Peminjaman Kosong</h4>
        </div>
        <div class="card-body">
          <div id="read""></div>
        </div>

      </div>
    </section>
  </div>

  <footer>
    <div class="footer clearfix mb-0 text-muted">
      <div class="float-start">
        <p>2022 &copy; Teknik Elektro</p>
      </div>
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
  
  @push('addon-script')
  <script>
    $(function() {
      $(document).ready(function() {
        read();
      });
  
      function read() {
        $.get("{{ url('read') }}", {}, function(carts,incart, status) {
          $("#read").html(carts);
          $("#incart").html(incart);
        })
    }
    
    

    
    });
    
    
  </script>  
  
  @endpush
