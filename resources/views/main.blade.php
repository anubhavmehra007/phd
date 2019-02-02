<!DOCTYPE html>
<html lang="en">
        @include('partials._head')
  <body id="page-top">
        @include('partials._nav')

    <div id="wrapper">
        @include('partials._sidebar')  

      <div id="content-wrapper">
        <div class="container-fluid">
            @yield('content')    
        </div>
        <!-- /.container-fluid -->
        @include('partials._footer')
      </div>

      <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    @include('partials._logout')
    @include('partials._scripts')
    @yield('scripts')
    

  </body>

</html>
