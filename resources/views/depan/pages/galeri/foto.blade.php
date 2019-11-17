@extends('layouts.depan')

@section('title')
    Galeri Foto
@endsection

@section('konten')

    <div class="bg_full_cp">
        <div class="bg_full" style="background: #22B662 url('{{asset('asset/img/world-map.png')}}'); background-repeat: no-repeat; background-position: center center;">
            <div class="container">
                <div class="ct">
                    <h2 class="page_title">
                        <span>Dokumentasi</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="who-about list_posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content-inner">
                        <div class="content">
                            <div class="desc">
                                <h2>Galeri Foto</h2>
                                <br>
                                <div id="data">
                                    @include('depan.pages.galeri.foto-data')
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection
@section('footscript')
    <link rel="stylesheet" href="{{asset('depan')}}/jquery.fancybox.css"/>
    <script src="{{asset('depan')}}/jquery.fancybox.js"></script>
    <script>
    $(document).ready(function(){
        $('body').addClass('page_about pages_item page_list_posts');
    });

        $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                //$('#load a').css('color', '#dfecf6');
                //$('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
                var url = $(this).attr('href');
                getPosts(url);
                window.history.pushState("", "", url);
        });
        function getPosts(page) {
            $.ajax({
                    url : page
                }).done(function (data) {
                    $('div#data').html(data);
                }).fail(function () {
                    alert('Halaman Data {{ucwords($jenis)}} Tidak Dapat Di Tampilkan');
            });
        }
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
    
@endsection