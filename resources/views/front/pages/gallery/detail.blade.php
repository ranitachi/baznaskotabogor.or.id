@if($id=='foto')
    <div class="row">
        <div class="col-xs-12">
            <div class="mixitup-btn">
                <a class="filter"  data-filter="all"><span>ALL</span></a>
                @foreach($gal as $k => $v)
                    @php
                        $kat=str_replace(' ','-',$k);
                    @endphp
                    <a class="filter"  data-filter=".{{$kat}}"><span>{{$k}}</span></a>
                @endforeach
                
            </div>
        </div>
    </div>
@endif
<div class="mix-default">
    <div class="row">
        <div id="mixItUp">
            @if($id=='foto')
                @foreach($gal as $k => $v)
                    @php
                        $kat=str_replace(' ','-',$k);
                    @endphp
                    @foreach($v as $i => $vv)
                        <div class="cases col-md-3 col-sm-6 col-xs-12 mix {{$kat}}">
                            <figure style="height:200px;text-align:center !important;">
											<img src="{{asset($vv->picture)}}" alt="" style="height:100%;width:auto;float:none !important;"/>
											<figcaption>
												<a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
											</figcaption>
									</figure>
                        </div>                    
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
</div>

@if($id=='video')
    <div class="row">
        @foreach($vid as $i => $vv)
            @php
                $url = $vv->url;
                preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                $id = $matches[1];
            @endphp 
            <div class="col-md-4 col-sm-6 col-xs-12">
                <iframe id="ytplayer" type="text/html" style="width:100%"
                src="https://www.youtube.com/embed/'.$id.'?rel=0&showinfo=0&color=white&iv_load_policy=3"
                frameborder="0" allowfullscreen></iframe>
                <div><h4>{{$vv->title}}</h4></div>
            </div>                     
        @endforeach
    </div>
@endif

@if($id=='instagram')
    <div class="row">
        @foreach($instagram as $i => $vv)
           
            <div class="col-md-4 col-sm-6 col-xs-12">
                <img src="{{$vv}}" style="width:90%;border:1px solid #ddd;padding:8px;">
                <div><h4></h4></div>
            </div>                     
        @endforeach
    </div>
@endif
