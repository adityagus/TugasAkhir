<header class='mb-3'>
  <nav class="navbar navbar-expand navbar-light ">
    <div class="container-fluid">
      <a href="#" class="burger-btn d-block">
        <i class="bi bi-justify fs-3"></i>
      </a>
      
      @if (Auth::check())
         
      @php
      $data = Auth::user()->name;
      $item = explode(' ', $data);
      
      @endphp
          
      @else
          

      @endif

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          {{-- <li class="nav-item dropdown me-1">
            <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <li>
                <h6 class="dropdown-header">Mail</h6>
              </li>
              <li><a class="dropdown-item" href="#">No new mail</a></li>
            </ul>
          </li> --}}
          @if (route('cart'))
 
              
          @elseif($title == 'peminjaman')
          <li class="nav-item mx-5">
            <a class="nav-link active position-relative py-0 " href="{{ route('cart') }}" aria-expanded="false">
              <i class='bi bi-cart bi-sub fs-4 py-0 text-gray-600'></i>
              <span class="{{ $inCart >= 1 ? 'position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger' : '' }}">
                {{ $inCart >= 1 ? $inCart : '' }}
                <span class="visually-hidden">Peminjaman Ballon</span>
              </span>
              {{-- <span class="badge bg-light-danger badge-pill badge-round float-right mt-50">5</span> --}}
            </a>
          </li>
          
              

          @endif
        </ul>
        <div class="dropdown">
          @auth
          <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-menu d-flex align-items-center">
              <div class="user-name me-3">
                <h6 class="mb-0 text-gray-600 container-sm:visually-hidden">
                  {{ Auth::user()->name }}
                  {{ Auth::user()->nim }}
                </h6>
              </div>
              <div class="user-img d-flex align-items-center">
                <div class="avatar avatar-md shadow-lg">
                  <img class="shadow-" src="{{ Auth::user()->profile_photo_url }}">
                </div>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
            <li>
              <h6 class="dropdown-header">Hello, {{ $item[0]  }}!</h6>
            </li>
            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="icon-mid bi bi-gear me-2"></i>
                Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-cart me-2"></i>
                Wallet</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <form action="{{ url('logout') }}" method="post">
              @csrf
              <li><button class="dropdown-item"><i class="icon-mid bi bi-box-arrow-left me-2"></i>Logout</button></li>
            </form>
          </ul>
        </div>
        @endauth
        @guest
        <a href="{{ url('login') }}">Login</a>
        @endguest

      </div>
    </div>
  </nav>
</header>
