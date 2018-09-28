
<form action="{{URL::to('layanan/'.$id)}}" method="POST" id="form-konsultasi" class="send_message">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-12 col-sm-12 col-xs-12">
        Nama
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12" >
        <div class="input-container">
            <i class="fa fa-user icon-form"></i>
            <input class="input-field" type="text" name="nama" placeholder="Nama" style="margin-bottom:0px !important;">
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        Telepon/HP
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="input-container">
            <i class="fa fa-phone icon-form"></i>
            <input class="input-field" type="text" name="telepon" placeholder="Telepon/HP"  style="margin-bottom:0px !important;">
        </div>
        
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        Email
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="input-container">
            <i class="fa fa-envelope icon-form"></i>
            <input class="input-field" type="email" name="email" placeholder="Email"  style="margin-bottom:0px !important;">
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        Alamat
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="input-container">
            <i class="fa fa-book icon-form"></i>
            <input class="input-field" type="text" name="alamat" placeholder="Alamat"  style="margin-bottom:0px !important;">
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        Pertanyaan
    </div>
    <div class="col-xs-12">
        <textarea placeholder="Pertanyaan" name="pertanyaan" rows="4" style="margin-bottom:5px !important"></textarea>
    </div>
    
    <div class="col-xs-3">&nbsp;</div>
    <div class="col-xs-8 text-center">
        <div class="g-recaptcha" data-sitekey="6LdDqzUUAAAAAMU5w8CXZapLVBliTZ--JxD2Vh0T"></div>
    </div>
    {{-- <div class="col-xs-1">&nbsp;</div> --}}
    <div class="col-xs-2 text-center">&nbsp;</div>
    <div class="col-xs-8 text-center">
        <br>
        <button type="submit" class="btn btn-primary" id="submit-simpan">
            <i class="fa fa-save" id="icon-simpan"></i> 
            <i class="fa fa-circle-o-notch fa-spin" id="spinner" style="font-size:24px"></i>
            Kirim
        </button>
    </div>
    <div class="col-xs-2 text-center">&nbsp;</div>
</form>

<style>
* {box-sizing: border-box;}

/* Style the input container */
.input-container {
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

/* Style the form icons */
.icon-form {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

/* Style the input fields */
.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>