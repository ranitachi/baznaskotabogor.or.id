<table class="table table-striped table-bordered" id="data-berita" width="100%">
  <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Nomor Pendaftaran</th>
      <th class="text-center">Nama</th>
      <th class="text-center">Email</th>
      <th class="text-center">Asal Sekolah</th>
      <th class="text-center">Minat Jurusan</th>
      <th class="text-center">Status Pendaftaran</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $k => $v)
      @php
        if(isset($kon[$v->id]))
        {
          $konf=$kon[$v->id];
          if($konf->validasi==0)
          {
            $status='Belum Verifikasi';
            $label='warning';
          }
          else if($konf->validasi==1)
          {
            $status='Verifikasi Sukses';
            $label='success';
          }
          else if($konf->validasi==2)
          {
            $status='Verifikasi Di Tolak';
            $label='danger';
          }
        }
        else {
          $status='Belum Upload Bukti';
          $label='danger';
        }

        $originalDate = $v->created_at;
        $tgl = date("d-m-Y", strtotime($originalDate));
      @endphp
      <tr>
        <td class="text-center">{{($k+1)}}</td>
        <td class="text-center"><b>{{($v->nomor_pendaftaran)}}</b><br><small>Tgl Daftar : <a href="#">{{$tgl}}</a></small></td>
        <td>{{$v->nama}}</td>
        <td class="text-center">{{($v->email)}}</td>
        <td class="text-center">{{$v->asal_sekolah}}</td>
        <td class="text-center">{{(isset($jur[$v->minat_jurusan]) ? $jur[$v->minat_jurusan]->nama_jurusan : '')}}</td>
        <td class="text-center"><span class="label label-{{$label}} label-rounded">{{$status}}</span></td>
        <td class="text-center">
        @php
        if(isset($kon[$v->id]))
        {
        @endphp
          <a href="{{URL::to('/pendaftaran-form')}}/{{$v->id}}"><i class="icon-pencil5"></i></a>
          <a href="javascript:hapus({{$v->id}})"><i class="icon-trash"></i></a>
        @php
        }
        @endphp
        </td>
      </tr>
    @endforeach

  </tbody>
</table>
<style>
th { font-size: 12px !important; padding:6px 10px !important}
td { font-size: 11px !important; padding:6px 10px !important}
</style>
