@extends('front.layouts.base',['kontak'=>$kontak,'st'=>0,'getinstagram'=>$getinstagram])

@section('title')    
    <title>BAZNAS Kota Bogor</title>

@endsection
@section('slider')
  @include('front.includes.slider',['slider'=>$slider])
@endsection
@section('content')
   		 <section id="profil" class="padTB100">
			<div class="theme-heading" style="margin-bottom:50px !important;">
				<label>BAZNAS Kota Bogor</label>
				<h2>Profil</h2>
				<span> <i class="fa fa-user-circle-o" aria-hidden="true"></i> </span>
			</div>	
			<div class="container">
                <div class="row">
					<div class="col-xs-12">
					
						<div class="mixitup-btn">
						@foreach($profil as $k => $v)	
							<a class="filter" href="javascript:isiprofil('{{$v->id}}')"><span>{{$v->title}}</span></a>
						@endforeach

						</div>
					</div>
					

					<div class="cssload-container" id="loader-profil">
						<div class="sk-wave">
							<div class="sk-rect sk-rect1"></div>
							<div class="sk-rect sk-rect2"></div>
							<div class="sk-rect sk-rect3"></div>
							<div class="sk-rect sk-rect4"></div>
							<div class="sk-rect sk-rect5"></div>
						</div>
					</div>
					<div class="col-xs-12" id="isiprofil" style="text-align:justify">
					@if(count($profil)!=0)
						{!!$profil[0]->desc!!}
					@else
						Data Kosong	
					@endif
					</div>
                </div>
            </div>
		</section>
		<div class="clear"></div>
		<section id="services" class="padTB100">
			<div class="theme-heading">
				<label>BAZNAS Kota Bogor</label>
				<h2>Program </h2>
				<span> <i class="fa fa-user-circle-o" aria-hidden="true"></i> </span>
			</div>	
			<div class="container">
				<div class="row">
				@if(count($program)!=0)
					@foreach($program as $k => $v)
					<div class="col-md-3 col-sm-6 col-xs-12 margin-small">
						<div class="service-box">
							<div class="service-content">
								<div class="client-img" style="width:100% !important;height:110px !important;">
									{{--  <i class="fa fa-wheelchair" aria-hidden="true"></i>  --}}
									<center>
										<img src="{{asset('images/logo/logo.png')}}" style="width:70px !important;height:90px !important;float:none !important;">
									</center>
								</div>
								<h2>{{$v->nama_program}}</h2>
								{{--  <p>Sed dignissim mollis augue finibus accumsan. Donec at ante accumsan mattis turpis. Donec eget </p>  --}}
								<button type="button" onclick="location.href='program/list/{{$v->id}}'" class="btn btn-xs btn-primary" style="float:right;margin-top:30px;">Selengkapnya</button>
							</div>
						</div>
					</div>
					@endforeach
				@endif
					
				</div>
			</div>
		</section>		
		<div class="clear"></div>
		
		
		
		<div class="clear"></div>
		<section id="testimonial" class="padTB100">		
			<div class="theme-heading white">
				<label>BAZNAS Kota Bogor</label>
				<h2>Layanan</h2>
				<span> <i class="fa fa-user-circle-o" aria-hidden="true"></i> </span>
			</div>
			<div class="container">
				<div class="row">
					<div class="testimonial-slider owl-carousel style-one owl-theme">
                     <div class="item">						
						<div class="col-xs-12">
							<div class="clients">
								<div class="client-img-designation">
									<figure class="client-img" style="background:#eee;height:80px !important;">
										<img src="{{asset('images/logo/logo.png')}}" alt="" style="height:60px;width:40px;margin-left:20px;margin-top:10px;">
									</figure>
									<div class="caption">
										<label>Layanan</label>
										<h3>Jemput Zakat</h3>
									</div>
								</div>
									<div class="row">
										<div class="col-xs-12" style="text-align:right;">
											<button class="btn btn-mini btn-xs btn-success" onclick="location.href='layanan/jemput-zakat'" type="button">Selengkapnya</button>
										</div>
									</div>
							</div>
						</div>
                     </div>
                     <div class="item">						
						<div class="col-xs-12">
							<div class="clients">
								<div class="client-img-designation">
									<figure class="client-img" style="background:#eee;height:80px !important;">
										<img src="{{asset('images/logo/logo.png')}}" alt="" style="height:60px;width:40px;margin-left:20px;margin-top:10px;">
									</figure>
									<div class="caption">
										<label>Layanan</label>
										<h3>Konsultasi Zakat</h3>
									</div>
								</div>
									<div class="row">
										<div class="col-xs-12" style="text-align:right;">
											<button class="btn btn-mini btn-xs btn-success" onclick="location.href='layanan/konsultasi-zakat'" type="button">Selengkapnya</button>
										</div>
									</div>
							</div>
						</div>
                     </div>
					 <div class="item">						
						<div class="col-xs-12">
							<div class="clients">
								<div class="client-img-designation">
									<figure class="client-img" style="background:#eee;height:80px !important;">
										<img src="{{asset('images/logo/logo.png')}}" alt="" style="height:60px;width:40px;margin-left:20px;margin-top:10px;">
									</figure>
									<div class="caption">
										<label>Layanan</label>
										<h3>Konfirmasi Zakat</h3>
									</div>
								</div>
								<div class="row">
										<div class="col-xs-12" style="text-align:right;">
											<button class="btn btn-mini btn-xs btn-success" onclick="location.href='layanan/konfirmasi-zakat'" type="button">Selengkapnya</button>
										</div>
									</div>
							</div>
						</div>
                     </div>
					 <div class="item">						
						<div class="col-xs-12">
							<div class="clients">
								<div class="client-img-designation">
									<figure class="client-img" style="background:#eee;height:80px !important;">
										<img src="{{asset('images/logo/logo.png')}}" alt="" style="height:60px;width:40px;margin-left:20px;margin-top:10px;">
									</figure>
									<div class="caption">
										<label>Layanan</label>
										<h3>Rekening Zakat/Infak</h3>
									</div>
								</div>
								<div class="row">
										<div class="col-xs-12" style="text-align:right;">
											<button class="btn btn-mini btn-xs btn-success" onclick="location.href='layanan/rekening'" type="button">Selengkapnya</button>
										</div>
									</div>
							</div>
						</div>
                     </div>
                  </div>
				</div>
			</div>
			<div class="theme-heading white">
				<label>&nbsp;</label>
				<h2>Kalkulator Zakat</h2>
				<span> <i class="fa fa-calculator" aria-hidden="true"></i> </span>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10" style="padding:15px 20px 30px 20px;background:#fff;">
						@include('front.pages.layanan.kalkulator')
					</div>
					<div class="col-lg-1"></div>
				</div>
			</div>
		</section>
		
		<div class="clear"></div>
		<section class="padTB100" id="galeri">
			<div class="theme-heading">
				<label>BAZNAS Kota Bogor</label>
				<h2>Galeri</h2>
				<span> <i class="fa fa-balance-scale" aria-hidden="true"></i> </span>
			</div>	
			<div class="container">
                <div class="row">
					<div class="col-xs-12">
						<div class="mixitup-btn">
							<a class="filter"  data-filter="all"><span>ALL</span></a>
							@foreach($galeri as $k => $v)
								@php
									$kat=str_replace(' ','-',$k);
								@endphp
								<a class="filter"  data-filter=".{{$kat}}"><span>{{$k}}</span></a>
							@endforeach
						</div>
					</div>
                </div>
            </div>
            <div class="mix-default container" >
                <div class="row">
                    <div id="mixItUp">
						@foreach($galeri as $k => $v)
							@php
								$kat=str_replace(' ','-',$k);
							@endphp
							@foreach($v as $i => $vv)
								<div class="cases col-md-3 col-sm-6 col-xs-12 mix {{$kat}}">
									<figure style="height:200px;text-align:center !important;">
											<img src="{{asset($vv->picture)}}" alt="" style="height:100%;width:auto;float:none !important;"/>
											<figcaption>
												<a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
											</figcaption>
									</figure>
								</div>                    
							@endforeach
						@endforeach
					</div>
                </div>
            </div>
		</section>
		<div class="clear"></div>
		<section class="padT100 padB100 our-facts">		
         <div class="container">
            <div class="row">
               <div class="col-md-4 col-sm-6 col-xs-12 margin-small">
                  <div class="facts">
                     <div class="count-number" data-count="1500">
                        <h2><span class="counter">1500</span></h2>
                     </div>
					 <div class="fact-icon">
						<span> <i class="fa fa-user-circle-o" aria-hidden="true"></i> </span>
					 </div>
                     <h3>Jumlah Muzzaki Perorangan</h3>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 col-xs-12 margin-small">
                  <div class="facts">
                     <div class="count-number" data-count="800">
                        <h2><span class="counter">800</span></h2>
                     </div>
					 <div class="fact-icon">
						<span> <i class="fa fa-user-circle-o" aria-hidden="true"></i> </span>
					 </div>
                     <h3>Jumlah Muzzaki Dinas</h3>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 col-xs-12 margin-small">
                  <div class="facts">
                     <div class="count-number" data-count="300">
                        <h2><span class="counter">300</span></h2>
                     </div>
					 <div class="fact-icon">
						<span> <i class="fa fa-user-circle-o" aria-hidden="true"></i> </span>
					 </div>
                     <h3>Jumah Mustahik</h3>
                  </div>
               </div>
               
            </div>
         </div>
      </section>
		<div class="clear"></div>
		
		<div class="clear"></div>
		<section id="our_blog" class="padTB100">			
			<!--- Theme heading start-->
			<div class="theme-heading">
				<label>BAZNAS Kota Bogor</label>
				<h2>Artikel & Berita</h2>
				<span> <i class="fa fa-user-circle-o" aria-hidden="true"></i> </span>
			</div>	
			<!--- Theme heading end-->
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="blog">
							<figure>
								<img src="{{asset('front/img/all/blog-1.jpg')}}" alt=""/>
							</figure>
							<div class="blog-caption">
								<div class="caption">
									<div class="blog-meta">
										<a class="date">Aug 12-2017</a>
										<a class="comments">&nbsp;</a>
										<a class="user">Admin</a>
									</div>
									<div class="blog-detail">
										<h4><a href="#">Dignissim Mollis</a></h4>
										<p>Sed dignissim mollis augue finibus accumsan. Donec at ante accumsan mattis turpis. Donec eget </p>
										<button class="btn btn-xs btn-success" type="button" onclick="location.href='berita/list/1'">Selengkapnya</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="blog">
							<figure>
								<img src="{{asset('front/img/all/blog-2.jpg')}}" alt=""/>
							</figure>
							<div class="blog-caption">
								<div class="caption">
									<div class="blog-meta">
										<a class="date">Aug 12-2017</a>
										<a class="comments">&nbsp;</a>
										<a class="user">Admin</a>
									</div>
									<div class="blog-detail">
										<h4><a href="#">Loreum Ipsum</a></h4>
										<p>Sed dignissim mollis augue finibus accumsan. Donec at ante accumsan mattis turpis. Donec eget </p>
										<button class="btn btn-xs btn-success" type="button">Selengkapnya</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="blog">
							<figure>
								<img src="{{asset('front/img/all/blog-3.jpg')}}" alt=""/>
							</figure>
							<div class="blog-caption">
								<div class="caption">
									<div class="blog-meta">
										<a class="date">Aug 12-2017</a>
										<a class="comments">&nbsp;</a>
										<a class="user">Admin</a>
									</div>
									<div class="blog-detail">
										<h4><a href="#">Finibus Accumsan</a></h4>
										<p>Sed dignissim mollis augue finibus accumsan. Donec at ante accumsan mattis turpis. Donec eget </p>
										<button class="btn btn-xs btn-success" type="button">Selengkapnya</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="blog">
							<figure>
								<img src="{{asset('front/img/all/blog-3.jpg')}}" alt=""/>
							</figure>
							<div class="blog-caption">
								<div class="caption">
									<div class="blog-meta">
										<a class="date">Aug 12-2017</a>
										<a class="comments">&nbsp;</a>
										<a class="user">Admin</a>
									</div>
									<div class="blog-detail">
										<h4><a href="#">Finibus Accumsan</a></h4>
										<p>Sed dignissim mollis augue finibus accumsan. Donec at ante accumsan mattis turpis. Donec eget </p>
										<button class="btn btn-xs btn-success" type="button">Selengkapnya</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="clear"></div>
		 <!--//================Partner start==============//-->  
      <section class="banner padTB100">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="banner-content">
							<h2 class="banner-title">Konsultasi / Jemput Zakat </h2>
							<h2>Hubungi : {{count($kontak)!=0 ? $kontak[0]->telepon : ''}} / 0857 518 00000</h2>
							{{--  <a href="#" class="itg-button active">Get Quote</a>  --}}
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="clear"></div>
	   <section id="contact_us" class="padTB100">	
			<!--- Theme heading start-->
			<div class="theme-heading">
				<label>BAZNAS Kota Bogor</label>
				<h2>Kontak Kami</h2>
				<span> <i class="fa fa-map" aria-hidden="true"></i> </span>
			</div>	
			<div class="container">
				<div class="row">
					<div class="col-lg-12" id="maps">
						<div id="map_wrapper">
						<div id="map_canvas"></div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:20px;">
                    <div class="col-lg-8" style="padding-left:0px !important;margin-left:0px !important">
                        <div class="theme-form">
                        <h2 style="padding-left:12px;">Hubungi Kami</h2>
                            <form id="form-kontak">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="nama" placeholder="Name" id="nama" required="required" onkeyup="cclear('namap')" style="margin-bottom:0px;">
									<span id="namap" style="font-style:italic;color:red;font-size:11px;"></span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="email" placeholder="Email" id="email" required="required"  onkeyup="cclear('emailp')" style="margin-bottom:0px;">
									<span id="emailp" style="font-style:italic;color:red;font-size:11px;"></span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="sub" placeholder="Subject" id="subject" required="required"  onkeyup="cclear('subjectp')" style="margin-bottom:0px;">
									<span id="subjectp" style="font-style:italic;color:red;font-size:11px;"></span>
                                </div>
                                <div class="col-xs-12">&nbsp;</div>
                                <div class="col-xs-12">
                                    <textarea placeholder="Your Message" name="pesan" id="pesan" rows="4" required="required" onkeyup="cclear('pesanp')" ></textarea>
									<span id="pesanp" style="font-style:italic;color:red;font-size:11px;"></span>
                                </div>
                                <div class="col-xs-6">
								   {!! NoCaptcha::display() !!}
									<span id="responsep" style="font-style:italic;color:red;font-size:11px;"></span>
                                </div>
                                <div class="col-xs-6">
                                    <input type="button" id="simpankontak" value="submit" class="itg-button active pull-right">
                                </div>
                            </form>
							<script>
								$(document).ready(function(){
									$('input#simpankontak').click(function(){
										var nama=$('#nama').val();
										var email=$('#email').val();
										var subject=$('#subject').val();
										var pesan=$('#pesan').val();
										var response = grecaptcha.getResponse();
										//alert(response);
										if(nama=='')
										{
											$('span#namap').text('Silahkan Masukan Nama');
										}
										else if(email=='')
										{
											$('span#emailp').text('Silahkan Masukan Email');
										}
										else if(subject=='')
										{
											$('span#subjectp').text('Silahkan Masukan Subjek');
										}
										else if(pesan=='')
										{
											$('span#pesanp').text('Silahkan Masukan Pesan');
										}
										else if(response=='')
										{
											$('span#responsep').text('Silahkan Ceklist Captcha');
										}
										else
										{
											$.ajax({
												url : APP_URL+'/simpankontak',
												data : $('#form-kontak').serialize(),
												type : 'POST',
												success: function(a){  
													$('#nama').val('');
													$('#email').val('');
													$('#subject').val('');
													$('#pesan').val('');
													$('#responsep').text('');
													var id = $('.g-recaptcha').attr('id');
													grecaptcha.reset(id);
													alert('Data Pesan Berhasil Dikirim, dan akan segera Kami Proses..Terima Kasih');
												},
												error: function(e) { 
													
												}  
											});
											
										}
									});

									
								});
								function cclear(idselector)
									{
										$('#'+idselector).text('');
									}
							</script>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h2>Alamat</h2>
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-xs-2"><i class="fa fa-map-marker"></i></div>
                            <div class="col-xs-10">{{count($kontak)!=0 ? $kontak[0]->alamat : ''}}</div>
                        </div>
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-xs-2"><i class="fa fa-phone"></i></div>
                            <div class="col-xs-10">{{count($kontak)!=0 ? $kontak[0]->telepon : ''}}</div>
                        </div>
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-xs-2"><i class="fa fa-envelope"></i></div>
                            <div class="col-xs-10">{{count($kontak)!=0 ? $kontak[0]->email : ''}}</div>
                        </div>
                    </div>
				</div>
			</div>
		</section>
	  <div class="clear"></div>
