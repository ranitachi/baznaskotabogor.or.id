@if (count($program)==0)
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
            <p class="top">Data Program Kerja Belum Tersedia</p>
        </div>

    </div>
    
@else
    @php
        $x=1;
        foreach($program as $item):
    @endphp
    @if ($x==1)
        <div class="row">
    @endif
        <div class="col-md-6 col-sm-6">
            <!--item news-->
            <div class="item_news option_blog">        
                <ul class="rslides news_slider">
                <li class="border_img"><img src="{{asset($item->logo)}}" alt="{{$item->logo}}"></li>
                </ul> 
                <span class=""><i class="fa fa-clock-o"></i>&nbsp;{{(date('d-m-Y H:i:s',strtotime($item->created_at)))}}</span>
                <h3><a href="{{url('program-baznas',str_slug($item->nama_program))}}">{{$item->nama_program}}</a></h3>
                <p>
                    {{substr(strip_tags($item->desc),0,100)}}[..]
                </p>
                <a class="button_url" href="{{url('program-baznas',str_slug($item->nama_program))}}"> Selengkapnya</a>
            </div>
            <!--item news-->
        </div>

    
        @if ($x==2)
        </div>
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
            
        </div>
    </div>
@endif