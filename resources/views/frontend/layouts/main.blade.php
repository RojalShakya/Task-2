<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.header')

<body>
    <!-- Start Top Nav -->
@include('frontend.layouts.nav')
    <!-- Close Top Nav -->


    @yield('content-section')

    <!-- Modal -->

    <!-- End Featured Product -->


    <!-- Start Footer -->
    @include('frontend.layouts.footer')
    <!-- End Footer -->

    <!-- Start Script -->
   @include('frontend.layouts.script')
    <!-- End Script -->
</body>

</html>
