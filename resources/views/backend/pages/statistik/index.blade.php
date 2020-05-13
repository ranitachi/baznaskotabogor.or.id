@extends('backend.layouts.master')

@section('title')
	<title>Statistik | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
@stop


@section('page-header')
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</span></h4>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-component">
			<ul class="breadcrumb">
        <li class=""><a href="{{URL::to('/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>

				<li class="active">Statistik</li>
			</ul>
		</div>
	</div>
@stop


@section('content-area')
	<div class="content">

		<!-- STATISTICS -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="panel panel-flat">

            <div id="data-loader">
              <center>
                
              </center>
            </div>
			<div id="data" style="padding:20px 15px">
				<table class="table table-striped table-bordered" id="data-rekening" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Tahun</th>
							<th>Jumlah Muzzaki</th>
							<th>Jumlah Mustahik</th>
							<th>Jumlah Penghimpunan</th>
							<th>Jumlah Pernyaluran</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
					@php
						$no=1;
					@endphp
					@foreach ($stk as $k => $v)
						<tr>
							<td class="text-center">{{($no)}}</td>
							<td>{{$k}}</td>
							<td>{{number_format($stk[$k]['jlh_muzzaki'],0,',','.')}}</td>
							<td>{{number_format($stk[$k]['jlh_mustahik'],0,',','.')}}</td>
							<td>{{number_format($stk[$k]['jlh_penghimpunan'],0,',','.')}}</td>
							<td>{{number_format($stk[$k]['jlh_penyaluran'],0,',','.')}}</td>
							<td class="text-center">
								<a href="{{ route('statistik.edit',$stk[$k]['id']) }}"><i class="icon-pencil5"></i></a>
								<a href="javascript:hapus({{$stk[$k]['id']}})"><i class="icon-trash"></i></a>
							</td>
						</tr>
						@php
							$no++;
						@endphp
					@endforeach

					</tbody>
					</table>
					<form id="delete-form" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @method('DELETE')
                    </form>
			</div>
          </div>
        </div>
    </div>
    <!-- END STATISTICS -->

		<div class="row">
			{{-- YOUR CONTENT HERE --}}
    </div>

		@include('backend.includes.footer')
	</div>
@endsection
@section('footscripts')
<script>
$(document).ready(function(){
  // alert(APP_URL);
	$('table#data-rekening').DataTable();
  
});

function hapus(id)
{
	$('div#modal-hapus').modal('show');
	var url='{{url("/")}}/statistik/'+id;
    $('#delete-form').attr('action',url);
	
	$('#hapusbutton').on('click',function(){
		$('#delete-form').submit();
	});
}
function form(id)
{
	$('#modal-confirm').modal('show');
	$('div#modal-loader-confirm').css({'display':'inline'});
	$('div#dynamic-content-confirm').load(APP_URL+'/Statistik-form/'+id,function(){
		$('div#modal-loader-confirm').css({'display':'none'});
		  $('.select2').select2({
				minimumResultsForSearch: Infinity
			});
	});
}
</script>
@endsection
<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="hover">
    <li>
      <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon">
        <i class="fab-icon-open icon-paragraph-justify3"></i>
        <i class="fab-icon-close icon-cross2"></i>
      </a>
      <ul class="fab-menu-inner">
				<li>
					<div data-fab-label="Tambah Data Statistik">
						<a href="{{ route('statistik.create') }}" class="btn btn-default btn-rounded btn-icon btn-float">
							<i class=" icon-diff-added"></i>
						</a>
					</div>
				</li>
			</ul>
    </li>
  </ul>
