<form class="form-horizontal" action="{{$id==-1 ? URL::to('rekening') : URL::to('rekening/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-rekening">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Nama Bank</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Nama Bank" name="nama_bank" id="nama_bank" autocomplete="off" value="{{($id!=-1 ? $det->nama_bank : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Nomor Rekening</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Nomor Rekening" name="nomor_rekening" id="nomor_rekening" autocomplete="off" value="{{($id!=-1 ? $det->nomor_rekening : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Kategori</label>
      <div class="col-lg-4">
        <select class="select2" name="kategori">

            <option value="-1">-Pilih-</option>
            @foreach ($kategori as $k => $v)
              @if ($id!=-1)
                @if ($det->kategori==$v)
                  <option value="{{$det->kategori}}" selected="selected">{{$v}}</option>
                @else
                  <option value="{{$v}}">{{$v}}</option>
                @endif
              @else
                <option value="{{$v}}">{{$v}}</option>
              @endif

            @endforeach
        </select>
      </div>
    </div>
  </fieldset>
</form>
