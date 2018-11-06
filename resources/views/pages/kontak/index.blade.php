@extends('layouts.front')
@section('title')
    <title>Kontak : Badan Amil Zakat (BAZNAS) Kota Bogor</title>
@endsection
@section('main')
    <section class="main">
            <div class="main_title simple_sections">
                <div class="main_name fadeInDown animated delay1">
                    <div class="container">
                        <div class="row">
                            @include('include.menu')
                        </div>
                    </div>
                </div>
            
                <div class="done_info sections fadeInUp animated delay2">
                    <div class="container">
                        <div class="row">
                            @include('include.head')
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('content')
    <div class="container">
       <div class="row">
            <div class="col-lg-8" id="maps">
				<div id="map_wrapper">
				<div id="map_canvas"></div>
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
@section('footscript')
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