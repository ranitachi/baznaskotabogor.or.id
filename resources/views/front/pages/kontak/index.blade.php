@extends('front.layouts.base',['kontak'=>$kontak,'st'=>1])

@section('title')    
    <title>Kontak | BAZNAS Kota Bogor</title>
@endsection

@section('content')
        <section class="breadcrumbs-area bg-title ptb-110 bg-opacity bg-relative">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <div class="breadcrumbs">
                          <h2 class="page-title" style="display:block !important;">Kontak Kami</h2>
                          <ul>
                              <li style="color:#f8b239;z-index:100 !important;position:relative !important;">Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </section>
   		 <section id="profil" class="padTB50">
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
		});
        
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