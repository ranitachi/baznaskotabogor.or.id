@php
    $program=\App\Models\Program::where('flag',1)->orderBy('nama_program')->get();
@endphp

<div class="campaigns">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2 style="font-weight: 400;font-size: 35px;font-family: Roboto slab;text-align: center;" class="title">Donasi Online BAZNAS Kota Bogor</h2>
				{{-- <p>Children are waiting for your help...</p> --}}
			</div>
			<div id="sync110" class="owl-carousel owl-theme">
                @foreach ($getprogram as $item)
                    
                    <div class="item" style="background: #fff;height: 450px;margin: 0px 10px;">
                        <div class="z">
                            <div class="img">
                                <div class="img-1 text-center">
                                    {{-- <img src="{{asset('images/logo/ZAKAT-BAZNAS.png')}}" alt="" style="width:50%;margin-top:40px;"> --}}
                                    <img src="https://paybill.id/cfd/upload/banner-program/compress/{{ $item->thumbnail }}" alt="" style="width:100%;height:200px">
                                </div>
                                
                            </div>
                            <div class="ct">
                                <div class="text_show" style="padding:0 10px;">
									<h3 class="" style="min-height:50px;font-family: Roboto slab;"><a href="https://donasi.online/baznas-kota-bogor/program/{{ $item->urlDomain }}" target="_blank">{{ $item->judulProgram }}</a></h3>
									<hr>
									<div class="row" style="min-height:150px !important">
										<div class="col-md-6 text-center">
											<label class="text-info">Dana Terkumpul</label>
										</div>
										<div class="col-md-6">
											<div style="font-size:20px;font-weight:bold;font-family: Roboto slab;" class="text-success text-right">Rp {{ number_format($item->listAkumulasiPenerimaanLain[0]->donasi,0,'.',',') }}</div>    
										</div>
									</div>
                                    
                                </div>
                                <div class="donate">
                                    <div class="button_donate pull-right" style="bottom:10px;position: absolute;right:10px">
                                        <a href="https://donasi.online/baznas-kota-bogor/program/{{ $item->urlDomain }}" target="_blank">Donasi Sekarang</a>
                                    </div>
                                    
                                </div>
                                <div class="raised">
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($getkitabisa as $item)
                    @if ($item->days_remaining>0)		
						<div class="item" style="background: #fff;height: 450px;margin: 0px 10px;">
							<div class="z">
								<div class="img">
									<div class="img-1 text-center">
										{{-- <img src="{{asset('images/logo/ZAKAT-BAZNAS.png')}}" alt="" style="width:50%;margin-top:40px;"> --}}
										<img src="{{ $item->image }}" alt="" style="width:100%;height:200px">
									</div>
									
								</div>
								<div class="ct">
									<div class="text_show" style="padding:0 10px;">
										<h3 class="" style="min-height:50px;font-family: Roboto slab;"><a href="https://kitabisa.com/campaign/{{ $item->short_url }}" target="_blank">{{ $item->title }}</a></h3>
										<hr>
										<div class="row" style="min-height:150px !important">
											<div class="col-md-6 text-center">
												<label class="text-info">Dana Terkumpul</label>
											</div>
											<div class="col-md-6">
												<div style="font-size:20px;font-weight:bold;font-family: Roboto slab;" class="text-success text-right">Rp {{ number_format($item->donation_received,0,'.',',') }}</div>    
											</div>
										</div>
										
									</div>
									<div class="donate">
										<div class="button_donate pull-right" style="bottom:10px;position: absolute;right:10px">
											<a href="https://kitabisa.com/campaign/{{ $item->short_url }}" target="_blank">Donasi Sekarang</a>
										</div>
										
									</div>
									<div class="raised">
										&nbsp;
									</div>
								</div>
							</div>
						</div>
					@endif
                @endforeach
			</div>
		</div>
	</div>
