@extends('layouts.depan')

@section('title')
    {{$profil ? $profil->title :''}}
@endsection

@section('konten')

    <div class="bg_full_cp">
        <div class="bg_full" style="background: #22B662 url('{{asset('asset/img/world-map.png')}}'); background-repeat: no-repeat; background-position: center center;">
            <div class="container">
                <div class="ct">
                    <h2 class="page_title">
                        <span>Profil</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="who-about list_posts">
        <div class="container">
            <div class="row">
                <div class="about_left col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="content-inner">
                        <div class="content">
                            <div class="desc">
                                {!!$profil ? $profil->desc : ''!!}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="sidebar-right sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="sidebar-inner">
                        <div>
                            <div class="categories">
                                <h2 class="block-title">
                                    <span>Profil BAZNAS Kota Bogor</span>
                                </h2>
                                <div class="content block-content">
                                    <ul>
                                        <li>
                                            <a href="{{url('profil/sejarah')}}">Sejarah BAZNAS</a>
                                        </li>
                                        <li>
                                            <a href="{{url('profil/tentang')}}">Tentang BAZNAS Kota Bogor</a>
                                        </li>
                                        <li>
                                            <a href="{{url('profil/visi-misi')}}">Visi Misi BAZNAS Kota Bogor</a>
                                        </li>
                                        <li>
                                            <a href="{{url('profil/struktur-organisasi')}}">Struktur Organisasi</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="overlay" id="img-id">
        <img id="fullscreen"  alt="Fullscreen">
    </a>
@endsection
@section('footscript')

    <script>
    $(document).ready(function(){
        $('body').addClass('page_about pages_item page_list_posts');
    });
    </script>
    <style>
        .desc
        {
            text-align:justify;
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
    </style>
    @if (str_slug($profil->title)=='struktur-organisasi')
        <style>
            .desc img
            {
                width:100% !important;
                height:auto !important;
                cursor:zoom-in;
            }
            .overlay {
                position: fixed;
                z-index: 99;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.9);
                display: flex;
                align-items: center;
                text-align: center;
                visibility: hidden;
                /* opacity: 0; */
                transition: opacity .3s;
            }

            .overlay img{
                max-width: 100%;
                max-height: 100%;
                width: auto;
                height: auto;
                transform: scale(0.95);
                transition: transform .3s;
                margin:0 auto !important;
            }

        </style>
         <script>
            $(document).ready(function(){
                // alert('aa')
                $('.desc img').on('click',function(){
                    // alert($(this).attr('src'));
                    var src=$(this).attr('src');
                    $('#fullscreen').attr('src',src);
                    $('#img-id').css({'visibility':'visible'});
                    $('#img-id').on('click',function(e){
                        // alert(e.target.id);
                        if(e.target.id!='fullscreen')
                        {
                            $('#fullscreen').attr('src','');
                            $('#img-id').css({'visibility':'hidden'});
                        }
                    });
                });
                
            });
            $(document).keyup(function(e) {
                if (e.key === "Escape") { // escape key maps to keycode `27`
                    $('#fullscreen').attr('src','');
                    $('#img-id').css({'visibility':'hidden'});
                }
            });
        </script>
    @endif
@endsection