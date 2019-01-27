@extends('layouts.front')
@section('title')
    <title>{{ucwords($jenis)}} : Badan Amil Zakat (BAZNAS) Kota Bogor</title>
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
                    @if ($id=='rekening-zakat')
                        <h2 style="">Rekening Donasi Zakat dan Infak</h2>
                    @else
                        <h2 style="">{{ucwords($jenis)}}</h2>
                    @endif
                        <br>
                     @if(Session::has('pesan'))
                        <div class="alert alert-success" style="width:100%;">
                        <strong>Success!</strong> 
                            {!! Session::get('pesan') !!} 
                        </div>
                    @endif
                    @include('pages.layanan.data')
                </div>
              </div>

              <div class="col-md-4">
              <aside>
                <!--search-->
                {{--  <form role="search" method="get" id="searchform" class="searchform" action="#">
                  <div>
                    <input type="text" value="" name="search" id="search" placeholder="Cari Berita">
                    <input type="submit" class="button" id="searchsubmit" value="Search">
                  </div>
                </form>  --}}
                <!--search-->
               
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

@section('footscript')
    <link rel="stylesheet" href="{{asset('asset/css/dropzone.min.css')}}">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{asset('asset/js/dropzone.min.js')}}"></script>
    <script>
        $('#spinner').hide();
        
        setTimeout(function(){
            $('.alert-success').fadeOut();
        },5000);
        $('#datetimepicker8').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                format: 'DD-MM-YYYY'
            });
        $('input.jumlah').autoNumeric('init',{mDec:0});
        $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                //$('#load a').css('color', '#dfecf6');
                //$('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
                var url = $(this).attr('href');
                getPosts(url);
                window.history.pushState("", "", url);
        });
        function getPosts(page) {
            $.ajax({
                    url : page
                }).done(function (data) {
                    $('div#data').html(data);
                }).fail(function () {
                    alert('Halaman Data {{ucwords($jenis)}} Tidak Dapat Di Tampilkan');
            });
        }

        $("#form-konsultasi").validate({
            rules: {
            nama: { required: true},
            email: { required: true, email: true },
            pertanyaan: { required: true},
            },
            messages: {
            nama: {
                required: "Anda Belum Mengisi Nama"
            },
            email: {
                required: "Email Harus Dimasukkan",
                email: "Email Anda Belum Valid"
            },
            pertanyaan: {
                required: "Silahkan Masukan Pertanyaan",
            },
            },
            onkeyup: true,
            onfocusout: function(element) { $(element).valid(); },
            showErrors: function(errorMap, errorList) {
            
            this.defaultShowErrors();
            },
            errorClass: "incorrect",
            validClass: "correct",
            errorElement: "label",
            submitHandler: function(form) {
                //var cx=;
                var response = grecaptcha.getResponse();
                if(response.length != 0)
                {
                    //alert($('#cek').val());
                    $('#spinner').show();
                    $('#icon-simpan').hide();
                    $('#submit-simpan').prop('disabled', true);
                    $("#form-konsultasi").submit();
                }
                else
                {
                    //$('label#c_text').text("Silahkan Klik Captcha");
                    alert("Silahkan Klik Captcha");
                }
            }
        });

        $("#form-konfirmasi").validate({
            rules: {
                nama: { required: true},
                telepon: { required: true},
                tanggal: { required: true},
                jumlah: { required: true},
                rekening: { required: true},
                bank: { required: true},
                rekening_baznas: { required: true},
            },
            messages: {
                nama: {
                    required: "Anda Belum Mengisi Nama"
                },
                telepon: {
                    required: "Nomor Telepon Belum Diisi"
                },
                tanggal: {
                    required: "Silahkan Isi Tanggal Transfer",
                },
                jumlah: {
                    required: "Silahkan Isi Jumlah Transfer Zakat/Infak",
                },
                rekening: {
                    required: "Silahkan Isi Nomor Rekening Pengirim",
                },
                bank: {
                    required: "Silahkan Isi Nama Bank Pengirim",
                },
                rekening_baznas: {
                    required: "Silahkan Pilih Rekening BAZNAS Kota Bogor",
                },
            },
            onkeyup: true,
            onfocusout: function(element) { $(element).valid(); },
            showErrors: function(errorMap, errorList) {
            
            this.defaultShowErrors();
            },
            errorClass: "incorrect",
            validClass: "correct",
            errorElement: "label",
            submitHandler: function(form) {
                //var cx=;
                var response = grecaptcha.getResponse();
                if(response.length != 0)
                {
                    $('#spinner').show();
                    $('#icon-simpan').hide();
                    $('#submit-simpan').prop('disabled', true);
                    $("#form-konfirmasi").submit();
                }
                else
                {
                    //$('label#c_text').text("Silahkan Klik Captcha");
                    alert("Silahkan Klik Captcha");
                }
            }
        });

        $("#form-jemput").validate({
            rules: {
                nama: { required: true},
                telepon: { required: true},
                jumlah: { required: true},
                alamat: { required: true},
                
            },
            messages: {
                nama: {
                    required: "Anda Belum Mengisi Nama"
                },
                telepon: {
                    required: "Nomor Telepon Belum Diisi"
                },
                alamat: {
                    required: "Silahkan Isi Alamat Penjemputan",
                },
                jumlah: {
                    required: "Silahkan Isi Jumlah Zakat/Infak",
                },
            },
            onkeyup: true,
            onfocusout: function(element) { $(element).valid(); },
            showErrors: function(errorMap, errorList) {
            
            this.defaultShowErrors();
            },
            errorClass: "incorrect",
            validClass: "correct",
            errorElement: "label",
            submitHandler: function(form) {
                //var cx=;
                var response = grecaptcha.getResponse();
                if(response.length != 0)
                {
                    //alert($('#cek').val());
                    $("#form-jemput").submit();
                }
                else
                {
                    //$('label#c_text').text("Silahkan Klik Captcha");
                    alert("Silahkan Klik Captcha");
                }
            }
        });
        $('#btn-donasi').on('click',function(){
            var jenis_donasi=$('#jenis_donasi');
            var keterangan=$('#keterangan');
            var jlh_donasi=$('#jlh_donasi');
            var sapaan=$('#sapaan');
            var nama_lengkap=$('#nama_lengkap');
            var email=$('#email');
            var hp=$('#hp');
            var PaymentId=$('input.PaymentId:checked').length;

            if(jenis_donasi.val()=='')
                alert("Silahkan Pilih Jenis Donasi");
            else if(jlh_donasi.val()=='' || jlh_donasi.val()=='0')
                alert('Silahkan Masukan Jumlah Donasi');
            else if(nama_lengkap.val()=='')
                alert('Silahkan Masukan Nama');
            else if(hp.val()=='')
                alert('Silahkan Masukan Nomor Handphone');
            else if(hp.val()=='')
                alert('Silahkan Masukan Nomor Handphone');
            else if(PaymentId==0)
                alert('Silahkan Pilih Metode Donasi');
            else
            {
                $('#form-donasi').submit();
            }
            

        });
    </script>
    <script src="{{asset('front/js/autoNumeric.js')}}"></script>
    <script type="text/javascript">
    $('#jlh_donasi').keyup(function(){
        $(this).autoNumeric('init',{mDec:0});
    });
    // $('input[type=text]').autoNumeric('init',{mDec:0});
    Dropzone.autoDiscover = false;
    var dt = new Date();
    var time = String(dt.getDate())+String(dt.getMonth())+String(dt.getFullYear())+'-';
    $("div#file").dropzone(
        { 
            url: '{{ url("upload-konfirmasi") }}' ,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            maxFilesize: 1,
            renameFile: function(file) {
                
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            dictDefaultMessage: "<i class='fa fa-upload' style='font-size:40px;color:red;'></i><br>Silahkan Pilih (Klik)",
            dictRemoveFile:'Hapus File',
            success: function(file, response) 
            {
                $('#id').val(response);
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            },
            removedfile: function(file) {
                var name = time+file.name; 
                
                $.ajax({
                    url: '{{url("hapus-foto-konfirmasi")}}/'+name,
                    sucess: function(data){
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        });
    
        function calc_profesi(selector)
       	{
		//    alert('a');
			$('input[type=text]').autoNumeric('init',{mDec:0});
			var emas=$('#emas').val();
			var nisab = 85 * parseFloat(emas.replace(/,/g,''));

			var p1=$('#prof1').val();
			var p3=$('#prof2').val();
			var p4=$('#prof4');
			var p5=$('#prof5').val();
			var p6=$('#prof6').val();
			var p7=$('#prof7');
			var p8=$('#prof8');
			var p9=$('#prof9');

			p1 = (p1=='' ? 0 : parseFloat(p1.replace(/,/g,'')));
			p3 = (p3=='' ? 0 : parseFloat(p3.replace(/,/g,'')));
			p5 = (p5=='' ? 0 : parseFloat(p5.replace(/,/g,'')));
			p6 = (p6=='' ? 0 : parseFloat(p6.replace(/,/g,'')));
			
			
			var total_jlh=(12*p1)+p3;
			p4.autoNumeric('set',total_jlh);
			// p4.val(total_jlh);
			
			var total_klr=(12*p5)+p6;
			p7.autoNumeric('set',total_klr);
			
			var selisih = total_jlh-total_klr;
			p8.autoNumeric('set',selisih);
			if(selisih >= nisab)
			{
				var zakat=(2.5/100) * selisih;
				p9.autoNumeric('set',zakat);
			}
			else
			{
				p9.autoNumeric('set',0);
			}
			// p7.val(total_klr);
			// $('#nisab').val(nisab);
			$('#nisab').autoNumeric('set',nisab);
			

       	}
    </script>
<style>
#halaman-content {
}

#halaman-content h1, #halaman-content h2, #halaman-content h3, #halaman-content h4, #halaman-content h5, #halaman-content h6 {
	font-family: georgia;
	font-weight: normal;
}

#halaman-content p {
	font-size: 1.1em;
}

#halaman-content a {
	font-weight: normal;
}

#halaman-content a:hover {
	text-decoration: none;
}

#halaman-content img {
	max-width: 80px;
	height: auto;
	padding: 2px;
}
</style>
@endsection