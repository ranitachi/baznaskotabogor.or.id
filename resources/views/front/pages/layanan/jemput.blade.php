        <div class="row" style="">
                    <div class="col-lg-12" style="padding-left:0px !important;margin-left:0px !important">
                        <div class="theme-form">
                            <form action="{{URL::to('layanan/detail/'.$id)}}" method="POST" id="form-jemput">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    Nama
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="main-input">
                                        <input type="text" name="nama" placeholder="Nama" style="margin-bottom:10px;">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    Telepon/HP
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="main-input">
                                        <input type="text" name="telepon" placeholder="Telepon/HP" style="margin-bottom:10px;">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    Jumlah Zakat/Infak
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="main-input">
                                        <input type="text" name="jumlah" placeholder="Jumlah Zakat/Infak" style="margin-bottom:10px;">
                                        <i class="fa fa-money"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    Alamat
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="main-input">
                                        <input type="text" name="alamat" placeholder="Alamat" style="margin-bottom:10px;">
                                        <i class="fa fa-address-book"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    Keterangan
                                </div>
                                <div class="col-xs-12">
                                    <textarea placeholder="Keterangan" rows="4"></textarea>
                                </div>
                                <div class="col-xs-12">
                                   {!! NoCaptcha::display() !!}
                                </div>
                                
                                <div class="col-xs-12 text-right">
                                    <input type="submit" value="Kirim" class="itg-button active">
                                </div>
                            </form>
                        </div>
                    </div>
                    
				</div>
<script>

    $(document).ready(function() {
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
    });
</script>