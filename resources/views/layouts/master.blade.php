<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <script src="{{ asset('js/logout.js') }}" defer></script>
  <script src="{{ asset('js/admin.js') }}" defer></script>
  <script src="{{ asset('js/create_book.js') }}" defer></script>
  <script src="{{ asset('js/edit_author.js') }}" defer></script>

  <title>
      @yield('title-head')
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('partials.css')
</head>
<body id="body" class="hold-transition sidebar-mini layout-fixed">

    <nav class="my-navbar">
        @include('partials.navbar')
    </nav>

    @include('partials.main_sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        @yield('content')
    </div>

    @include('partials.footer')

    @include('partials.script')

</body>
</html>
