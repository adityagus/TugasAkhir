<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peminjaman</title>
    
    
    @stack('prepend-styles')
    @include('includes.styles')
    @stack('addon-styles')
</head>

<body>
  
  <!-- Start section navbar -->
  <header>
    <nav>

    </nav>
  </header>
  <!-- End section navbar -->
  
    <div id="app">
      @include('includes.sidebar')
      
      @yield('content')
      
    </div>
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    
</body>

</html>
