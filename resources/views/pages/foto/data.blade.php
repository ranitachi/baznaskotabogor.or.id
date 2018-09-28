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
    @php
        $x=1;
        foreach($galeri as $item):
    @endphp
    @if ($x==1)
        
    @endif
        <div class="col-md-6 col-sm-6">
            <!--item news-->
            <div class="item_news option_blog">        
                <ul class="rslides news_slider">
                <li class="border_img"><img src="{{asset($item->picture)}}" alt="{{$item->title}}"></li>
                </ul> 
                <span class=""><i class="fa fa-clock-o"></i>&nbsp;{{(date('d-m-Y H:i:s',strtotime($item->created_at)))}}</span>
                <h3><a href="{{url('publikasi/'.$jenis,str_slug($item->title))}}">{{$item->title}}</a></h3>
                <p>
                    {{substr(strip_tags($item->desc),0,100)}}[..]
                </p>
                <a class="button_url" href="{{url('publikasi/'.$jenis,str_slug($item->title))}}"> Selengkapnya</a>
            </div>
            <!--item news-->
        </div>

    
        @if ($x==2)
        </div>
        <div class="row">
        <div class="divisor_line"></div>
        
        @endif
    
    @php
        if($x==2)
            $x=0;

        $x++;
        endforeach
    @endphp
    
        </div>

    <div class="row">
        <div class="col-md-12">
            {{$galeri->links()}}
        </div>
    </div>
@endif