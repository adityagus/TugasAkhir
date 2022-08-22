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
              <li class="breadcrumb-item active" aria-current="page">List Barang</li>
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
        </div>
        <div class="card-body">
          <table id='table1' class="table table-responsive table-striped" >
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Alat & Bahan</th>
                <th>Lab</th>
                <th>Kategori</th>
                <th>Jenis</th>
                {{-- <th>Total</th> --}}
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            @php
            $no = 1;
            @endphp
          
            <tbody>
              @forelse ($items as $item)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jenis }}</td>
                
                <td>{{ $item->category_items ? $item->category_items->namakategori : " " }}</td>
                
                {{-- @if ($item->loan_items->total == 0)
                  <td>0</td>
                      
                  @else
                  <td>{{ $item->loan_items->total }}</td>
          
                @endif --}}
                <td>{{ $item->studyprograms->name }}</td>
                <td class="d-flex justify-content-center">
                  <span class='d-flex d-inline-block px-2'>
                    <a href='{{ route('details', $item->slug) }}'>
                      <button class='btn btn-primary mx-1' type="submit">Detail</button>
                    </a>
                  </span>
                  <a class='btn btn-info mx-1 px-2 btnCart' type="submit" data-id='{{ $item->id }}' data-token="{{ csrf_token() }}">Pinjam</a>
                  
          
                  {{-- <form action="{{ route('cart-add', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  <button class="btn btn-info" type="submit">
          
          
                    Add to Cart
                  </button>
                  </form> --}}
                </td>
              </tr>
              @empty
          
              @endforelse
          
          
          
          
            </tbody>
          </table>
          {{-- <div id="read""></div> --}}
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

@push('prepend-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@endpush

  
@push('addon-script')
<script>

  $(document).ready(function () {
    read();
    $('#table1').DataTable();
  });
      
      function read() {
      $.get("{{ url('barang') }}", {}, function(carts,status){
        $("#read").html(carts);
        
      })
    }
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    
    $('.btnCart').on('click', function() {
    console.log('ok');
    const id = $(this).data('id');
    const token = $("meta[name='csrf-token']").attr("content");
    
    $.ajax({
        url: "{{ url('cart') }}/" + id,
        data: {
          'id': id,
          // '_token': token,
        },
        type: 'post',
        dataType: 'json',
        success: function(inCart) {
          const h4 = document.querySelector('#barang');
          h4.innerHTML = {{ $inCart }};
          location.reload();
            
        }
      , error: function(jqXhr, textStatus, errorMessage) {
        $("p").append("tidak bisa masukan ke keranjang");
        
      }
  
  
  });
});
    

    
    
    </script>  
    @endpush
  
