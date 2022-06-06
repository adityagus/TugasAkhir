<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peminjaman</title>
    
  @include('includes.styles')
</head>

<body>
  
  <!-- Start section navbar -->
  <header>
    <nav>

    </nav>
  </header>
  <!-- End section navbar -->
  
  
  
    <div id="app">
      <!-- START SIDEBAR -->
      <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
          <div class="sidebar-header">
            <div class="">
              <div class="logo">
                <a href="index.html"><img src="{{ url('user/dist/assets/images/logo/logo.png') }}" alt="Logo" style="height:40px;" srcset=""></a>
              </div>
              <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
              </div>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul class="menu">
  
              <li class='sidebar-title'>Menu</li>
  
              <li class="sidebar-item active ">
                <a href="index.html" class='sidebar-link'>
                  <i class="bi bi-grid-fill"></i>
                  <span>Dashboard</span>
                </a>
              </li>
  
              <li class="sidebar-title">Manajement</li>
  
              <li class="sidebar-item  has-">
                <a href="peminjaman.html" class='sidebar-link'>
                  <img src="{{ url('user/dist/assets/images/logo/peminjaman-secondary.png') }}" width='35px' alt="">
                  <span>Peminjaman Barang</span>
                </a>
              </li>
  
              <li class="sidebar-item">
                <a href="pengembalian.html" class='sidebar-link'>
                  <img src="{{ url('user/dist/assets/images/logo/pengembalian-secondary.png') }}" width='35px' alt="">
                  <span>Pengembalian Barang</span>
                </a>
              </li>
  
  
          </div>
        </div>
      </div>
      <!-- STOP SIDEBAR -->
      
      <!-- START MAIN -->
      @yield('content')


      <!-- STOP MAIN  -->
      
    </div>
    
    <script src="{{ url('user/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('user/dist/assets/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="{{ url('user/dist/assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ url('user/dist/assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ url('user/dist/assets/js/mazer.js') }}"></script>
</body>

</html>
