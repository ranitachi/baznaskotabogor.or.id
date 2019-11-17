<div class="header">
	<div class="container">
		<div class="wrap">
			<div class="logo col-md-2 col-sm-12 col-xs-12">
				<a href="{{url('v2')}}"><img src="{{asset('images/logo/logo_2.png')}}" alt=""></a>
			</div>
			<div class="static col-md-10 col-sm-12 col-xs-12" style="width:90% !important;">
				<div class="row">
					<div class="header_top">
						<div class="col-md-12">
							<div class="row">
								<div class="pull_left">
									<a href="{{$kontak ? $kontak->facebook : '#'}}" target="_blank"><i class="fa fa-facebook"></i></a>
									<a href="{{$kontak ? $kontak->instagram : '#'}}" target="_blank"><i class="fa fa-instagram"></i></a>
									<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
									<a href="{{$kontak ? $kontak->twitter : '#'}}" target="_blank"><i class="fa fa-youtube"></i></a>
								</div>
								<div class="pull_right">
									<ul style="padding-right:20px;">
										<li><span><i class="fa fa-phone"></i>{{$kontak ? $kontak->telepon : ''}}</span></li>
										<li><span><i class="fa fa-envelope"></i>{{$kontak ? $kontak->email : ''}}</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="main_menu">
						<a id="setting"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
						<ul class="menu">
							<li style="margin-bottom: 30px; border-bottom: none;"><a id="close"><i class="fa fa-times" aria-hidden="true"></i></a></li>
							<li>
								<a href="#">Profil<span id="sub_1" class="icaret nav-plus fa fa-angle-down"></span></a>
								<ul class="sub_menu sub1">
									<li><a href="{{asset('profil/sejarah')}}">Sejarah BAZNAS</a></li>
									<li><a href="{{asset('profil/tentang')}}">Tentang BAZNAS Kota Bogor</a></li>
									<li><a href="{{asset('profil/visi-misi')}}">Visi Misi BAZNAS Kota Bogor</a></li>
									<li><a href="{{asset('profil/struktur-organisasi')}}">Struktur Organisasi</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Program<span id="sub_2" class="icaret nav-plus fa fa-angle-down"></span></a>
								<ul class="sub_menu sub2">
                                    @php
                                        $program=\App\Models\Program::where('flag',1)->orderBy('nama_program')->get();
                                    @endphp
                                    @foreach ($program as $item)
									    <li><a href="{{url('program-baznas/'.str_slug($item->nama_program))}}">{{$item->nama_program}}</a></li>
                                    @endforeach
								</ul>
							</li>
							<li>
								<a href="#">Layanan<span id="sub_2" class="icaret nav-plus fa fa-angle-down"></span></a>
								<ul class="sub_menu sub2">
									<li><a href="{{url('layanan/donasi-zakat')}}">Donasi Zakat Online</a></li>
									<li><a href="{{url('layanan/konsultasi-zakat')}}">Konsultasi Zakat</a></li>
									<li><a href="{{url('layanan/konfirmasi-zakat')}}">Konfirmasi Zakat</a></li>
									<li><a href="{{url('layanan/jemput-zakat')}}">Jemput Zakat</a></li>
									<li><a href="{{url('layanan/kalkulator-zakat')}}">Kalkulator Zakat</a></li>
									<li><a href="{{url('layanan/rekening-zakat')}}">Rekening Zakat</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Publikasi<span id="sub_5" class="icaret nav-plus fa fa-angle-down"></span></a>
								<ul class="sub_menu sub5">
									<li class="menu-item">
										<a href="">Kategori</a>
										<ul class="sub4_menu">
                                            @php
                                                $kategori=\App\Models\CatBerita::orderBy('nama_kategori')->get();
                                                $berita=\App\Models\Berita::where('flag',1)->with('cat_berita')->orderBy('created_at','desc')->limit(6)->get();
                                            @endphp
                                            @foreach ($kategori as $item) 
											    <li><a href="{{url('publikasi/'.str_slug($item->nama_kategori))}}">{{$item->nama_kategori}}</a></li>
                                            @endforeach
										</ul>
									</li>
									<li class="menu-item">
										<a href="">Berita Terbaru</a>
										<ul class="sub4_menu">
                                            @foreach ($berita as $index=>$item)
                                                @php
                                                    if($index==3)
                                                        break;
                                                @endphp
                                                <li class="list-img">
                                                    <div class="img-block">
                                                        <a href="">@if ($item->file=='')
                                                                <img src="{{asset('asset/img/slide_01.jpg')}}" alt="{{$item->title}}" style="width:100%;height:100%">
                                                            @else
                                                                <img src="{{asset($item->file)}}" alt="{{$item->title}}" style="width:100px;height:70px">
                                                            @endif</a>
                                                    </div>
                                                    <div class="content-block">
                                                        <h3 class="title"><a href="{{url('publikasi/'.str_slug($item->cat_berita->nama_kategori).'/'.str_slug($item->title))}}">{{ucwords(strtolower($item->title))}}</a></h3>
                                                        <span>{{tgl_indo2($item->created_at)}}</span>
                                                    </div>
                                                </li>
                                                
                                            @endforeach
										</ul>
									</li>
									<li class="menu-item">
										<a href="">&nbsp;</a>
										<ul class="sub4_menu">
											 @foreach ($berita as $index=>$item)
                                                @php
                                                    if($index<3)
                                                        continue;
                                                @endphp
                                                <li class="list-img">
                                                    <div class="img-block">
                                                        <a href="">@if ($item->file=='')
                                                                <img src="{{asset('asset/img/slide_01.jpg')}}" alt="{{$item->title}}" style="width:100%;height:100%">
                                                            @else
                                                                <img src="{{asset($item->file)}}" alt="{{$item->title}}" style="width:100px;height:70px">
                                                            @endif</a>
                                                    </div>
                                                    <div class="content-block">
                                                        <h3 class="title"><a href="{{url('publikasi/'.str_slug($item->cat_berita->nama_kategori).'/'.str_slug($item->title))}}">{{ucwords(strtolower($item->title))}}</a></h3>
                                                        <span>{{tgl_indo2($item->created_at)}}</span>
                                                    </div>
                                                </li>
                                                
                                            @endforeach
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">Galeri<span id="sub_2" class="icaret nav-plus fa fa-angle-down"></span></a>
								<ul class="sub_menu sub2">
									<li><a href="{{url('dokumentasi/foto')}}">Foto</a></li>
									<li><a href="{{url('dokumentasi/video')}}">Video</a></li>
								</ul>
							</li>
							<li><a href="{{url('kontak-kami')}}">Kontak</a></li>
							
						</ul>
						<div class="button_donate" style="background:#E43844 !important;">
							<a href="{{url('layanan/donasi-zakat')}}">Klik Untuk Donasi</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>