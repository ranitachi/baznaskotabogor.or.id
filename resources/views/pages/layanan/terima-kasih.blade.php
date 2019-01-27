@extends('layouts.front')
@section('title')
    <title>Terima Kasih : Badan Amil Zakat (BAZNAS) Kota Bogor</title>
@endsection
@section('main')
    <section class="main">
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
    </section>
@endsection
@section('content')
    <div class="container">
        <div class="row">

              <div class="col-md-8">
               
                
                <div id="data">
                    <h2 style="">Terima Kasih Atas Donasi nya</h2>
                    <br>
                     @if(Session::has('pesan'))
                        <div class="alert alert-success" style="width:100%;">
                        <strong>Success!</strong> 
                            {!! Session::get('pesan') !!} 
                        </div>
                    @endif
                    
                </div>
              </div>

              <div class="col-md-4">
              <aside>
              
               
                <h3>Layanan Lain</h3>
                    <a href="{{url('layanan/konsultasi-zakat')}}">
                    <blockquote style="margin-bottom:4px !important;border-bottom:1px solid #eee;">
                        <p>Konsultasi Zakat</p>
                    </blockquote></a>
                    <a href="{{url('layanan/konfirmasi-zakat')}}">
                        <blockquote style="margin-bottom:4px !important;border-bottom:1px solid #eee;">
                        <p>Konfirmasi Zakat</p>
                    </blockquote></a>
                    <a href="{{url('layanan/jemput-zakat')}}">
                        <blockquote style="margin-bottom:4px !important;border-bottom:1px solid #eee;">
                        <p>Jemput Zakat</p>
                    </blockquote></a>
                    <a href="{{url('layanan/rekening-zakat')}}">
                        <blockquote style="margin-bottom:4px !important;border-bottom:1px solid #eee;">
                        <p>Rekening Zakat</p>
                    </blockquote></a>
                    <a href="{{url('layanan/kalkulator-zakat')}}">
                        <blockquote style="margin-bottom:4px !important;border-bottom:1px solid #eee;">
                        <p>Kalkulator Zakat</p>
                    </blockquote></a>
                
                <!--Video-->
                
              <div class="divisor_line"></div>
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

                <!--Accordion-->
                <h3>Testimoni</h3>
                @if (count($testi)==0)
                    Data Testimoni Masih Belum Tersedia
                @else
                    @foreach ($testi as $item)
                        <blockquote>
                        {!!$item->desc!!}
                        <span>{{$item->nama}}, {{$item->jabatan}} - {{$item->perusahaan}}</span>
                        </blockquote>
                    @endforeach
                @endif

             
                  <!--Accordion-->

              </aside>
              </div>
            </div>           
    </div>       
@endsection