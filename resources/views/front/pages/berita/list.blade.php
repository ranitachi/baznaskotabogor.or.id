@extends('front.layouts.base',['kontak'=>$kontak,'st'=>1])

@section('title')    
    <title>Data Artikel & Berita | BAZNAS Kota Bogor</title>
@endsection

@section('content')
        <section class="breadcrumbs-area bg-title ptb-110 bg-opacity bg-relative">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <div class="breadcrumbs">
                          <h2 class="page-title" style="display:block !important;">Data Artikel & Berita</h2>
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
                    <div class="col-xs-10">
                        <div class="theme-heading" style="text-align:left !important;max-width:100% !important;">
                            <label>Kategori</label>
                            <h2 id="kategori">Sub Kategori</h2> 
                        </div>
                        <div class="row" style="margin-top:-20px">
                            <div class="col-md-4 col-sm-6 col-xs-12">
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
                            
                        </div>
					</div>
					<div class="col-xs-2 course-categoris" id="" style="text-align:justify">
                        <legend>Kategori</legend>
                        <ul style="list-style-type: disc;padding-left:20px;">
                            {{--  @foreach($profil as $k => $v)	  --}}
                                {{--  <li><a href="javascript:isiprofil('{{$v->id}}')"><span>{{$v->title}}</span></a></li>  --}}
                            {{--  @endforeach  --}}
                                <li><a href="#"><span>Kategori</span></a></li>
                                <li><a href="#"><span>Kategori</span></a></li>
                                <li><a href="#"><span>Kategori</span></a></li>
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

		
	</script>

@endsection