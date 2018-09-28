@extends('front.layouts.base',['kontak'=>$kontak,'st'=>1])

@section('title')    
    <title>Detail Artike & Berita | BAZNAS Kota Bogor</title>
@endsection

@section('content')
        <section class="breadcrumbs-area bg-title ptb-110 bg-opacity bg-relative">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <div class="breadcrumbs">
                          <h2 class="page-title" style="display:block !important;">Detail Artikel & Berita</h2>
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
                            <label>Detail Artikel & Berita</label>
                            <h2>Judul Detail Beritanya</h2>
                            
                        </div>	
					</div>
					<div class="col-xs-3" id="" style="text-align:justify">
                        <center>
                            <img src="{{asset('images/logo/logo_2.png')}}" style="width:70%;float:none;text-align:center;">
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
		});

		
	</script>

@endsection