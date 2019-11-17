@extends('layouts.depan')

@section('title')
    Kontak Kami
@endsection

@section('konten')
    
    <div class="bg_full_cp">
        <div class="bg_full" style="background: #22B662 url('{{asset('asset/img/world-map.png')}}'); background-repeat: no-repeat; background-position: center center;">
            <div class="container">
                <div class="ct">
                    <h2 class="page_title">
                        <span>Kontak Kami</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="who-about list_posts">
        <div class="container">
            <div class="row">
                <div class="about_left col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content-inner">
                        <div class="content" id="maps">
                            <div id="map_wrapper">
                                <div id="map_canvas"></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="in_touch">
        <div class="container">
            <div class="row">
                <div class="gsc-column col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="title"><span>Kontak <strong>Kami</strong></span></h3>
                </div>
                <div class="gsc-column col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="item1" style="background-color: #5B84CE;min-height:220px !important;">
                        <div class="heightlight_icon" style="color: #5B84CE;">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="heightlight_content">
                            <div class="desc">
                                <h3>Alamat</h3>
                                <p>{{count($kontak)!=0 ? $kontak[0]->alamat : ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gsc-column col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="item1" style="background-color: #9AD064;min-height:220px !important;">
                        <div class="heightlight_icon" style="color: #9AD064;">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="heightlight_content">
                            <div class="desc">
                                <h3>Telepon</h3>
                                <p>{{count($kontak)!=0 ? $kontak[0]->telepon : ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gsc-column col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="item1" style="background-color: #EA9E3D;min-height:220px !important;">
                        <div class="heightlight_icon" style="color: #EA9E3D;">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="heightlight_content">
                            <div class="desc">
                                <h3>Email</h3>
                                <p>{{count($kontak)!=0 ? $kontak[0]->email : ''}}</p>
                            </div>
                        </div>
                    </div>
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
            $('body').addClass('page_about pages_item page_contact');
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
        .in_touch .heightlight_content{
            margin-top:0px !important;
        }
        .desc
        {
            text-align:justify;
        }
        .desc h3{
            font-family: "Roboto Slab",sans-serif;
        }
        .desc h2{
            font-family: "Roboto Slab",sans-serif;
            font-weight: normal;
            line-height: 31px;
            color: #000;
            text-transform: capitalize;
            font-size: 34px;
        }
        .desc ol, .desc ul
        {
            margin-left:50px !important;
            
        }
        .desc ol li, .desc ul li
        {
            font-family: Roboto !important;
            font-weight: 300 !important;
            font-size: 15px;
            font-family: "Roboto",sans-serif;
            line-height: 28px;
        }
        
        .pages_item .main_menu .menu > li > a
        {
            color:#000 !important;
        }
    
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