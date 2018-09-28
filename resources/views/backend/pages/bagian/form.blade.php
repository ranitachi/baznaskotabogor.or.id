<form class="form-horizontal" action="{{$id==-1 ? URL::to('bagian') : URL::to('bagian/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-bagian">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Nama Bagian</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Nama Bagian" name="nama_bagian" id="nama_bagian" autocomplete="off" value="{{($id!=-1 ? $det->nama_bagian : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Level</label>
      <div class="col-lg-4">
        <select class="select2" name="id_level">

            <option value="-1">-Pilih-</option>
            @foreach ($level as $k => $v)
              @if ($id!=-1)
                @if ($det->id_level==$k)
                  <option value="{{$k}}" selected="selected">{{$v}}</option>
                @else
                  <option value="{{$k}}">{{$v}}</option>
                @endif
              @else
                <option value="{{$k}}">{{$v}}</option>
              @endif

            @endforeach
        </select>
      </div>
    </div>
  </fieldset>
</form>
