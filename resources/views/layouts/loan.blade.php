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
      @include('includes.sidebars')
      
      @stack('prepend-content')
      @yield('content')
      
      
      
      
    </div>
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    
</body>

</html>