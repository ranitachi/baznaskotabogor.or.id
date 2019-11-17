@if (count($galeri)==0)
    <div class="row error">
        <div class="col-md-4 col-sm-4">&nbsp;</div>
        <div class="col-md-4 col-sm-4 text-center">
            <center>
                <img src="{{asset('images/logo/empty-result_shot.png')}}" style="" >
            </center>
        </div>
        <div class="col-md-4 col-sm-4">&nbsp;</div>

        <div class="col-md-12 col-sm-12 text-center">
            <h1>Mohon Maaf</h1>  
            <p class="top">Data {{ucwords($jenis)}} Belum Tersedia</p>
        </div>

    </div>
    
@else
<div class="row">
    <p class="imglist" style="max-width: 1000px;">
    {{-- <a href="https://source.unsplash.com/juHayWuaaoQ/1500x1000" data-fancybox="images" data-caption="Backpackers following a dirt trail">
        <img src="https://source.unsplash.com/juHayWuaaoQ/240x160" />
    </a>

    <a href="https://source.unsplash.com/eWFdaPRFjwE/1500x1000" data-fancybox="images" data-caption="Mallorca, Llubí, Spain">
        <img src="https://source.unsplash.com/eWFdaPRFjwE/240x160" />
    </a>
    
    <a href="https://source.unsplash.com/c1JxO-uAZd0/1500x1000" data-fancybox="images" data-caption="Danish summer">
        <img src="https://source.unsplash.com/c1JxO-uAZd0/240x160" />
    </a>

    <a href="https://source.unsplash.com/eXHeq48Z-Q4/1500x1000" data-fancybox="images" data-caption="Sunrise above a sandy beach">
        <img src="https://source.unsplash.com/eXHeq48Z-Q4/240x160" />
    </a>

    <a href="https://source.unsplash.com/RFgO9B_OR4g/1500x1000" data-fancybox="images" data-caption="Woman on a slope by the shore">
        <img src="https://source.unsplash.com/RFgO9B_OR4g/240x160" />
    </a>

    <a href="https://source.unsplash.com/7bwQXzbF6KE/1500x1000" data-fancybox="images" data-caption="Mountain hiking sunset">
        <img src="https://source.unsplash.com/7bwQXzbF6KE/240x160" />
    </a>

    <a href="https://source.unsplash.com/NhU0nUR7920/1500x1000" data-fancybox="images" data-caption="Sunset Picnic">
        <img src="https://source.unsplash.com/NhU0nUR7920/240x160" />
    </a>
    
    <a href="https://source.unsplash.com/B2LYYV9-y0s/1500x1000" data-fancybox="images" data-caption="On them Indiana Nights">
        <img src="https://source.unsplash.com/B2LYYV9-y0s/240x160" />
    </a>
    </p> --}}
    @php
        $x=1;
        foreach($galeri as $item):
    @endphp
    @if ($x==1)
        
    @endif
            <!--item news-->
            <div class="img-gallery col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom:10px;">
                <h3 style="font-family: Roboto Slab !important">{{$item->title}}</h3>
                <a href="{{asset($item->picture)}}" data-fancybox="images" data-caption="{{$item->title}}">
                    {{-- <img src="https://source.unsplash.com/juHayWuaaoQ/240x160" /> --}}
                    <img src="{{asset($item->picture)}}" alt="{{$item->title}}" style="height:250px">
                </a>
                
			</div>
            {{-- <div class="item_news option_blog">        
                <ul class="rslides news_slider">
                    <li class="border_img"><img src="{{asset($item->picture)}}" alt="{{$item->title}}"></li>
                    </ul> 
                    <span class=""><i class="fa fa-clock-o"></i>&nbsp;{{(date('d-m-Y H:i:s',strtotime($item->created_at)))}}</span>
                    <h3><a href="{{url('publikasi/'.$jenis,str_slug($item->title))}}">{{$item->title}}</a></h3>
                    <p>
                        {{substr(strip_tags($item->desc),0,100)}}[..]
                    </p>
                    <a class="button_url" href="{{url('publikasi/'.$jenis,str_slug($item->title))}}"> Selengkapnya</a>
            </div> --}}
            <!--item news-->


    
    @php

        $x++;
        endforeach
    @endphp
    </p>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{$galeri->links()}}
        </div>
    </div>
@endif