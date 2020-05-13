<!DOCTYPE html>
<html lang="en">
<head>
	<title> @yield('title') | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
	@include('depan.includes.head')
</head>
<body class="home3">
    @php
        $data['kontak']=\App\Models\Contact::first();
    @endphp
    @include('depan.includes.header',$data)
    

    @yield('konten')
    <div class="ready">
			<div class="container">
				<div class="left col-md-12 col-sm-12 col-xs-12">
					<h3>Sudahkah Anda Berzakat dan Berinfak Hari Ini ?</h3>
				</div>
				<div class="right col-md-12 col-sm-12 col-xs-12">
					<div class="b">
						<div class="button_donate btn-1">
							<a href="{{url('layanan/donasi-zakat')}}">Mari Berdonasi</a>
						</div>
					</div>
				</div>
			</div>
        </div>
    @include('depan.includes.footer',$data)
    @include('depan.includes.script')
	@yield('footscript')
</body>
</html>