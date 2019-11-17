@extends('layouts.depan')

@section('title')
    {{$pub->title}}
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
                    <div class="main-content-inner">
                        <div class="cmp_detail">
                            <div class="post-block">
                                <div class="post-image">
                                    <a href=""><img src="{{asset($pub->file)}}" alt="{{$pub->title}}" style="width:100%"></a>
                                </div>
                                <div class="post-content">
                                    <div class="post-title">
                                        <a href=""><span>{{$pub->title}}</span></a>
                                    </div>
                                    <div class="post-meta">
                                        <span>
                                            <a href="">{{$pub->cat_berita->nama_kategori}}</a>
                                            <span> - {{tgl_indo($pub->created_at)}} </span>
                                        </span>
                                    </div>
                                    <div class="post-body">
                                        <p>{!!$pub->desc!!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <hr>
                            <div class="recent_posts">
                                <h2 class="block-title">
                                    <span>Publikasi Lainnya</span>
                                </h2>
                                <div class="content block-content">
                                    <ul>
                                        @php
                                            $beritalain=App\Models\Berita::where('id','!=',$pub->id)->orderBy('created_at','desc')->limit(5)->get();
                                        @endphp
                                        @if ($beritalain->count()!=0)
                                            
                                            @foreach ($beritalain as $item)
                                                <li>
                                                    <div class="field-content">
                                                        <div class="post-block">
                                                            <div class="post-image">
                                                                <a href="{{url('publikasi/'.$jenis,str_slug($item->title))}}"><img src="{{asset($item->file)}}" alt="{{$item->title}}"></a>
                                                            </div>
                                                            <div class="post-content">
                                                                <div class="post-title">
                                                                    <a href="{{url('publikasi/'.$jenis,str_slug($item->title))}}"><span>{{$item->title}}</span></a>
                                                                </div>
                                                                <div class="post-meta">
                                                                    <span>{{tgl_indo2($item->created_at)}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                <img src="{{asset('images/logo/empty-result_shot.png')}}" style="width:70%;margin:0 auto">
                                            </li>

                                        @endif
                                        
                                       
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
        $('body').addClass('page_about pages_item page_list_posts page_blog_detail');
    });
    </script>
    <style>
        .desc,.post-body
        {
            text-align:justify;
        }
        .desc h2,
        .post-body h2
        {
            font-family: "Roboto Slab",sans-serif;
            font-weight: normal;
            line-height: 31px;
            color: #000;
            text-transform: capitalize;
            font-size: 34px;
        }
        .desc ol, .desc ul,
        .post-body ol, .post-body ul
        {
            margin-left:50px !important;
            
        }
        .post-body table,
        .post-body th,
        .post-body td
        {
           font-family: Roboto !important;
            font-weight: 300 !important;
            font-size: 15px;
            line-height: 28px;
        }
        .desc ol li, .desc ul li,
        .post-body ol li, .post-body ul li
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