<section>
		<div id="main-slider" class="owl-carousel style-one owl-theme">
		@foreach($slider as $k => $v)
			
		
			<div class="item">	
			  <div class="banner-section" style="background-image:url('{{asset(str_replace('laravel-filemanager/','',$v->picture))}}')">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="slide-caption">
									<div class="slide-content">
										<label>{{$v->title}}</label>
										<h1 class="s-font">{{$v->desc}}</h1>
										{{--  <a href="#" class="itg-button active">Consult</a>
										<a href="#" class="itg-button">About</a>  --}}
									</div>
									{{--  <div class="slide-statue">
										<figure>
											<img src="{{asset('front/img/slider/slide-statue.png')}}" alt=""/>
										</figure>
									</div>  --}}
								</div>
							</div>
						</div>
					</div>
			  </div>
			</div>
		@endforeach
		</div>
	</section>