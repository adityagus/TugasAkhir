<!-- START SIDEBAR -->
<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
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
          <a href="/" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-title">Manajement</li>

        <li class="sidebar-item {{ ($title === "peminjaman" ? "active" : "") }}">
          <a href="/peminjaman" class='sidebar-link'>
            <img src="user/dist/assets/images/logo/peminjaman{{ $title !== "peminjaman" ? "-secondary" : "" }}.png" width='35px' alt="">
            <span>Peminjaman</span>
          </a>
        </li>

        <li class="sidebar-item {{ ($title === "pengembalian" ? "active" : "") }}">
          <a href="/pengembalian" class='sidebar-link'>
            <img src="user/dist/assets/images/logo/pengembalian-secondary.png" width='35px' coloalt="">
            <span>Pengembalian</span>
          </a>
        </li>


    </div>
  </div>
</div>

      <!-- STOP SIDEBAR -->
