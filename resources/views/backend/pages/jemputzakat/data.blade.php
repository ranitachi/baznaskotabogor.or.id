<table class="table table-striped table-bordered" id="data-berita" width="100%">
  <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Tanggal</th>
      <th class="text-center">Nama</th>
      <th class="text-center">Email</th>
      <th class="text-center">Jumlah Donasi</th>
      <th class="text-center">Alamat Lengkap</th>
      <th class="text-center">Status Jemput</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $k => $v)
      <tr>
        <td class="text-center">{{($k+1)}}</td>
        <td>{{tgl_indo2($v->created_at)}}</td>
        <td>{{$v->nama}}</td>
        <td>{{$v->email}}</td>
        <td class="text-right">{{number_format($v->jumlah,0,',','.')}}</td>
        <td>{{$v->alamat}}</td>
        <td class="text-center">
          @if ($v->validasi==0)
            <input type="checkbox" value="{{$v->id}}" class="switch" data-on-text="Sudah" data-off-text="Belum" data-size="mini">
          @else
            <input type="checkbox" value="{{$v->id}}" class="switch" data-on-text="Sudah" data-off-text="Belum" checked="checked" data-size="mini">
          @endif
        </td>
        <td class="text-center">
          <a href="{{URL::to('/jemputzakat-form')}}/{{$v->id}}"><i class="icon-pencil5"></i></a>
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
