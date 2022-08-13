<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    
    @stack('prepend-styles')
    @include('includes.styles')
    @stack('addon-styles')
</head>

<body>
  
    <div id="app">
      
      
      @include('includes.sidebar')
      
    <div id="main" class='layout-navbar'>
      
      @include('includes.navbar')
      

      @yield('content')
    </div>
      
    
    </div>
    <script src="{{ asset('frontend/scripts/custom.js') }}"></script>
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    
</body>

</html>
