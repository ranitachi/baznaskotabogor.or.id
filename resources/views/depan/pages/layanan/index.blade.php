@extends('layouts.depan')

@section('title')
    {{ucwords($jenis)}}
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
                <div class="about_left col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="content-inner">
                        <div class="content">
                            <div class="desc">
                                @if ($id=='rekening-zakat')
                                    <h2 class="title" style="">Rekening Donasi Zakat dan Infak</h2>
                                @else
                                    <h2 class="title" style="">{{ucwords($jenis)}}</h2>
                                @endif

                                @if(Session::has('pesan'))
                                    <div class="alert alert-success" style="width:100%;">
                                        <strong>Success!</strong> 
                                        {!! Session::get('pesan') !!} 
                                    </div>
                                @endif
                                <div style="padding-top:30px;">
                                        @include('depan.pages.layanan.data')
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="sidebar-right sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar-inner">
                        <div>
                            <div class="categories">
                                <h2 class="block-title">
                                    <span>Layanan BAZNAS Kota Bogor</span>
                                </h2>
                                <div class="content block-content">
                                    <ul>
                                        <li>
                                            <a href="{{url('layanan/donasi-zakat')}}">Donasi Zakat Online</a>
                                        </li>
                                        <li>
                                            <a href="{{url('layanan/konsultasi-zakat')}}">Konsultasi Zakat</a>
                                        </li>
                                        <li>
                                            <a href="{{url('layanan/konfirmasi-zakat')}}">Konfirmasi Zakat</a>
                                        </li>
                                        <li>
                                            <a href="{{url('layanan/jemput-zakat')}}">Jemput Zakat</a>
                                        </li>
                                        <li>
                                            <a href="{{url('layanan/kalkulator-zakat')}}">Kalkulator Zakat</a>
                                        </li>
                                        <li>
                                            <a href="{{url('layanan/rekening-zakat')}}">Rekening Zakat</a>
                                        </li>
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
         <link href="{{asset('asset/js/datepicker/bootstrap-datetimepicker.css')}}" rel="stylesheet" media="screen"> 
    <script src="{{asset('front/js/validate.min.js')}}"></script>
     <script src="{{asset('front/js/autoNumeric.js')}}"></script>
     <script src="{{asset('asset/js/datepicker/moment.js')}}"></script>
     <script src="{{asset('asset/js/datepicker/bootstrap-datetimepicker.js')}}"></script>
    <script>
    $(document).ready(function(){
        $('body').addClass('page_about pages_item page_list_posts');
    });
    </script>
    <style>
        .desc
        {
            text-align:justify;
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