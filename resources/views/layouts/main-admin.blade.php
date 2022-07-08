<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    
    @stack('prepend-styles')
    @include('includes.admin.styles')
    @stack('addon-styles')
</head>

<body>
  
    <div id="app">
      
      
      @include('includes.admin.sidebar')
      
    <div id="main" class='layout-navbar'>
      
      @include('includes.admin.navbar-main')
      {{-- @include('includes.message') --}}
      @yield('content')
  </div>
      
    
    </div>
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    
</body>

</html>
