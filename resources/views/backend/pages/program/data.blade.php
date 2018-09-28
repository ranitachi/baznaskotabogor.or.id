<table class="table table-striped table-bordered" id="data-program" width="100%">
  <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Nama Program</th>
      <th class="text-center">Bagian</th>
      <th class="text-center">Logo</th>
      <th class="text-center">Deskripsi</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $k => $v)
      <tr>
        <td class="text-center">{{($k+1)}}</td>
        <td>{{($v->nama_program)}}</td>
        <td>{{(isset($div[$v->id_bagian]) ? $div[$v->id_bagian]->nama_bagian : '')}}</td>
        <td class="text-center"><img src="{{asset($v->logo)}}" style="height:100px;"></td>
        <td class="text-center">{{substr(strip_tags($v->desc),0,50)}}
        </td>
        <td class="text-center">
          <a href="{{URL::to('/program-form')}}/{{$v->id}}"><i class="icon-pencil5"></i></a>
          <a href="javascript:hapus({{$v->id}})"><i class="icon-trash"></i></a>
        </td>
      </tr>
    @endforeach

  </tbody>
</table>
<style>
th { font-size: 12px !important; padding:6px 10px !important}
td { font-size: 11px !important; padding:6px 10px !important}
</style>
