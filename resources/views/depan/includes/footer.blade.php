<div class="footer">
	<div class="container">	
		<div class="row">
			<div class="footer-1">
				<div class="item col-md-4">
					<div class="title">
						<h3>Peta Situs</h3>
					</div>
					<ul class="us1">
						<li><a href="{{url('profil/sejarah')}}">Profil</a></li>
						<li><a href="{{url('program-baznas/bogor-berkah')}}">Program BAZNAS Kota Bogor</a></li>
						<li><a href="{{url('layanan/donasi-zakat')}}">Layanan</a></li>
						<li><a href="{{url('publikasi/baznas-internal')}}">Publikasi</a></li>
						<li><a href="{{url('dokumentasi/foto')}}">Galeri</a></li>
						<li><a href="{{url('kontak-kami')}}">Kontak Kami</a></li>
					</ul>
				</div>
				<div class="item1 col-md-6">
					<div class="title">
						<h3>Kantor Layanan</h3>
					</div>
					<p>{{$kontak ? $kontak->alamat : '#'}}</p>
					<p><i class="fa fa-phone"></i> : {{$kontak ? $kontak->telepon : '#'}}</p>
					<p><i class="fa fa-envelope"></i> : {{$kontak ? $kontak->email : '#'}}</p>
				</div>
				<div class="item3 col-md-2">
					<div class="title">
						<a><img src="{{asset('images/logo/logo_2.png')}}" alt=""></a>
					</div>
					
				</div>
			</div>
			<div class="copyright">
				<div class="social">
					<div class="social1">
						<a href="{{$kontak ? $kontak->facebook : '#'}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="{{$kontak ? $kontak->twitter : '#'}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="#" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
						<a href="{{$kontak ? $kontak->intagram : '#'}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="cpr">
					<p><span>Badan Amil Zakat Nasional</span> (BAZNAS) <span>Kota Bogor</span>. &copy; 2019</p>
				</div>
			</div>
		</div>
	</div>
</div>