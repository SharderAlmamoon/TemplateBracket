
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('backend.includes._metatages')
    <!-- Required meta tags -->
       

    <!-- vendor css -->
   @include('backend.includes._css')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>

    <!-- SIde BAr left -->
    @include('backend.includes._sidebarleft')

    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
      <!-- Br header -->
      @include('backend.includes._brheader')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <!-- brsideright -->
    @include('backend.includes._brsideright')
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->

   <div class="br-mainpanel">

        @yield('contact')

        <!-- footer -->
     @include('backend.includes._footer')

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- Script -->
    @include('backend.includes._script')
  </body>
</html>
