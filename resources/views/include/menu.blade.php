<div class="row">
                      
    <div class="col-md-4 col-sm-4">
        <a href="{{url('/')}}">
            <img src="{{asset('images/logo/logo_2.png')}}" class="logo" style="">
            <h1 style="font-family:'Open Sans';font-size:20px;color:darkslategrey;text-shadow:0px 0px 0px !important;">BAZNAS Kota Bogor</h1>
        </a>
    </div>

    <div class="col-md-8 col-sm-8">
        <a href="{{url('layanan/donasi-zakat')}}" style="color:#fff" class="donasi">
            <div style="background:red;float:left;padding:30px 10px;text-align:center;margin-top:1px;font-size:15px;border-radius:13px;">KLIK UNTUK BERDONASI</div>
        </a>
        <ul id="menu" class="sf-menu">
            
            <li><a href="#">Profil <i class="fa fa-angle-double-down"></i></a>
                <ul>
                    <li><a href="{{url('profil/sejarah')}}"><i class="fa fa-angle-right"></i>Sejarah BAZNAS</a></li>
                    <li><a href="{{url('profil/tentang')}}"><i class="fa fa-angle-right"></i>Tentang BAZNAS Kota Bogor</a></li> 
                    <li><a href="{{url('profil/visi-misi')}}"><i class="fa fa-angle-right"></i>Visi Misi BAZNAS Kota Bogor</a></li> 
                    <li><a href="{{url('profil/struktur-organisasi')}}"><i class="fa fa-angle-right"></i>Struktur Organisasi</a></li> 
                </ul>
            </li>
            <li><a href="{{url('program-baznas')}}">Program <i class="fa fa-angle-double-down"></i></a>
                <ul>
                    @php
                        $program=\App\Models\Program::where('flag',1)->get();
                    @endphp
                    @foreach ($program as $item)
                        <li><a href="{{url('program-baznas',str_slug($item->nama_program))}}"><i class="fa fa-angle-right"></i>{{$item->nama_program}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="#">Layanan <i class="fa fa-angle-double-down"></i></a>
                <ul>
                    <li><a href="{{url('layanan/donasi-zakat')}}"><i class="fa fa-angle-right"></i>Donasi Zakat Online</a></li>
                    <li><a href="{{url('layanan/konsultasi-zakat')}}"><i class="fa fa-angle-right"></i>Konsultasi Zakat</a></li>
                    <li><a href="{{url('layanan/konfirmasi-zakat')}}"><i class="fa fa-angle-right"></i>Konfirmasi Zakat</a></li> 
                    <li><a href="{{url('layanan/jemput-zakat')}}"><i class="fa fa-angle-right"></i>Jemput Zakat</a></li> 
                    <li><a href="{{url('layanan/kalkulator-zakat')}}"><i class="fa fa-angle-right"></i>Kalkulator Zakat</a></li> 
                    <li><a href="{{url('layanan/rekening-zakat')}}"><i class="fa fa-angle-right"></i>Rekening Zakat</a></li> 
                </ul>
            </li>
            <li><a href="#">Publikasi <i class="fa fa-angle-double-down"></i></a>
              <ul>   
                {{-- <li><a href="{{url('artikel')}}"><i class="fa fa-angle-right"></i> Artikel</a></li>
                <li><a href="{{url('berita')}}"><i class="fa fa-angle-right"></i> Berita</a></li>
                <li><a href="{{url('info-zakat')}}"><i class="fa fa-angle-right"></i> Info Seputar Zakat</a></li> --}}
                @php
                    $kategori=\App\Models\CatBerita::all();
                @endphp
                @foreach ($kategori as $item)
                    <li><a href="{{url('publikasi/'.str_slug($item->nama_kategori))}}"><i class="fa fa-angle-right"></i> {{$item->nama_kategori}}</a></li>
                @endforeach
                <li><a href="{{url('testimoni')}}"><i class="fa fa-angle-right"></i> Testimoni</a></li>
              </ul>
            </li> 

            <li><a href="#">Galeri <i class="fa fa-angle-double-down"></i></a>
              <ul>   
                <li><a href="{{url('dokumentasi/foto')}}"><i class="fa fa-angle-right"></i> Foto</a></li>
                <li><a href="{{url('dokumentasi/video')}}"><i class="fa fa-angle-right"></i> Video</a></li>
              </ul>
            </li>

            <li><a href="{{url('kontak-kami')}}">Kontak Kami</a></li> 
            
        </ul>
    </div>

</div>
<style>
.sf-menu > li
{
    padding-right: 2% !important;
}
.donasi:hover
{
    color:lightblue !important;
    text-decoration: underline;
    font-weight: 600
}

</style>