</div>
<div class="upcoming">
	<div class="container">
		<div class="row">
			{{-- <div class="heading col-lg-12 col-md-12 col-sm-12 col-xs-12">
				 <h2 class="title">Donasi Online BAZNAS Kota Bogor</h2>
			</div> --}}
			{{-- <div class="i-gsc-column col-lg-6 col-md-6 col-sm-12 col-xs-12"> --}}
				{{-- <ul>
					<li>
						<div class="event-date">
							<span>Visi</time>
						</div>
						<div class="event-title">
							<a>Our question reached the United Nations!</a>
						</div>
						<div class="event-body">
							<p>Donec finibus sit amet orci eget ultricies. Praesent posuere ante ut erat fringilla, vestibulum placerat metus mattis. Aenean dictum vitae nisl nec tempor.</p>
						</div>
					</li>
					<li>
						<div class="event-date">
							<span>Misi</time>
						</div>
						<div class="event-title">
							<a>Charity marathon 2016: Run for better life</a>
						</div>
						<div class="event-body">
							<p>Donec finibus sit amet orci eget ultricies. Praesent posuere ante ut erat fringilla, vestibulum placerat metus mattis. Aenean dictum vitae nisl nec tempor.</p>
						</div>
					</li>
					<li>
						<div class="event-date">
							<span>Nilai</time>
						</div>
						<div class="event-title">
							<a>Accelerating the elimination of trachoma</a>
						</div>
						<div class="event-body">
							<p>Donec finibus sit amet orci eget ultricies. Praesent posuere ante ut erat fringilla, vestibulum placerat metus mattis. Aenean dictum vitae nisl nec tempor.</p>
						</div>
					</li>
                </ul> --}}
                @php
                    // $profil=\App\Models\ProfileCCIT::where('flag',1)->get();
                    // $prof=array();
                    // foreach ($profil as $key => $value) {
                    //     $prof[str_slug($value->title)]=$value;
                    // }
                @endphp
                {{-- <div class="panel-group" id="accordion">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            Tentang BAZNAS Kota Bogor</a>
                        </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">{!!isset($prof['tentang']) ? ($prof['tentang']->desc) : ''!!}</div>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#visimisi">
                            Visi BAZNAS Kota Bogor</a>
                        </h4>
                        </div>
                        <div id="visimisi" class="panel-collapse collapse">
                        <div class="panel-body"><b>Menjadi Baznas terbaik dalam Mewujudkan Kota Zakat</b></div>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                            Misi BAZNAS Kota Bogor</a>
                        </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">Misi ini membawa pesan bahwa BAZNAS Kota Bogor hadir dengan perannya dalam pengelolaan dana zakat, infak dan shodaqoh dengan karakter yang amanah. Amanah dalam arti profesional dalam tata kelola lembaga, tata kelola keuangan dan tata kelola penyaluran dana ZIS yang berbasiskan asnaf. Karena ke-amanah-annya tersebut, maka BAZNAS Kota Bogor berkontribusi dalam memakmurkan dan mensejahterakan muzakki dan mustahik di Kota Bogor khususnya.
                        <br><br>
                            Dalam mewujudkan visinya, BAZNAS Kota Bogor memiliki Misi :
                            <ul style="list-style-type: square !important;margin-left:20px;">
                                <li>Meningkatkan kepercayaan dan penerimaan zakat</li>
                                <li>Mendistribusikan dan mendayagunakan zakat yang memberi efek ganda bagi peningkatan martabat mustahiq menuju kemakmuran dan kesejahteraan.</li>
                                <li>Mensinerginkan stakeholder zakat di Kota Bogor</li>
                                <li>Mendorong lahirnya regulasi zakat yang lebih menguatkan perzakatan</li>
                            </ul>

                        </div>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                            Nilai BAZNAS Kota Bogor</a>
                        </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            Dalam seluruh aktivitasnya BAZNAS Kota Bogor memegang nilai-nilai: Takwa, Humanis, Profesional, Transparan, Egaliter, Akhlaqul Karimah.   
                            <br><br>
                            <ul style="list-style-type: square !important;margin-left:20px;">
                                <li><b style="font-weight:bold;">Takwa</b>: semua hal yang dilakukan BAZNAS dan amilnya adalah dalam rangka mengabdi kepada Allah dan akan mempertanggungjawabkan-nya kepada Allah</li>
                                <li><b style="font-weight:bold;">Humanis</b>: Menempatkan muzakki dan mustahiq sebagai mitra yang harus mendapatkan pelayanan dengan penuh keramahan.</li>
                                <li><b style="font-weight:bold;">Profesional</b>: Berdedikasi menjadi profesi amilin sebagai pekerjaan yang pertama dan utama diatas aktivitas yang lain.</li>
                                <li><b style="font-weight:bold;">Transparan</b>: Melayani dengan penuh keterbukaan dalam tata kelola dan pengambilan keputusan.</li>
                                <li><b style="font-weight:bold;">Egaliter</b>: Mengembangkan hubungan internal yang setara dibangun atas kesadaran bahwa seluruh bagian penting bagi pelayanan muzakki dan mustahiq.</li>
                                <li><b style="font-weight:bold;">Akhlaqul Karimah</b>: Mengedepankan akhlak dalam melayani muzakki, mustahiq dan membangun hubungan sesama.</li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
			</div> --}}

			<div class="i-gsc-column col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="video-inner">
					{{-- <div class="image">
						<img src="{{asset('depan')}}/images/bg-video.jpg" alt="">
					</div> --}}
					<div class="video-body text-center">
						{{-- <a href="https://www.youtube.com/watch?v=4g7zRxRN1Xk" class="popup-video gsc-video-link">
							<i class="fa icon-play" aria-hidden="true"></i>
                        </a> --}}
                            @php
                                $video=App\Models\Video::where('flag','=',1)->first();
                            @endphp
                             @if (!$video)
                                <center>Data Video Masih Belum Tersedia

                                    <div class="divisor_line"></div>
                                </center>
                            @else
                                @php
                                    if(strpos($video->url,'youtube')!==false)
                                    {
                                        $url = $video->url;
                                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                        $id = $matches[1];
                                        $width = '50%';
                                        $height = '400';
                                        $v='<iframe id="ytplayer" type="text/html" width="'.$width.'" height="'.$height.'"
                                            src="https://www.youtube.com/embed/'.$id.'?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                            frameborder="0" allowfullscreen style="padding:5px;border:1px solid #eee;"></iframe> ';
                                        
                                        echo $v;
                                    }
                                
                                @endphp
                            @endif   
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="campaigns">
	<div class="container">
		<div class="row">
			<div class="title">
				<h3>Program Baznas Kota Bogor.</h3>
				{{-- <p>Children are waiting for your help...</p> --}}
			</div>
			<div id="sync1" class="owl-carousel owl-theme">
                @foreach ($program as $item)
                    
                    <div class="item">
                        <div class="z">
                            <div class="img">
                                <div class="img-1 text-center">
                                    <img src="{{asset('images/logo/ZAKAT-BAZNAS.png')}}" alt="" style="width:50%;margin-top:40px;">
                                </div>
                                
                            </div>
                            <div class="ct">
                                <div class="text_show">
                                    <h3 class="text-center"><a href="{{url('program-baznas/'.str_slug($item->nama_program))}}">{{strtoupper($item->nama_program)}}</a></h3>
                                    <p></p>
                                </div>
                                <div class="donate">
                                    <div class="button_donate pull-right">
                                        <a href="{{url('program-baznas/'.str_slug($item->nama_program))}}">Selengkapnya</a>
                                    </div>
                                    
                                </div>
                                <div class="raised">
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
				{{-- <div class="item">
					<div class="z">
						<div class="img">
							<div class="img-1">
								<img src="{{asset('depan')}}/images/img_02.jpg" alt="">
							</div>
							<div class="img-2">
								<img src="{{asset('depan')}}/images/95_camp.png" alt="">
							</div>
						</div>
						<div class="ct">
							<div class="text_show">
								<h3><a href="../campaigns/campaigns-detail.html">Education for the Children</a></h3>
								<p>Maecenas sed diam eget risus varius blandi amet non magna ullamcorper nulaon...</p>
							</div>
							<div class="donate">
								<div class="button_donate">
									<a href="#">Donate Now</a>
								</div>
								<p>57 Day left</p>
							</div>
							<div class="raised">
								<p><span>$32,583</span> Raised of <b>$4879</b> Goal</p>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="z">
						<div class="img">
							<div class="img-1">
								<img src="{{asset('depan')}}/images/img_01.jpg" alt="">
							</div>
							<div class="img-2">
								<img src="{{asset('depan')}}/images/95_camp.png" alt="">
							</div>
						</div>
						<div class="ct">
							<div class="text_show">
								<h3><a href="../campaigns/campaigns-detail.html">Vocational training</a></h3>
								<p>Maecenas sed diam eget risus varius blandi amet non magna ullamcorper nulaon...</p>
							</div>
							<div class="donate">
								<div class="button_donate">
									<a href="#">Donate Now</a>
								</div>
								<p>57 Day left</p>
							</div>
							<div class="raised">
								<p><span>$45,583</span> Raised of <b>$78,324</b> Goal</p>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="z">
						<div class="img">
							<div class="img-1">
								<img src="{{asset('depan')}}/images/img_03.jpg" alt="">
							</div>
							<div class="img-2">
								<img src="{{asset('depan')}}/images/95_camp.png" alt="">
							</div>
						</div>
						<div class="ct">
							<div class="text_show">
								<h3><a href="../campaigns/campaigns-detail.html">Vocational training</a></h3>
								<p>Maecenas sed diam eget risus varius blandi amet non magna ullamcorper nulaon...</p>
							</div>
							<div class="donate">
								<div class="button_donate">
									<a href="#">Donate Now</a>
								</div>
								<p>57 Day left</p>
							</div>
							<div class="raised">
								<p><span>$45,583</span> Raised of <b>$78,324</b> Goal</p>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="z">
						<div class="img">
							<div class="img-1">
								<img src="{{asset('depan')}}/images/img_01.jpg" alt="">
							</div>
							<div class="img-2">
								<img src="{{asset('depan')}}/images/95_camp.png" alt="">
							</div>
						</div>
						<div class="ct">
							<div class="text_show">
								<h3><a href="../campaigns/campaigns-detail.html">Vocational training</a></h3>
								<p>Maecenas sed diam eget risus varius blandi amet non magna ullamcorper nulaon...</p>
							</div>
							<div class="donate">
								<div class="button_donate">
									<a href="#">Donate Now</a>
								</div>
								<p>57 Day left</p>
							</div>
							<div class="raised">
								<p><span>$45,583</span> Raised of <b>$78,324</b> Goal</p>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="z">
						<div class="img">
							<div class="img-1">
								<img src="{{asset('depan')}}/images/img_01.jpg" alt="">
							</div>
							<div class="img-2">
								<img src="{{asset('depan')}}/images/95_camp.png" alt="">
							</div>
						</div>
						<div class="ct">
							<div class="text_show">
								<h3><a href="../campaigns/campaigns-detail.html">Vocational training</a></h3>
								<p>Maecenas sed diam eget risus varius blandi amet non magna ullamcorper nulaon...</p>
							</div>
							<div class="donate">
								<div class="button_donate">
									<a href="#">Donate Now</a>
								</div>
								<p>57 Day left</p>
							</div>
							<div class="raised">
								<p><span>$45,583</span> Raised of <b>$78,324</b> Goal</p>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
</div>
{{-- <div class="recent stories">
	<div class="container">
		<div class="row">
			<div class="title">
			<h3>Stories of Philanthropy</h3>
		</div>
		<div class="left col-md-6 col-sm-12 col-xs-12">
				<img src="{{asset('depan')}}/images/stories_img_01.jpg" alt="">
				<a href="#">Life Style</a>
				<p>Server-Side Rendering</p>
			</div>
			<div class="right col-md-6 col-sm-12 col-xs-12">
				<div class="row">
					<div class="item col-md-12 col-sm-4 col-xs-12">
						<div class="row">
							<div class="img col-md-5">
								<img src="{{asset('depan')}}/images/stories_img_02.jpg" alt="">
							</div>
							<div class="txt col-md-7">
								<a href="#">Food</a>
								<p>Coffeeshops continue to conquer</p>
							</div>
						</div>
					</div>
					<div class="item col-md-12 col-sm-4 col-xs-12">
						<div class="row">
							<div class="img col-md-5">
								<img src="{{asset('depan')}}/images/stories_img_03.jpg" alt="">
							</div>
							<div class="txt col-md-7">
								<a href="#">Sport</a>
								<p>Country big concert report</p>
							</div>
						</div>
					</div>
					<div class="item col-md-12 col-sm-4 col-xs-12">
						<div class="row">
							<div class="img col-md-5">
								<img src="{{asset('depan')}}/images/stories_img_04.jpg" alt="">
							</div>
							<div class="txt col-md-7">
								<a href="#">Food</a>
								<p>How the future could resemble</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> --}}
<div class="new yellow">
    
	<div id="sync11" class="owl-carousel owl-theme">
        @php
            $berita=\App\Models\Berita::where('flag',1)->with('cat_berita')->orderBy('created_at','desc')->limit(5)->get();
        @endphp
        @foreach ($berita as $item)
            
            <div class="item">
                <div class="bg_full" style="background-image: url('{{asset($item->file)}}');">
                </div>
                <div class="content_box">
                    <div class="content-inner">
                        <div style="padding-left:4px;font-family: Roboto slab;color:white;margin-bottom:10px;"> 
                            <span style="color:white;"><i class="fa fa-calendar"></i> </span>&nbsp;  
                            {{tgl_indo($item->created_at)}}
                            &nbsp;&nbsp;&nbsp;
                            <span style="color:white;"><i class="fa fa-tag"></i> </span>  &nbsp;
                            {{$item->cat_berita->nama_kategori}}
                        </div>
                        
                        <div class="title">
                            <a href="{{url('publikasi/'.str_slug($item->cat_berita->nama_kategori).'/'.str_slug($item->title))}}" style="font-family: Roboto slab;">{{$item->title}}</a>
                        </div>
                        <div class="desc">
                            {{str_replace('&nbsp;',' ',substr(strip_tags($item->desc),0,250))}}&nbsp;&nbsp;[...]
                        </div>
                        <div class="donate">
                            <div class="button_donate">
                                <a href="{{url('publikasi/'.str_slug($item->cat_berita->nama_kategori).'/'.str_slug($item->title))}}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
		
	</div>
</div>


<div class="meet">
	<div class="container">
		<div class="row">
			<div class="title">
				<h3>Galeri <b>Kegiatan</b></h3>
			</div>
			<div id="sync2" class="owl-carousel owl-theme">
                @php
                    $galeri=\App\Models\Gallery::where('flag',1)->orderByRaw('RAND()')->limit(6)->get();
                @endphp
                @foreach ($galeri as $item)
                    
                    <div class="item">
                        <div class="img">
                            <img src="{{asset($item->picture)}}" alt="" style="height:150px;">
                        </div>
                        <div class="text_show">
                            <h3><a href="#">{{$item->title}}</a></h3>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</div>
</div>
<div class="campaigns">
	<div class="container">
		<div class="row">
			<div class="title">
				<h3>Statistik Tahun <b>{{ date('Y') }}</b></h3>
			</div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <article class="post clearfix maxwidth600 mb-30" style="display: block;">
              <div class="entry-header">
                <div class="entry-meta meta-absolute text-center p-15">
                <div class="display-table">
                </div>
                </div>
              </div>
              <div class="entry-content border-1px text-center">
                <h4 class="text-theme-colored entry-title mt-10"><b>MUZAKI</b></h4>
				<hr>
				@php
					$muzzaki=penyebut( isset($jlh_muzzaki[date('Y')]) ? $jlh_muzzaki[date('Y')] : 0 );
				@endphp
                <span style="font-size: 50px; font-weight: bold;" class="text-theme-colored">{{ $muzzaki['nilai'] }}</span><span style="font-size: 20px" class="text-theme-colored"> {{ $muzzaki['satuan'] }}</span>
                <p class="mb-10 font-13"><small>&nbsp;</small></p>
                <div class="clearfix"></div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <article class="post clearfix maxwidth600 mb-30" style="display: block;">
              <div class="entry-header">
                <div class="entry-meta meta-absolute text-center p-15">
                <div class="display-table">
                </div>
                </div>
              </div>
              <div class="entry-content border-1px text-center">
                <h4 class="text-center text-theme-colored entry-title mt-10"><b>PENGHIMPUNAN</b></h4>
				<hr>
				@php
					$penghimpun=penyebut( isset($jlh_penghimpunan[date('Y')]) ? $jlh_penghimpunan[date('Y')] : 0 );
				@endphp
                <span style="font-size: 50px; font-weight: bold;" class="text-theme-colored">{{ $penghimpun['nilai'] }}</span><span style="font-size: 20px" class="text-theme-colored"> {{ $penghimpun['satuan'] }}</span>
                <p class="text-center mb-10 font-13"><small>&nbsp;</small></p>
                <div class="clearfix"></div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <article class="post clearfix maxwidth600 mb-30" style="display: block;">
              <div class="entry-header">
                <div class="entry-meta meta-absolute text-center p-15">
                <div class="display-table">
                </div>
                </div>
              </div>
              <div class="entry-content border-1px text-center">
                <h4 class="text-center text-theme-colored entry-title mt-10"><b>PENYALURAN</b></h4>
				<hr>
				@php
					$penyaluran=penyebut( isset($jlh_penyaluran[date('Y')]) ? $jlh_penyaluran[date('Y')] : 0 );
				@endphp
                <span style="font-size: 50px; font-weight: bold;" class="text-theme-colored">{{ $penyaluran['nilai'] }}</span><span style="font-size: 20px" class="text-theme-colored"> {{ $penyaluran['satuan'] }}</span>
                <p class="text-center mb-10 font-13"><small>&nbsp;</small></p>
                <div class="clearfix"></div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <article class="post clearfix maxwidth600 mb-10">
              <div class="entry-header">
                <div class="entry-meta meta-absolute text-center p-15">
                <div class="display-table">
                </div>
                </div>
              </div>
              <div class="entry-content border-1px text-center">
                <h4 class="text-center text-theme-colored entry-title mt-10"><b>MUSTAHIK</b></h4>
				<hr>
				@php
					$mustahik=penyebut( isset($jlh_mustahik[date('Y')]) ? $jlh_mustahik[date('Y')] : 0 );
				@endphp
                <span style="font-size: 50px; font-weight: bold;" class="text-theme-colored">{{ $mustahik['nilai'] }}</span><span style="font-size: 20px" class="text-theme-colored"> {{ $mustahik['satuan'] }}</span>
                <p class="text-center mb-10 font-13"><small>&nbsp;</small></p>
                <div class="clearfix"></div>
              </div>
            </article>
          </div>
        </div>
	
    </div>
</div>
        
<style>
    .panel-success>.panel-heading
    {
        background-color:#60AF5E !important;
        color:#fff !important;
        font-family: Roboto !important;
        font-size:13px;
        text-align: justify;
    }
    .panel-body
    {
        font-family: Roboto !important;
        line-height: 23px;
        font-size:13px;
	}
	.mb-30 {
		margin-bottom: 30px!important;
	}
	.post{
		border:2px solid #1db3e7!important;
		padding:10px 0px;
		background-color: #fff!important;
	}
	.post .entry-header {
		position: relative;
		
	}
	.post .entry-meta.meta-absolute{
		background-color: #1db3e7!important;
	}
	.display-table {
		display: table;
		height: 100%;
		position: relative;
		width: 100%;
		z-index: 1;
	}
	.entry-content{
		font-family: Roboto slab !important;
		
	}
	
	.entry-content hr{
		border:1px solid  #1db3e7!important;
	}
</style>