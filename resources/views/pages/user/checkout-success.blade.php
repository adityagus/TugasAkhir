@extends('layouts.main')

@section('title')
    Checkout
@endsection

@section('content')
<div id="main-content">

  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <div class="d-flex d-inline-block mb-2">
            <i class="bi bi-arrow-down-up bi-sub fs-5 bold text-gray-600 mx-4
            "></i>
            <h3>Vertifikasi</h3>
          </div>
        </div>

      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body w-100">
          <div class="w-full d-flex justify-content-center">
            <img src="{{ url('user/dist/assets/images/logo/success.png ')}}" alt="">
          </div>
          <h5 class='text-center my-2'>Peminjaman Sedang di proses!!!</h5>
          <a href="/" class='d-flex justify-content-center'>
            <button class='btn btn-primary py-2 px-4' type='submit'>
            Kembali
          </button>
          </a>
          
       </div>
    </section>
  </div>

  <footer>
    <!-- <div class="footer clearfix mb-0 text-muted">
      <div class="float-start">
        <p>2022 &copy; Aditya Gustian</p>
      </div>
      <div class="float-end">
        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
          by <a href="https://ahmadsaugi.com">Saugi</a></p>
      </div>
    </div> -->
  </footer>
</div>
@endsection