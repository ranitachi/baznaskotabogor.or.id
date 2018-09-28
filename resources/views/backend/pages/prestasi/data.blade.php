<table class="table table-striped table-bordered" id="data-prestasi" width="100%">
  <thead>
    <tr>
      <th style="width:20px !important;">No</th>
      <th>Prestasi</th>
      <th>Lokasi</th>
      <th>Keterangan</th>
      <th>View</th>
      <th>Flag</th>
      <th class="text-center" style="width:100px !important;">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $k => $v)
    <tr>
      <td class="text-center" style="width:20px !important;">{{($k+1)}}</td>
      <td class="" >{{$v->title}}</td>
      <td style="">{!! $v->desc !!}</td>
      <td class="" >{{$v->lokasi}}</td>
      <td class="text-center"><span class="label label-primary label-rounded">{{($v->view)}}</span></td>
      <td class="text-center">
        @if ($v->flag==0)
          <input type="checkbox" value="{{$v->id}}" class="switch" data-on-text="On" data-off-text="Off" data-size="mini">
        @else
          <input type="checkbox" value="{{$v->id}}" class="switch" data-on-text="On" data-off-text="Off" checked="checked" data-size="mini">
        @endif
      </td>
      <td class="text-center" style="width:100px !important;">
        <a href="javascript:edit({{$v->id}})"><i class="icon-pencil5"></i></a>
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
