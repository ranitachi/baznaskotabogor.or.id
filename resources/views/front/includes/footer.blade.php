<footer>
			<div class="top-footer padTB100">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12 margin-small">
							<div class="widget">
								<a href="{{URL::to('/')}}" class="logo" style="float:left;width:100%;">
									<img src="{{asset('images/logo/logo_2.png')}}" alt="LOGO" style="width:100px; height:150px;"/>
								</a>
								{{--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>  --}}
								<ul class="social-icon circle box">
									<li><a href="{{count($kontak)!=0 ? $kontak[0]->facebook : '#'}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="{{count($kontak)!=0 ? $kontak[0]->twitter : '#'}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="{{count($kontak)!=0 ? $kontak[0]->instagram : '#'}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								</ul>  
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 col-xs-12 margin-small">
							<div class="widget">
								<h3>Fans Page FB</h3>
								<div class="fb-page" data-href="https://www.facebook.com/baznasbogor/" data-tabs="timeline" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/baznasbogor/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/baznasbogor/">Baznas Kota Bogor</a></blockquote></div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 margin-small">
							<div class="widget">
								<h3>Twitter Feed</h3>
								<!--https://twitrss.me/twitter_user_to_rss/?user=baznaskotabogor-->
								<a class="twitter-timeline" data-lang="id" data-height="300" data-dnt="true" data-theme="dark" href="https://twitter.com/BaznasKotaBogor?ref_src=twsrc%5Etfw">Tweets by BaznasKotaBogor</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
								
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 col-xs-12 margin-small">
							<div class="widget">
								<h3>Instagram Gallery</h3>
								<ul class="gallery">
									@php
									if(isset($getinstagram))
									{
										if(count($getinstagram)!=0)
										{

											$random_insta=array_rand($getinstagram,9);
											foreach($random_insta as $k=>$v)
											{
												echo '<li><a href="'.$getinstagram[$v].'" target="_blank"><img src="'.$getinstagram[$v].'" alt="" style="width:78px;height:78px;"></a></li>';
											}							
										}
									}
									@endphp
                                    {{--  <li><img src="{{asset('front/img/all/foot-gallery-1.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('front/img/all/foot-gallery-1.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('front/img/all/foot-gallery-1.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('front/img/all/foot-gallery-1.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('front/img/all/foot-gallery-1.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('front/img/all/foot-gallery-1.jpg')}}" alt=""></li>  --}}
                                </ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-footer">
				<div class="container">
					<p>© 2017 -  <span>Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</span></p>
				</div>
			</div>
		</footer>