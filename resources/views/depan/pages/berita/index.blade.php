@extends('layouts.depan')

@section('title')
    {{ucwords($jenis)}}
@endsection

@section('konten')

    <div class="bg_full_cp">
        <div class="bg_full" style="background: #22B662 url('{{asset('asset/img/world-map.png')}}'); background-repeat: no-repeat; background-position: center center;">
            <div class="container">
                <div class="ct">
                    <h2 class="page_title">
                        <span>Publikasi</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="list_posts">
        <div class="container">
            <div class="row">
                <div class="main-content col-xs-12 col-md-8">
                   
                    <div id="data">
        
                            @include('depan.pages.berita.data')
                        
                    </div>
                   
                </div>
                <div class="sidebar-right sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar-inner">
                        <div>
                            <div class="categories">
                                <h2 class="block-title">
                                    <span>Kategori Publikasi</span>
                                </h2>
                                <div class="content block-content">
                                    <ul>
                                        @php
                                            $kategori=\App\Models\CatBerita::orderBy('nama_kategori')->get();
                                        @endphp
                                        @foreach ($kategori as $item)
                                            <li><a href="{{url('publikasi/'.str_slug($item->nama_kategori))}}">{{$item->nama_kategori}}</a></li>
                                        @endforeach
                                    </ul>
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
@endsection