<table class="table table-striped table-bordered" id="data-berita" width="100%">
  <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Tanggal</th>
      <th class="text-center">Nama / Email / HP</th>
      <th class="text-center">Metode Donasi<br>Reference</th>
      <th class="text-center">Jenis Donasi</th>
      <th class="text-center">Jumlah Donasi</th>
      <th class="text-center">Status Donasi</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $k => $v)
      <tr>
        <td class="text-center">{{($k+1)}}</td>
        <td class="text-center">{{tgl_indo2($v->tanggal_donasi)}}</td>
        <td>
          <H5>{{$v->nama_lengkap}}</h5>
          {{$v->email}}
          <br>
          {{$v->hp}}
        </td>
        <td class="text-center">{{jenisdonasi($v->metode_payment)}}<br>{{$v->reference}}<br><b>{{$v->id_donasi}}</b></td>
        <td class="text-center">{{($v->jenis_donasi)}}</td>
        <td class="text-right">{{number_format($v->jlh_donasi,0,',','.')}}</td>
        <td class="text-center">
          @if ($v->status_donasi=='00')
            <button class="btn btn-success btn-xs">Sudah Selesai</button>
          @else
            <button class="btn btn-danger btn-xs">Pending/Belum Selesai</button>
          @endif
        </td>
        <td class="text-center">
          {{-- <a href="{{URL::to('/zakatonline-form')}}/{{$v->id}}"><i class="icon-pencil5"></i></a> --}}
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
