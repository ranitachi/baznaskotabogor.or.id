@extends('backend.layouts.master')

@section('title')
	<title>Visi Misi | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
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
				<li class="active">Profile BAZNAS Kota Bogor</li>
				<li class="active">Visi Misi</li>
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
                <img src="{{asset('images/logo/loading-bl-blue.gif')}}">
              </center>
            </div>
            <div id="data" style="padding:0 15px"></div>
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
	var pesan='{{(session('pesan') ? session('pesan') : '' )}}';
	if(pesan!='')
	{
		new PNotify({
				title: 'Informasi',
				text: pesan,
				addclass: 'alert bg-success alert-styled-right',
				type: 'success'
		});
	}
  loadData('{{$category}}');

});
function loadData(id)
{
	$('div#data-loader').show();
  $('div#data').load(APP_URL+'/profil-data/'+id,function(){
    $('div#data-loader').hide();
  });
}
function form(id,cat)
{
	location.href=APP_URL+'/profil-form/'+id+'/'+cat;
}
</script>
@endsection
{{-- <ul class="fab-menu fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="hover">
    <li>
      <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon">
        <i class="fab-icon-open icon-paragraph-justify3"></i>
        <i class="fab-icon-close icon-cross2"></i>
      </a>
      <ul class="fab-menu-inner">
				<li>
					<div data-fab-label="Tambah Berita">
						<a href="{{URL::to('/berita-form/-1')}}" class="btn btn-default btn-rounded btn-icon btn-float">
							<i class=" icon-diff-added"></i>
						</a>
					</div>
				</li>
			</ul>
    </li>
  </ul> --}}
