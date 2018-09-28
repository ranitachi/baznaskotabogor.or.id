        <div class="row" style="">
                    <div class="col-lg-12" style="padding-left:0px !important;margin-left:0px !important">
                        <div class="theme-form">
                            <form action="{{URL::to('layanan/detail/'.$id)}}" method="POST" id="form-konsultasi">
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
                                    Email
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="main-input">
                                        <input type="email" name="email" placeholder="Email" style="margin-bottom:10px;">
                                        <i class="fa fa-at"></i>
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
                                    Pertanyaan
                                </div>
                                <div class="col-xs-12">
                                    <textarea placeholder="Pertanyaan" name="pertanyaan" rows="4" style="margin-bottom:5px !important"></textarea>
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
                    $("#form-konsultasi").submit();
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