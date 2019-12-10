<!doctype html>
<html>
<head>
   @include('includes.head')
</head>
<body>
<div class="container">
   <header>
   @include('includes.header3')
   </header>
   <div id="main">
           @yield('content')
   </div>
   <footer>
       @include('includes.footer')
   </footer>
</div>
</body>
</html>