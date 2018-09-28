<table class="table table-striped table-bordered" id="data-rekening" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Kategori</th>
      <th>Nama Bank</th>
      <th>Nomor Rekening</th>

      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
  @php
      $no=1;
  @endphp
  @foreach ($div as $k => $v)
    <tr>
      <td class="text-center">{{($no)}}</td>
      <td>{{$v->kategori}}</td>
      <td>{{$v->nama_bank}}</td>
      <td>{{$v->nomor_rekening}}</td>

      <td class="text-center">
        <a href="javascript:edit({{$v->id}})"><i class="icon-pencil5"></i></a>
        <a href="javascript:hapus({{$v->id}})"><i class="icon-trash"></i></a>
      </td>
    </tr>
    @php
        $no++;
    @endphp
  @endforeach

  </tbody>
</table>
<style>
th { font-size: 12px !important; padding:6px 10px !important}
td { font-size: 11px !important; padding:6px 10px !important}
</style>
