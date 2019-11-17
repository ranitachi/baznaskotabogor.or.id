<form action="{{URL::to('layanan/'.$id)}}" method="POST" id="form-konfirmasi" class="send_message">
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
        Tgl Transaksi
    </div>
    <div class=" col-lg-3 col-md-8 col-sm-10 col-xs-11">
        {{-- <div class="main-input" id="tanggal">
            <input type="text" name="tanggal" placeholder="Tanggal Transaksi" style="margin-bottom:10px;">
            <button class="btn btn-md btn-primary input-group-addon" type="button"><i class="fa fa-calendar"></i></button>
        </div> --}}
       <div class="main-input" style="margin-bottom:20px;">
            <div class='input-group date main-input' id='datetimepicker8'>
                <input type='text' style="width:100% !important;margin-bottom:0px !important;" class="form-control" name="tanggal"/>
                <span class="input-group-addon">
                    <span class="fa fa-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        Jumlah Zakat/Infak
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="input-container">
            <i class="fa fa-money icon-form"></i>
            <input class="input-field jumlah" type="text" name="jumlah" placeholder="Jumlah Zakat/Infak"  style="margin-bottom:0px !important;">
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        Nomor Rekening Muzzaki
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
    
        <div class="input-container">
            <i class="fa fa-book icon-form"></i>
            <input class="input-field" type="text" name="no_rekening" placeholder="Nomor Rekening Muzzaki"   style="margin-bottom:0px !important;">
        </div>

    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        Nama Rekening Muzzaki
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="input-container">
            <i class="fa fa-book icon-form"></i>
            <input class="input-field" type="text" name="nama_rekening"  style="margin-bottom:0px !important;">
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        Nama Bank Muzzaki
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="input-container">
            <i class="fa fa-book icon-form"></i>
            <input class="input-field" type="text" name="nama_bank"  style="margin-bottom:0px !important;">
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        Rekening BAZNAS Kota Bogor
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">

        <select name="rekening_baznas" placeholder="Rekening BAZNAS" class="form-control" style="margin-bottom:10px;">
            <option value="0">-Pilih Rekening-</option>
            @foreach ($bank as $k => $item)
                <optgroup label="Rekening {{$k}}">
                    @foreach ($item as $kk => $v)
                        <option value="{{$v->id}}__{{$v->nama_bank}}:{{$v->nomor_rekening}}">{{$v->nama_bank}} : {{$v->nomor_rekening}}</option>
                    @endforeach
                </optgroup>    
            @endforeach
            </select>
    </div>
    
    <div class="col-md-12 col-sm-12 col-xs-12">
        Unggah Bukti Transfer
    </div>
    <div class="col-xs-10">
        <div id="file" class="dropzone" style="width:200px;"></div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        Keterangan
    </div>
    <div class="col-xs-12">
        <textarea placeholder="Keterangan" name="keterangan" class="form-control" rows="4"></textarea>
        <input type="hidden" name='id' id="id">
    </div>
    
    <div class="col-xs-3">&nbsp;</div>
    <div class="col-xs-8 text-center">
        <br>
        {{-- {!! NoCaptcha::display() !!} --}}
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