@extends('layouts.front')
@section('title')
    <title>{{$program[$slug]->nama_program}} : Badan Amil Zakat (BAZNAS) Kota Bogor</title>
@endsection
@section('main')
            <div class="main_title simple_sections">
                <div class="main_name fadeInDown animated delay1">
                    <div class="container">
                        <div class="row">
                            @include('include.menu')
                        </div>
                    </div>
                </div>
            
                <div class="done_info sections fadeInUp animated delay2">
                    <div class="container">
                        <div class="row">
                            @include('include.head')
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">

              <div class="col-md-8">
                <div id="data">
                  <div class="blog post_blog">

                    <ul class="rslides blog_slider">
                        {{-- <li class="border_img"><img src="{{($program[$slug]->pic !='' ? asset($program[$slug]->pic): asset('asset/bogor-kahiji-kecil.png'))}}" alt="image-candidate"></li> --}}
                        
                    </ul> 
                    <h3>{{$program[$slug]->nama_program}}</h3>
                    <p> <span style="color:blue"><i class="fa fa-calendar"></i> </span>  
                        Dipublikasikan : {{date('d',strtotime($program[$slug]->created_at))}} {{getBulan(date('m',strtotime($program[$slug]->created_at)))}} {{date('Y',strtotime($program[$slug]->created_at))}}
                        &nbsp;&nbsp;
                        {{date('H:i',strtotime($program[$slug]->created_at))}}
                    </p>
                    {!!$program[$slug]->desc!!}
                    <div class="divisor_line"></div>

                    <!--Comments-->
                    
                   
                    </div>
                </div>
              </div>

              <div class="col-md-4">
              <aside>
                    
                <h3>Program Lainnya :</h3>
                    @php
                        $programlain=App\Models\Program::where('id','!=',$program[$slug]->id)->orderByRaw('RAND(),created_at desc')->limit(5)->get();
                    @endphp
                    @foreach ($programlain as $item)
                        <a href="{{url('program-baznas',str_slug($item->nama_program))}}">
                        <blockquote style="margin-bottom:4px !important;border-bottom:1px solid #eee;">
                            <p>{{$item->nama_program}}</p>
                        </blockquote></a>
                    @endforeach
                    

              <div class="divisor_line"></div>
              
                
                <!--Video-->
                <h3>Video</h3>
                @php
                    $vid=App\Models\Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
                    if($vid)
                    {
                        if(strpos($vid->url,'youtube')!==false)
                        {
                            $url = $vid->url;
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $id = $matches[1];
                            $width = '100%';
                            $height = '200px';
                            $video='<iframe id="ytplayer" type="text/html" width="'.$width.'" height="'.$height.'"
                                src="https://www.youtube.com/embed/'.$id.'?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                frameborder="0" allowfullscreen></iframe> ';
                        }
                        else
                            $video='Video Belum Tersedia';
                        }
                        else
                            $video='Video Belum Tersedia';

                        echo $video;
                    @endphp
                <!--Video-->
             <div class="divisor_line"></div>
               
                        <h3>Testimoni</h3>
                
                        @if ($testi->count()==0)
                            Data Testimoni Masih Belum Tersedia
                            <div class="divisor_line"></div>
                        @else
                            @foreach ($testi as $item)
                            <blockquote>
                                <p>{{strip_tags($item->desc)}}</p>
                                <span>{{$item->nama}}, {{$item->jabatan.' '.$item->perusahaan}}</span>
                            </blockquote>
                            <div class="divisor_line"></div>
                            @endforeach
                        @endif
              </aside>
              </div>
            </div>           
    </div>       
@endsection
