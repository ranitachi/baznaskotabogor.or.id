<table class="table table-striped table-bordered" id="data-jabatan" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Jabatan</th>
      <th>Bagian</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $k => $v)
    <tr>
      <td class="text-center">{{($k+1)}}</td>
      <td>{{$v->nama_jabatan}}</td>
      <td>{{(isset($div[$v->id_bagian]) ? $div[$v->id_bagian]->nama_bagian: '')}}</td>

      <td class="text-center">
        <a href="javascript:edit({{$v->id}})"><i class="icon-pencil5"></i></a>
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
