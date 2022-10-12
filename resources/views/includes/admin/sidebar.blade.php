<!-- START SIDEBAR -->
<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <div class="logo">
          <a href="{{ route('admin.home') }}"><img src="{{ url('user/dist/assets/images/logo/logo.png') }}" alt="Logo" style="height:40px;" srcset=""></a>
        </div>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item">
          <a href="{{ route('admin.home') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="sidebar-title">Manajemen</li>

        <li class="sidebar-item has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-file-check-fill"></i>
            <span>Approval Barang</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="{{ route('admin.transaction.index') }}">
                <i class="bi bi-file-arrow-up"></i>
                &nbsp;<span>Peminjaman</span>
              </a>
            </li>
            <li class="submenu-item">
              <a href="{{ route('admin.return.index') }}">
                <i class="bi bi-file-arrow-down"></i>
                &nbsp;<span>Pengembalian</span>
              </a>
            </li>
          </ul>
        </li>

        {{-- {{ ($title == "inventaris" ? "active" : "") }} --}}
        <li class="sidebar-item ">
          <a href="{{ route('admin.inventory.index') }}" class='sidebar-link'>
            <i class="bi bi-archive-fill"></i>
            <span>Data Barang</span>
          </a>
        </li>

        <li class="sidebar-item ">
          <a href="{{ route('admin.gallery.index') }}" class='sidebar-link'>
            <i class="bi bi-images"></i>
            <span>Gallery</span>
          </a>
        </li>

        <li class="sidebar-item ">
          <a href="{{ route('admin.user.index') }}" class='sidebar-link'>
            <i class="bi bi-person-fill"></i>
            <span>User</span>
          </a>
        </li>

        <li class="sidebar-title">Lainnya</li>

        <li class="sidebar-item">
          <a href="{{ route('admin.laporan') }}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Lanjutan</span>
          </a>
        </li>

      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>
