        <div class="row" style="">
                    <div class="col-lg-12" style="padding-left:0px !important;margin-left:0px !important">
                        <div class="theme-form">
                            <form action="{{URL::to('layanan/detail/'.$id)}}" method="POST" id="form-konfirmasi">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    Nama
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12" >
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
                                    Tgl Transaksi
                                </div>
                                <div class=" col-lg-6 col-md-8 col-sm-10 col-xs-11">
                                    <div class="main-input">
                                        <input type="text" name="tanggal" placeholder="Tanggal Transaksi" style="margin-bottom:10px;">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <div class=" col-lg-6 col-md-4 col-sm-2 col-xs-1"><button class="btn btn-md btn-primary" type="button"><i class="fa fa-calendar"></i></button></div>
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
                                    Nomor Rekening Muzzaki
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="main-input">
                                        <input type="text" name="rekening" placeholder="Nomor Rekening Muzzaki" style="margin-bottom:10px;">
                                        <i class="fa fa-address-book"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    Nama Bank Muzzaki
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="main-input">
                                        <input type="text" name="bank" placeholder="Nama Bank Muzzaki" style="margin-bottom:10px;">
                                        <i class="fa fa-address-book"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    Rekening BAZNAS Kota Bogor
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select name="rekening_baznas" placeholder="Rekening BAZNAS" style="margin-bottom:10px;">
                                        <option></option>
                                    </select>
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
                    //alert($('#cek').val());
                    $("#form-konfirmasi").submit();
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