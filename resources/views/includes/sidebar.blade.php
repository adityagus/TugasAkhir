<!-- START SIDEBAR -->
<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <div class="logo">
        <a href="index.html"><img src="{{ url('user/dist/assets/images/logo/logo.png') }}" alt="Logo" style="height:40px;" srcset=""></a>
        </div>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block">
            <i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title my-0">Menu</li>

        <li class="sidebar-item {{ ($title === "home" ? "active" : "") }} mt-0">
          <a href="/" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="sidebar-title mb-0">Manajemen</li>


        <li class="sidebar-item {{ ($title == "peminjaman" || $title == "cart" ? "active" : "") }}">
          <a href="/peminjaman" class='sidebar-link'>
            <img src="{{ $title !== "peminjaman" && $title !=='cart' ? url("user/dist/assets/images/logo/peminjaman-secondary.png") : url("user/dist/assets/images/logo/peminjaman.png") }}" width='35px' alt="">
            <span>Peminjaman</span>
          </a>
        </li>

        <li class="sidebar-item {{ ($title == "pengembalian" ? "active" : "") }}">
          <a href="/pengembalian" class='sidebar-link'>
          <img src="{{ $title !== "pengembalian" ? url("user/dist/assets/images/logo/pengembalian-secondary.png") : url("user/dist/assets/images/logo/pengembalian.png") }}" width='35px' coloalt="">
            <span>Pengembalian</span>
          </a>
        </li>
        
        <li class="sidebar-title mt-2">Lainnya</li>
        
        
        <li class="sidebar-item ">
          <a href="/" class='sidebar-link'>
            <i class="bi bi-info" ></i>
            <span>Informasi</span>
          </a>
        </li>
      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>

      <!-- STOP SIDEBAR -->
