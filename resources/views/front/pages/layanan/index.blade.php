@extends('front.layouts.base',['kontak'=>$kontak,'st'=>1])

@section('title')    
    <title>Layanan | BAZNAS Kota Bogor</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
        <section class="breadcrumbs-area bg-title ptb-110 bg-opacity bg-relative">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <div class="breadcrumbs">
                          <h2 class="page-title" style="display:block !important;">Layanan</h2>
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
                    <div class="col-xs-9">
                        <div class="theme-heading" style="text-align:left !important;max-width:100% !important;">
                            <label>Layanan</label>
                            <h2 id="subjudul">Kalkulator Zakat</h2> 
                        </div>	
                        <div class="cssload-container" id="loader" style="top:30% !important;">
                            <div class="sk-wave">
                                <div class="sk-rect sk-rect1"></div>
                                <div class="sk-rect sk-rect2"></div>
                                <div class="sk-rect sk-rect3"></div>
                                <div class="sk-rect sk-rect4"></div>
                                <div class="sk-rect sk-rect5"></div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:-30px">
                            <div class="col-xs-12" id="isiprofil" style="text-align:justify;padding-right:30px;">
                           
                            </div>
                        </div>
					</div>
					{{--  <div class="col-xs-1" id="" style="text-align:justify">&nbsp;</div>  --}}
					<div class="col-xs-3 course-categoris" id="" style="text-align:justify">
                        <legend>Layanan Lain</legend>
                        @php
                            $ly=array('kalkulatorzakat'=>'Kalkulator Zakat','jemputzakat'=>'Jemput Zakat','konfirmasizakat'=>'Konfirmasi Zakat','konsultasizakat'=>'Konsultasi Zakat');
                                $namaly='';
                                if(isset($ly[$id]))
                                {
                                    $namaly=$ly[$id];
                                }
                            
                        @endphp
                        <ul style="list-style-type: disc;padding-left:20px;">
                                <li><a href="javascript:isiprofil('kalkulatorzakat','Kalkulator Zakat')"><span>Kalkulator Zakat</span></a></li>
                                <li><a href="javascript:isiprofil('jemputzakat','Jemput Zakat')"><span>Jemput Zakat</span></a></li>
                                <li><a href="javascript:isiprofil('konfirmasizakat','Konfirmasi Zakat')"><span>Konfirmasi Zakat</span></a></li>
                                <li><a href="javascript:isiprofil('konsultasizakat','Konsultasi Zakat')"><span>Konsultasi Zakat</span></a></li>
                                <li><a href="javascript:isiprofil('rekening','Rekening BAZNAS Kota Bogor')"><span>Rekening BAZNAS Kota Bogor</span></a></li>
                        </ul>
                        <center>
                            {{--  <img src="{{asset('images/logo/logo_2.png')}}" style="width:70%;float:none;text-align:center;">  --}}
                        </center>
                    </div>
                </div>
            </div>
		</section>
		<div class="clear"></div>
		
@endsection

@section('pagescript')
	<script>
		$(document).ready(function(){
			//sitebaznas();
            $('#loader').hide();
            var id='{{$id}}';
            if(id!='list')
            {
                isiprofil(id,'{{$namaly}}');
            }
            else
                isiprofil('kalkulatorzakat','Kalkulator Zakat');
            
		});
       function isiprofil(id,judul)
       {
           $('#loader').show();
		   $('div#isiprofil').css({'opacity':'0.2'});
           $('#isiprofil').load(APP_URL+'/layanan/detail/'+id,function(){
                $('#loader').hide();
                $('div#isiprofil').css({'opacity':'1'});
           });
           $('#subjudul').text(judul);
       }
       
	</script>

@endsection