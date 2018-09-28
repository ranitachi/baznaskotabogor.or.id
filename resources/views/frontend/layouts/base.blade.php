<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('frontend.includes.head')
</head>

<body>
    <div class="wrapper">
        @include('frontend.includes.navbar')
        <!-- Start of slider area -->
        @yield('slider')
        <!-- End of slider area -->
        <!-- Start page content -->
        @yield('content')
        <!-- End page content -->
        <!-- Start footer area -->
        @include('frontend.includes.footer')
        <!-- End footer area -->
        <!-- start scrollUp
        ============================================ -->
        <div id="toTop">
            <i class="fa fa-chevron-up"></i>
        </div>
    </div>
    <!-- Body main wrapper end -->

    @include('frontend.includes.footscript')

    @yield('pagescript')


</body>

</html>
