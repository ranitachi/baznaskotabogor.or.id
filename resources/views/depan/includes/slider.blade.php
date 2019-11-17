<div id="main" class="slideshow">
	<div id="sync10" class="owl-carousel owl-theme">
        @php
            $slider=\App\Models\Slider::where('flag',1)->orderBy('created_at','desc')->limit(4)->get();
        @endphp

        @foreach ($slider as $item)
            <div class="item" style="background-image: url('{{asset($item->picture)}}'); width: 100%;">
                <div class="container">
                    <div class="text_zz">
                        <h3>{{$item->title}}</h3>
                        <div class="donate">
							<div class="button_donate">
								<a href="{{url('layanan/donasi-zakat')}}">Mari Berdonasi</a>
							</div>
						</div>
                    </div>
                </div>
            </div>
        @endforeach
	     	
	</div>
</div>