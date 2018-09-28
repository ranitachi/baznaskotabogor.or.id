@extends('front.layouts.base',['kontak'=>$kontak,'st'=>1])

@section('title')    
    <title>Profil | BAZNAS Kota Bogor</title>
@endsection

@section('content')
        <section class="breadcrumbs-area bg-title ptb-110 bg-opacity bg-relative">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <div class="breadcrumbs">
                          <h2 class="page-title" style="display:block !important;">Profil</h2>
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
                            {{--  <label>Profil</label>  --}}
                            <h2>Profil</h2> 
                        </div>	
                        <div class="row" style="margin-top:-30px">
                            {{--  <div class="col-xs-12">
                            
                                <div class="mixitup-btn">
                                @foreach($profil as $k => $v)	
                                    <a class="filter" href="javascript:isiprofil('{{$v->id}}')"><span>{{$v->title}}</span></a>
                                @endforeach

                                </div>
                            </div>  --}}
                            <div class="col-xs-12" id="isiprofil" style="text-align:justify;padding-right:30px;">
                            @if(count($profil)!=0)
                                {!!$profil[0]->desc!!}
                            @else
                                Data Kosong	
                            @endif
                            </div>
                        </div>
					</div>
					{{--  <div class="col-xs-1" id="" style="text-align:justify">&nbsp;</div>  --}}
					<div class="col-xs-3 course-categoris" id="" style="text-align:justify">
                        <legend>Profil</legend>
                        <ul style="list-style-type: disc;padding-left:20px;">
                            @foreach($profil as $k => $v)	
                                <li><a href="javascript:isiprofil('{{$v->id}}')"><span>{{$v->title}}</span></a></li>
                            @endforeach
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
		});
        function isiprofil(id)
		{
			$('div#isiprofil').load(APP_URL+'/profil/detail/'+id);
		}
		
	</script>

@endsection