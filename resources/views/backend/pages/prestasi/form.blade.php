<form class="form-horizontal" action="{{$id==-1 ? URL::to('prestasi') : URL::to('prestasi/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-prestasi">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Prestasi</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Prestasi" name="title" id="title" autocomplete="off" value="{{($id!=-1 ? $det->title : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Lokasi</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Lokasi" name="lokasi" id="lokasi" autocomplete="off" value="{{($id!=-1 ? $det->lokasi : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-3">Flag</label>
      <div class="col-lg-4">
        <select class="select2" name="flag">
            <option value="-1">-Pilih-</option>
            <option value="1" {{$id!=-1 ? ($det->flag=='1' ? 'selected="selected"' : '') : ''}}>Active</option>
            <option value="0" {{$id!=-1 ? ($det->flag=='0' ? 'selected="selected"' : '') : ''}}>DeActive</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-2">Keterangan</label>
      <div class="col-lg-10">
        &nbsp;
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-12">
        <textarea rows="3" cols="5" class="form-control" placeholder="Keterangan" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
      </div>
    </div>
  </fieldset>
</form>
