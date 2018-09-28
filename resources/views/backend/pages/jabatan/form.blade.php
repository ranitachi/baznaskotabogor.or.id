<form class="form-horizontal" action="{{$id==-1 ? URL::to('jabatan') : URL::to('jabatan/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-jabatan">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Nama Jabatan</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Nama Jabatan" name="nama_jabatan" id="nama_jabatan" autocomplete="off" value="{{($id!=-1 ? $det->nama_jabatan : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Bagian</label>
      <div class="col-lg-8">
        <select class="select2" name="id_bagian">
            <option value="-1">-Pilih-</option>
            @foreach ($div as $k => $v)
              @if ($id!=-1)
                @if ($det->id_bagian==$v->id)
                  <option value="{{$det->id_bagian}}" selected="selected">{{$v->nama_bagian}}</option>
                @else
                  <option value="{{$v->id}}">{{$v->nama_bagian}}</option>
                @endif
              @else
                <option value="{{$v->id}}">{{$v->nama_bagian}}</option>
              @endif
            @endforeach
          </optgroup>
        </select>
      </div>
    </div>
    
  </fieldset>
</form>
