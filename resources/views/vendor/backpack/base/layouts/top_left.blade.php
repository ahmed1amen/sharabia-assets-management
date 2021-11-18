<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ config('backpack.base.html_direction') }}">

<head>
  @include(backpack_view('inc.head'))

</head>

<body class="{{ config('backpack.base.body_class') }}">

  @include(backpack_view('inc.main_header'))

  <div class="app-body">

    @include(backpack_view('inc.sidebar'))

    <main class="main pt-2">

       @yield('before_breadcrumbs_widgets')

       @includeWhen(isset($breadcrumbs), backpack_view('inc.breadcrumbs'))

       @yield('after_breadcrumbs_widgets')

       @yield('header')

        <div class="container-fluid animated fadeIn">

          @yield('before_content_widgets')

          @yield('content')

          @yield('after_content_widgets')

        </div>

    </main>

  </div><!-- ./app-body -->

  <footer class="{{ config('backpack.base.footer_class') }}">
    @include(backpack_view('inc.footer'))
  </footer>

  @yield('before_scripts')
  @stack('before_scripts')

  @include(backpack_view('inc.scripts'))

  @yield('after_scripts')
  @stack('after_scripts')


  <script>

      function printPosinvoice(id){

          $('<iframe  id="printpos" name="printpos" >')
              .hide()                               // make it invisible
              .attr("src", '{{ url('admin/maintenance-request')}}/' +id+'/show') // point the iframe to the page you want to print
              .appendTo("body");
          var newWin = window.frames["printpos"];

          newWin.document.close();

      }



      function printSticker(id){

          $('<iframe  id="printf" name="printf" >')
              .hide()                               // make it invisible
              .attr("src",  '{{ url('admin/maintenance-request')}}/'+id+'/all') // point the iframe to the page you want to print
              .appendTo("body");
          var newWin = window.frames["printf"];

          newWin.document.close();

      }
  </script>
</body>
</html>
