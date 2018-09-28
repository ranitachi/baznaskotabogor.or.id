<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Error 404 | BAZNAS Kota Bogor</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('frontend.includes.head')
</head>

<body>
    <div class="wrapper">

      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mt-130">
            <img src="{{ asset('images/logo/logo_2.png') }}" alt="" style="height:150px;">
            <h1 class="page-title mt-30">Halaman Yang Anda Cari Tidak Ditemukan</h1>
            <h3></h3>
            <p>Error : 404</p>

            <a href="{{ route('front.beranda') }}" class="btn btn-primary">Kembali Ke Beranda</a>
          </div>
        </div>
      </div>

      <div id="toTop">
          <i class="fa fa-chevron-up"></i>
      </div>
    </div>

    @include('frontend.includes.footscript')


</body>

</html>
