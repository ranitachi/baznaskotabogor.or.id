<table class="table table-striped table-bordered" id="data-staff" width="100%">
  <thead>
    <tr>
      <th style="width:20px !important;">No</th>
      <th>Foto</th>
      <th>Nama Staff</th>
      <th>Posisi</th>
      <th>Social Media</th>
      <th class="text-center" style="width:100px !important;">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($staff as $k => $v)
    @php
      if(isset($jabatan[$v->id_jabatan]))
      {
        $jab=$jabatan[$v->id_jabatan]->nama_jabatan;
      }
      else
        $jab='';
    @endphp
    <tr>
      <td class="text-center" style="width:20px !important;">{{($k+1)}}</td>
      <td class="text-center" style="width:200px;"><img style="max-height:100px;" src="{{(asset($v->photo))}}"></td>
      <td style="">{{$v->nama}}</td>
      <td style="text-center">{{$jab}}</td>
      <td style="">
        Facebook : {{$v->facebook}}<br>
        Twitter : {{$v->twitter}}<br>
        LinkedIn : {{$v->linkedin}}
      </td>
      <td class="text-center" style="width:100px !important;">
        <a href="{{URL::to('/staff-form')}}/{{$v->id}}"><i class="icon-pencil5"></i></a>
        <a href="javascript:hapus({{$v->id}})"><i class="icon-trash"></i></a>
      </td>
    </tr>
  @endforeach

  </tbody>
</table>
<style>
th { font-size: 12px !important; padding:6px 10px !important; text-align: center;}
td { font-size: 11px !important; padding:6px 10px !important}
</style>
