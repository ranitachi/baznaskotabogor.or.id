 <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <!-- Tabs -->
                        <ul class="tabs"> 
                            <li><a href="#tab2">BERITA, ARTIKEL, & INFORMASI</a></li> 
                        </ul>

                        <!-- Tabs Container -->
                        <div class="tab_container">  
                             <!-- Tab 2 -->  
                            <div id="tab2" class="tab_content  topics top">

                                
                                <ul id="news_carrousel"> 
                                    <!--item news-->
                                    @php
                                        $berita=App\Models\Berita::where('flag','=',1)->with('cat_berita')->orderBy('created_at','desc')->limit(6)->get();
                                        $cat=App\Models\CatBerita::all();
                                        $kat=array();
                                        
                                        foreach($cat as $k => $v)
                                        {
                                            $kat[$v->id]=strtolower($v->nama_kategori);
                                        }
                                        // echo '<pre>';
                                        // print_r($kat);
                                        // echo '</pre>';
                                    @endphp
                                     @if ($berita->count()==0)
                                        Data Publikasi Masih Belum Tersedia
                                        <div class="divisor_line"></div>
                                    @else
                                        @foreach ($berita as $item)
                                        @php
                                            $kategori='';
                                            if(isset($kat[$item->id_kategori]))
                                            {
                                                $kt=$kat[$item->id_kategori];
                                                $kategori=$kt;
                                            }
                                        @endphp
                                        <li class="item_news">                        
                                            <ul class="rslides news_slider">
                                                <li class="border_img">
                                                @if ($item->file=='')
                                                    <img src="{{asset('asset/img/slide_01.jpg')}}" alt="image-candidate"></li>
                                                @else
                                                    <img src="{{asset($item->file)}}" alt="image-candidate"></li>   
                                                @endif
                                            </ul> 
                                            <h3>{{$item->title}}</h3>
                                        <p>{{substr(strip_tags($item->desc),0,300)}}[..]</p>
                                            <a class="button_url" href="{{url('publikasi/'.str_slug($item->cat_berita->nama_kategori).'/'.str_slug($item->title))}}"> Selengkapnya</a>
                                        </li>
                                        @endforeach
                                    <!--item news-->
                                    @endif
                                                                                
                                </ul>
                                @if ($berita->count()<=2)
                                    <style>
                                        .owl-item{
                                            width:380px !important;
                                        }
                                    </style>
                                @endif
                            </div>   
                            <!-- Tab 2 --> 
                            <!-- Tab 1 -->     
                            </div>
                            <!--Tab 1-->

                           
                            
                        </div>
                        <!-- Tabs Container -->
                </div>
            <div class="sep">       
                  <span class="star"><img src="{{asset('images/logo/ZAKAT-BAZNAS.png')}}" alt="star" style="margin-left:13px;margin-top:-10px;"></span>
                  <span class="rule-l">&nbsp;</span>
                  <span class="rule-r">&nbsp;</span>        
                </div>
                <div class="row">
                <div class="col-md-12">
                        <!-- carrousel-->
                        <h2 class="text-center" style="padding-left: 13px;">GALERI FOTO</h2>
                        <ul class="slides-carousel border_img" style="padding-left: 13px;">
                            @php
                                $galeri=App\Models\Gallery::where('flag','=',1)->orderByRaw('RAND()')->get();
                            @endphp
                             @if (count($galeri)==0)
                                <center>Data Galeri Masih Belum Tersedia

                                    <div class="divisor_line"></div>
                                </center>
                            @else
                                @foreach ($galeri as $item)
                                    <li>
                                        <img src="{{asset($item->picture)}}"  alt="" style="height:200px;"/>
                                        <a class="fancybox" title="" href="{{asset($item->picture)}}"></a>
                                    </li>                                
                                                                
                                @endforeach
                            @endif

                        </ul>
                        <!-- end carrousel-->
                    </div>
            </div>
            <!-- star divisor -->
                <div class="sep">       
                  <span class="star"><img src="{{asset('images/logo/ZAKAT-BAZNAS.png')}}" alt="star" style="margin-left:13px;margin-top:-10px;"></span>
                  <span class="rule-l">&nbsp;</span>
                  <span class="rule-r">&nbsp;</span>        
                </div>
                <!--end star divisor -->
                

                <!-- star divisor -->
                <div class="" style="padding-left:25px !important;">     
                    {{-- <h2 class="text-center" style="padding-left: 13px;">TENTANG BAZNAS KOTA BOGOR</h2> --}}
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-10 col-sm-10  text-left" style="opacity:1.0;position:relative;z-index:100000;text-align:center;font-size:20px !important;">
                        @php
                            $visimisi=\App\Models\ProfileCCIT::where('category','like','%visi%')->where('flag',1)->first();    
                            echo $visimisi->desc;
                        @endphp
                            {{-- <h2 class="text-center" style="padding-left: 13px;">VISI :</h2>
                            <h4 style=";font-size:15px;letter-spacing:1px;font-weight:normal" class="text-center">Bogor kota terbaik se-Indonesia dengan pemerintahan amanah dan masyarakat yang sejahtera</h4>
                            <br>
                            <br>
                            <h2 class="text-center" style="padding-left: 13px;">MISI :</h2>
                            <h4>
                                <ul style=";">
                                    <li style="font-size:15px;letter-spacing:1px;color:#000;font-weight:normal">Mewujudkan kota TERBAIK se-Indonesia yang beriman, prestatif dan membanggakan</li>
                                    <li style="font-size:15px;letter-spacing:1px;color:#000;font-weight:normal">Mewujudkan pemerintahan yang AMANAH yang memberikan layanan prima serta akses komunikasi yang mudah, kapan saja dan dimana saja</li>
                                    <li style="font-size:15px;letter-spacing:1px;color:#000;font-weight:normal">Mewujudkan kota yang NYAMAN melalui pengelolaan wilayah berbasis lingkungan yang berkelanjutan</li>
                                    <li style="font-size:15px;letter-spacing:1px;color:#000;font-weight:normal">Mewujudkan masyarakat SEJAHTERA melalui pembangunan sumber daya manusia dan ekonomi kreatif yang berkeadilan</li>
                                </ul>
                            </h4>
                        </div> --}}
                        <div class="col-md-1">&nbsp;</div>
                        {{--    --}}
                    </div>
                        {{-- <div class="row text-center" style="margin-top:30px;">
                            
                            <img class="logo-misi" src="{{asset('images/bogor-berbudaya.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-berkah.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-cerdas.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-digital.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-juara.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-kreatif.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-nyaman.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-peduli.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-sehat.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-tourism.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-traffic.png')}}">
                            
                        </div>  --}}
                    
                    
                </div>  
                <div class="row">
                    <div class="col-lg-12"></div>
                </div>
                <div class="sep">       
                  <span class="star"><img src="{{asset('images/logo/ZAKAT-BAZNAS.png')}}" alt="star" style="margin-left:13px;margin-top:-10px;"></span>
                  <span class="rule-l">&nbsp;</span>
                  <span class="rule-r">&nbsp;</span>        
                </div>
                <!-- end star divisor -->

               

                <div class="row top">

                    <!-- Services for our contry - Accordion -->
                    <div class="col-md-6 col-sm-6">
                        <h3>Program Unggulan</h3>

                        <div class="accordion-content">
                        @php
                            $program=App\Models\Program::where('flag','=',1)->get(); 
                        @endphp 
                         @if (count($program)==0)
                            Data Program Masih Belum Tersedia
                            <div class="divisor_line"></div>
                        @else
                        
                            @foreach ($program as $key => $value)
                        
                            <div class="accordion-trigger" style="width:100%;float:left;"><span>{{$value->nama_program}}</span></div>   
                                <div class="accordion-container border_img" style="width:100%;float:left;">
                                    <img src="{{asset($value->logo)}}" alt="image" style="width:100px;height:auto;float:left">
                                <p style="float:left;margin-left:20px;width:350px;">
                                    {{substr(strip_tags($value->desc),0,300)}}
                                </p>
                                <a href="{{url('program-baznas',str_slug($value->nama_program))}}" class="pull-right" style="float:left;width:100%;text-align:right"> Selengkapnya</a>
                            </div>
                            @endforeach
                        @endif    
                        </div>
                    </div>
                    <!-- end Services for our contry - Accordion -->

                    <!-- Testimonials -->
                    <div class="col-md-6 col-sm-6">

                        <h3>Testimonial</h3>

                        <ul class="testimonials border_img top">
                            
                        @php
                            $testi=App\Models\Testimony::orderByRaw('RAND()')->limit(4)->get();
                            $x=1;
                        @endphp

                         @if (count($testi)==0)
                            Data Testimoni Masih Belum Tersedia
                            <div class="divisor_line"></div>
                        @else
                            @php
                                foreach ($testi as $key => $value)
                                {
                                if($x==1)
                                {
                                    echo '<li>';
                                } 
                            @endphp 
                                    <div class="row"> 
                                        @if ($value->photo=='')
                                            <img src="{{asset('images/logo/ZAKAT-BAZNAS.png')}}" alt="image">
                                        @else
                                            <img src="{{asset($value->photo)}}" alt="image">
                                        @endif                                 
                                        <div class="testimonials_content">
                                        <h4>{{$value->nama}}  <span>{{$value->jabatan}} {{$value->perusahaan}}</span></h4>                  
                                            <p class="text-overflow">{{strip_tags($value->desc)}}</p>
                                        </div>
                                    </div> 
                                    @if ($x==1)
                                        <div class="divisor_line"></div>
                                    @endif

                            @php
                                if($x==2)
                                {
                                    echo '</li>';
                                    $x=0;
                                }
                                $x++;
                            }
                            @endphp
                        @endif
                        </ul>  
                    </div>
                    <!-- end Testimonials -->
                </div>
                <!-- star divisor -->
                <div class="sep">       
                  <span class="star"><img src="{{asset('images/logo/ZAKAT-BAZNAS.png')}}" alt="star" style="margin-left:13px;margin-top:-10px;"></span>
                  <span class="rule-l">&nbsp;</span>
                  <span class="rule-r">&nbsp;</span>        
                </div>
                <!--end star divisor -->
                <div class="row top">
                    
                    <h2 class="text-center" style="padding-left: 13px;">GALERI VIDEO</h2>
                    <div class="col-md-12">
                        <!-- carrousel-->
                        <ul class="slides-carousel border_img">
                            @php
                                $video=App\Models\Video::where('flag','=',1)->orderByRaw('RAND()')->limit(4)->get();
                            @endphp
                             @if (count($video)==0)
                                <center>Data Video Masih Belum Tersedia

                                    <div class="divisor_line"></div>
                                </center>
                            @else
                                @foreach ($video as $vid)
                                    <li >
                                    @php
                                        if(strpos($vid->url,'youtube')!==false)
                                        {
                                            $url = $vid->url;
                                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                            $id = $matches[1];
                                            $width = '100%';
                                            $height = '200';
                                            $v='<iframe id="ytplayer" type="text/html" width="'.$width.'" height="'.$height.'"
                                                src="https://www.youtube.com/embed/'.$id.'?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                                frameborder="0" allowfullscreen style="padding:5px;border:1px solid #eee;height:200px !important;"></iframe> ';
                                            
                                            echo $v;
                                        }
                                  
                                    @endphp     
                                    </li>                                
                                                                
                                @endforeach
                            @endif

                        </ul>
                        <!-- end carrousel-->
                    </div>
                </div>

                

              

            </div>
<style>
    .central_content iframe
    {
        height:350px !important;
    }
    iframe#ytplayer
    {
        height:160px !important;
    }
    .logo-misi
    {
        width:90px;
        margin:2px;
        height:auto;
        opacity:1.0;
        position:relative;
        z-index:100000;
    }
</style>