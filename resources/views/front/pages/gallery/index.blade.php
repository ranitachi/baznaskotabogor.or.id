@extends('front.layouts.base',['kontak'=>$kontak,'st'=>1,'getinstagram'=>$getinstagram])

@section('title')    
    <title>Galeri | BAZNAS Kota Bogor</title>
@endsection

@section('content')
        <section class="breadcrumbs-area bg-title ptb-110 bg-opacity bg-relative">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <div class="breadcrumbs">
                          <h2 class="page-title" style="display:block !important;">Galeri</h2>
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
                            <label>Galeri BAZNAS Kota Bogor</label>
                            <h2 id="subtitle">Galeri Foto</h2> 
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
                        <div class="row" style="margin-top:-30px" id="isigaleri">
                         
                        </div>
					</div>
					<div class="col-xs-3 course-categoris" id="" style="text-align:justify">
                        <legend>Galeri Lain</legend>
                        <ul style="list-style-type: disc;padding-left:20px;">
                            <li><a href="javascript:isigaleri('foto','Galeri Foto')"><span>Galeri Foto</span></a></li>
                            <li><a href="javascript:isigaleri('video','Galeri Video')"><span>Galeri Video</span></a></li>
                            <li><a href="javascript:isigaleri('instagram','Galeri Instagram')"><span>Galeri Instagram</span></a></li>
                        </ul>
                       
                    </div>
            </div>
        
		</section>
		<div class="clear"></div>
		
@endsection
@section('pagescript')
<script>
    $(document).ready(function(){
        $('#loader').hide();
        isigaleri('foto','Galeri Foto');
    });
    function isigaleri(id,judul)
    {
        $('#loader').show();
		$('div#isigaleri').css({'opacity':'0.2'});

        $('#mixItUp').mixItUp('destroy');
        $('#subtitle').text(judul);
        $('#isigaleri').load(APP_URL+'/gallery/'+id,function(){
            $('#mixItUp').mixItUp();
            $('#loader').hide();
		    $('div#isigaleri').css({'opacity':'1'});
        });
    }

</script>
@endsection