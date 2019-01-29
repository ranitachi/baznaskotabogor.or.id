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
                    
                     @if(Session::has('pesan'))
                        <div class="alert alert-success" style="width:100%;">
                        <strong>Success!</strong> 
                            {!! Session::get('pesan') !!} 
                        </div>
                    @endif
                    <h2 style="">Terima Kasih Atas Donasi Yang Anda Salurkan</h2>
                    <br>
                        <div style="border:1px solid #888;padding:5px 20px;background:#eee">
                            <h3>Rincian Donasi :</h3>
                        </div>
                        <div style="border:1px solid #888;padding:20px;border-top:0px">
                            <table border="0" style="margin-left:20px;">
                                <tr>
                                    <td style="width: 150px;">Tanggal Donasi</td>
                                    <td style="width:10px;">:</td>
                                    <td>{{$zakatonline ? tgl_indo_time($zakatonline->tanggal_donasi) : ''}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">No. Referensi</td>
                                    <td style="width:10px;">:</td>
                                    <td>{{$zakatonline ? $zakatonline->reference : ''}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Jenis Donasi</td>
                                    <td style="width:10px;">:</td>
                                    <td>{{$zakatonline ? $zakatonline->jenis_donasi : ''}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Jumlah Donasi</td>
                                    <td style="width:10px;">:</td>
                                    <td>{{$zakatonline ? number_format($zakatonline->jlh_donasi,0,',','.'): ''}}</td>
                                </tr>
                                {{-- <tr>
                                    <td style="width: 150px;">Metode Donasi</td>
                                    <td style="width:10px;">:</td>
                                    <td>{{$zakatonline ? ($zakatonline->noVA): ''}}</td>
                                </tr> --}}
                                @if ($zakatonline)
                                    @if ($zakatonline->noVA!='')
                                        <tr>
                                            <td style="width: 150px;">Kode Virtual Account</td>
                                            <td style="width:10px;">:</td>
                                            <td>{{$zakatonline ? ($zakatonline->noVA): ''}}</td>
                                        </tr>
                                    @endif
                                @endif
                                <tr>
                                    <td style="width: 150px;">Status Donasi</td>
                                    <td style="width:10px;">:</td>
                                    <td>{{$zakatonline ? ($zakatonline->status_donasi=='01' ? 'Pending/Menunggu Pembayaran' : ($zakatonline->status_donasi=='00'? 'Berhasil':'Gagal')): ''}}</td>
                                </tr>
                            </table>  
                        </div>
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