@endsection
@php
	if(count($kontak)!=0)
	{
		list($lat,$long)=explode(';',$kontak[0]->maps);
		$alamat=$kontak[0]->alamat;
	}
	else
	{
		$lat='-6.6075955';
		$long='106.8090257';
		$alamat='';
	}
@endphp


@section('pagescript')
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYzgG72G3M3HVGRdzkvtvO5c4N7lmIuiY&callback=sitebaznas"></script>
	<script>
		$(document).ready(function(){
			//sitebaznas();
			$('#loader-profil').hide();
		});

		function isiprofil(id)
		{
			$('#loader-profil').show();
			$('div#isiprofil').css({'opacity':'0.2'});
			$('div#isiprofil').load(APP_URL+'/profil/detail/'+id,function(){
				$('#loader-profil').hide();
				$('div#isiprofil').css({'opacity':'1'});
			});
		}
		function sitebaznas()
		{
			var latt=parseFloat('{{$lat}}');
			var longg=parseFloat('{{$long}}');
			if(latt!='0')
			{
				var uluru = {lat: latt, lng: longg};
				var contentString = '<div id="content">'+
				'<div id="siteNotice">'+
				'</div>'+
				'<h2 id="firstHeading" class="firstHeading" style="text-align:center">Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</h2>'+
				'<div id="bodyContent"  style="text-align:center">'+
				'<p>{{$alamat}}</p>'+
				'</div>'+
				'</div>';
				var infowindow = new google.maps.InfoWindow({
				content: contentString
				});

				var map = new google.maps.Map(document.getElementById('map_canvas'), {
					zoom: 17,
					center: uluru
				});
				var marker = new google.maps.Marker({
					position: uluru,
					map: map
				});

				infowindow.open(map,marker);
			}
		}
   
		function calc_profesi(selector)
       	{
		//    alert('a');
			$('input[type=text]').autoNumeric('init',{mDec:0});
			var emas=$('#emas').val();
			var nisab = 85 * parseFloat(emas.replace(/,/g,''));

			var p1=$('#prof1').val();
			var p3=$('#prof2').val();
			var p4=$('#prof4');
			var p5=$('#prof5').val();
			var p6=$('#prof6').val();
			var p7=$('#prof7');
			var p8=$('#prof8');
			var p9=$('#prof9');

			p1 = (p1=='' ? 0 : parseFloat(p1.replace(/,/g,'')));
			p3 = (p3=='' ? 0 : parseFloat(p3.replace(/,/g,'')));
			p5 = (p5=='' ? 0 : parseFloat(p5.replace(/,/g,'')));
			p6 = (p6=='' ? 0 : parseFloat(p6.replace(/,/g,'')));
			
			
			var total_jlh=(12*p1)+p3;
			p4.autoNumeric('set',total_jlh);
			// p4.val(total_jlh);
			
			var total_klr=(12*p5)+p6;
			p7.autoNumeric('set',total_klr);
			
			var selisih = total_jlh-total_klr;
			p8.autoNumeric('set',selisih);
			if(selisih >= nisab)
			{
				var zakat=(2.5/100) * selisih;
				p9.autoNumeric('set',zakat);
			}
			else
			{
				p9.autoNumeric('set',0);
			}
			// p7.val(total_klr);
			// $('#nisab').val(nisab);
			$('#nisab').autoNumeric('set',nisab);
			

       	}		
	</script>
	<style>
		#map_wrapper {
		height: 450px;
		padding:10px;
		border:solid #ddd 1px;
		}

		#map_canvas {
			width: 100%;
			height: 100%;
		}
		</style>
@endsection
