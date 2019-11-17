@extends('layouts.depan')

@section('title')
    Konfirmasi Donasi Online
@endsection

@section('konten')

    <div class="bg_full_cp">
        <div class="bg_full" style="background: #22B662 url('{{asset('asset/img/world-map.png')}}'); background-repeat: no-repeat; background-position: center center;">
            <div class="container">
                <div class="ct">
                    <h2 class="page_title">
                        <span>Layanan</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="who-about list_posts">
        <div class="container">
            <div class="row">
                <div class="about_left col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="content-inner">
                        <div class="content">
                            <div class="desc">
                                <h2 class="title">Konfirmasi Donasi Online</h2>
                                <hr>
                                <br>
                                <h2 style="">Menunggu Konfirmasi {{isset($zakatonline->jenis_donasi) ? $zakatonline->jenis_donasi:'Donasi'}}</h2>
                                <br>
                                @if(Session::has('pesan'))
                                    <div class="alert alert-success" style="width:100%;">
                                    <strong>Success!</strong> 
                                        {!! Session::get('pesan') !!} 
                                    </div>
                                @endif
                                <p >
                                    <div style="font-size:15px !important;">
                                    Terima kasih telah melakukan donasi melalui portal donasi online BAZNAS Kota Bogor.
                                    <br>
                                    Berikut adalah resume donasi {{($zakatonline ? $zakatonline->nama_lengkap : '')}}:
                                    </div>
                                    <br>
                                    <table border="0" style="margin-left:50px;">
                                        <tr>
                                            <td style="width: 150px;">No. Referensi</td>
                                            <td style="width:10px;">:</td>
                                            <td>{{$zakatonline ? $zakatonline->reference : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px;">Tanggal Donasi</td>
                                            <td style="width:10px;">:</td>
                                            <td>{{$zakatonline ? tgl_indo_time($zakatonline->tanggal_donasi) : ''}}</td>
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
                                        <tr>
                                            <td style="width: 150px;">Kode Virtual Account</td>
                                            <td style="width:10px;">:</td>
                                            <td>{{$zakatonline ? ($zakatonline->noVA): ''}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px;">Status Donasi</td>
                                            <td style="width:10px;">:</td>
                                            <td>{{$zakatonline ? ($zakatonline->status_donasi=='01' ? 'Pending/Menunggu Pembayaran' : ($zakatonline->status_donasi=='00'? 'Berhasil':'Gagal')): ''}}</td>
                                        </tr>
                                    </table>    
                                    <br>
                                    <br>
                                    <div style="border:1px solid #888;padding:5px 20px;background:#eee">
                                        <h3>Berikut Cara Melakukan Pembayaran :</h3>
                                    </div>
                                    <div style="border:1px solid #888;padding:20px;border-top:0px">
                                        
                                        {{-- @if (isset($zakatonline)) --}}
                                            {{-- @if ($zakatonline->metode_payment=='I1') --}}
                                                <div onclick="showbayar('bayar_1')" style="cursor:pointer;font-weight:600">
                                                    <img src="{{asset('images/logo/logo-bni.png')}}" style="float:left;height:14px;width:auto;margin-top:7px;margin-right:10px;">
                                                    Melalui Transfer ATM</div>
                                                <div id="bayar_1" style="">
                                                    <ol>
                                                        <li>Pilih Menu Lain > Transfer</li>
                                                        <li>Pilih rekening asal dan pilih rekening tujuan ke rekening BNI</li>
                                                        <li>Masukkan nomor rekening dengan nomor Virtual Account Anda (contoh: {{$zakatonline ? ($zakatonline->noVA): '8228002000100253'}}) dan pilih Benar</li>
                                                        <li>Masukkan jumlah pembayaran sejumlah tagihan Anda dan pilih Benar</li>
                                                        <li>Periksa data di layar. Pastikan Nama adalah nama penerima Anda dan Total Tagihan benar. Apabila data sudah benar, pilih Ya</li>
                                                    </ol>
                                                </div>
                                                <br>
                                                <div onclick="showbayar('bayar_2')" style="cursor:pointer;font-weight:600">
                                                    <img src="{{asset('images/logo/logo-bni.png')}}" style="float:left;height:14px;width:auto;margin-top:7px;margin-right:10px;">
                                                    Melalui Transfer iBanking</div>
                                                <div id="bayar_2" style="display:none">
                                                    <ol>
                                                        <li>Pilih Transaksi > Info & Administrasi Transfer > Atur Rekening Tujuan > Tambah Rekening Tujuan dan klik OK</li>
                                                        <li>Pilih Kode Network & Bank : Transfer Andtar Rek. BNI. Masukkan nomor rekening dengan nomor Virtual Account Anda (contoh: {{$zakatonline ? ($zakatonline->noVA): '8228002000100253'}}) dan klik Lanjut. Isi data lainnya dan klik Lanjutkan</li>
                                                        <li>Cek detail konfirmasi. Pastikan Nama adalah nama penerima Anda – DomaiNesia. Masukkan PIN BNI e-Secure Anda lalu klik Proses</li>
                                                        <li>Pilih Transasi > Transfer > Transfer Antar Rek BNI</li>
                                                        <li>Pilih Rekening Tujuan sebagai rekening yang barusan disimpan. Masukkan jumlah pembayaran sejumlah tagihan Anda. Lalu, klik Lanjutkan</li>
                                                        <li>Periksa detail konfirmasi. Pastikan Nama Rekening Tujuan adalah nama penerima dan nominal transfer sudah benar. Masukkan PIN BNI e-Secure Anda dan Klik Proses</li>
                                                    </ol>
                                                </div>
                                                <br>
                                                <div onclick="showbayar('bayar_3')" style="cursor:pointer;font-weight:600">
                                                    <img src="{{asset('images/logo/logo-bni.png')}}" style="float:left;height:14px;width:auto;margin-top:7px;margin-right:10px;">
                                                    Melalui Transfer mBanking</div>
                                                <div id="bayar_3" style="display:none">
                                                    <ol>
                                                        <li>Pilih Transfer > Antar Rekening BNI</li>
                                                        <li>Pilih Rekening Tujuan > Input Rekening Baru. Masukkan nomor rekening dengan nomor Virtual Account Anda (contoh: {{$zakatonline ? ($zakatonline->noVA): '8228002000100253'}}) dan klik Lanjut, kemudian klik Lanjut lagi.</li>
                                                        <li>Masukkan jumlah pembayaran sejumlah tagihan Anda. Lalu, klik Lanjutkan</li>
                                                        <li>Periksa detail konfirmasi. Pastikan Nama Rekening Tujuan adalah nama penerima dan nominal transfer sudah benar. Jika benar, masukkan password transaksi dan klik Lanjut</li>
                                                        <li>Melalui Transfer SMS Banking</li>
                                                        <li>Kirim SMS “TRF [SPASI] nomor Virtual Account Anda [SPASI] Nominal Transaksi” tanpa tanda petik (Contoh: TRF {{$zakatonline ? ($zakatonline->noVA): '8228002000100253'}} 129000) kirim ke 3346</li>
                                                        <li>Balas SMS yang masuk mengikuti petunjuk    </li>
                                                    </ol>
                                                </div>
                                                <br>
                                            {{-- @endif
                                        @endif --}}
                                        <div onclick="showbayar('bayar_11')" style="cursor:pointer;font-weight:600">
                                            <img src="{{asset('images/logo/logo-atmbersama.png')}}" style="float:left;height:14px;width:auto;margin-top:7px;margin-right:10px;">
                                            Cara Pembayaran lewat Jaringan ATM Bersama:</div>
                                        <div id="bayar_11" style="display:none">
                                            <ol> 
                                                <li>Pada Menu utama, pilih Transaksi Lainnya. </li>
                                                <li>Pilih Transfer.</li>
                                                <li>Pilih Antar Bank Online. </li>
                                                <li>Masukkan nomor 009 {{$zakatonline ? ($zakatonline->noVA): '8228002000100253'}} (kode 009 dan kode Virtual account). </li>
                                                <li>Masukkan jumlah tagihan yang akan Anda bayar secara lengkap. Pembayaran dengan jumlah yang tidak sesuai akan otomatis ditolak. </li>
                                                <li>Pada halaman konfirmasi transfer akan muncul jumlah yang dibayarkan & nomor rekening tujuan. Jika informasinya telah sesuai tekan tombol Benar. </li>
                                            </ol>
                                        </div>
                                        <br>
                                        <div onclick="showbayar('bayar_12')" style="cursor:pointer;font-weight:600">
                                            <img src="{{asset('images/logo/logo-prima.png')}}" style="float:left;height:14px;width:auto;margin-top:7px;margin-right:10px;">
                                            Cara Pembayaran lewat Jaringan ATM PRIMA: </div>
                                        <div id="bayar_12" style="display:none">
                                            <ol>
                                                <li>Pada Menu utama, Pilih Transaksi Lainnya. </li>
                                                <li>Pilih Transfer. </li>
                                                <li>Pilih Ke Rek Bank Lain. </li>
                                                <li>Masukkan kode 009 untuk BNI lalu tekan Benar. </li>
                                                <li>Masukkan jumlah tagihan yang akan Anda bayar secara lengkap. Pembayaran dengan jumlah yang tidak sesuai akan otomatis ditolak. </li>
                                                <li>Masukkan {{$zakatonline ? ($zakatonline->noVA): '8228002000100253'}} (kode virtual account pembayaran) lalu tekan Benar. </li>
                                                <li>Pada halaman konfirmasi transfer akan muncul jumlah yang dibayarkan & nomor rekening tujuan. Jika informasinya telah sesuai tekan Benar. </li>
                                            </ol>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="sidebar-right sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="sidebar-inner">
                        <div>
                            <div class="categories">
                                <h2 class="block-title">
                                    <span>Program Lainnya</span>
                                </h2>
                                <div class="content block-content">
                                    <ul>
                                        @php
                                            $program=\App\Models\Program::where('flag',1)->orderBy('nama_program')->get();
                                        @endphp
                                        @foreach ($program as $item)
                                            <li><a href="{{url('program-baznas/'.str_slug($item->nama_program))}}">{{$item->nama_program}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footscript')

    <script>
    $(document).ready(function(){
        $('body').addClass('page_about pages_item page_list_posts');
    });
    function showbayar(div)
    {

        $('#'+div).css('display','block');
    }
    </script>
    <style>
        .desc
        {
            text-align:justify;
            font-family: "Roboto Slab",sans-serif;
            line-height: 23px;
            font-size:12px;
        }
        .desc h2{
            font-family: "Roboto Slab",sans-serif;
            font-weight: normal;
            line-height: 31px;
            color: #000;
            text-transform: capitalize;
            font-size: 34px;
        }
        .desc ol, .desc ul
        {
            margin-left:50px !important;
            
        }
        .desc ol li, .desc ul li
        {
            font-family: Roboto !important;
            font-weight: 300 !important;
            font-size: 15px;
            font-family: "Roboto",sans-serif;
            line-height: 28px;
        }
        .pages_item .main_menu .menu > li > a
        {
            color:#000 !important;
        }
    </style>
@endsection