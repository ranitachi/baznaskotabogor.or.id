@extends('backend.layouts.master',['program'=>$program])

@section('title')
	<title>Dashboard | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
@stop


@section('page-header')
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</span></h4>
				{{--  Menuju Bogor Kota Zakat 2020  --}}
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-component">
			<ul class="breadcrumb">
				<li class="active"><a href="index.html"><i class="icon-home2 position-left"></i> Dashboard</a></li>
			</ul>
		</div>
	</div>
	
@stop


@section('content-area')
	<div class="content">

		<!-- STATISTICS -->
    <div class="row">
			
        <div class="col-sm-6 col-md-9">
		</div>
		<div class="col-sm-6 col-md-3">
		
			<div class="col-sm-12 col-md-12">
						<div class="panel panel-body panel-stats bg-blue-400 has-bg-image">
						<div class="media no-margin">
						<div class="media-body">
						<h3 class="no-margin">{{$berita}}</h3>
						<span class="text-uppercase text-size-mini">total berita</span>
						</div>

						<div class="media-right media-middle">
						<i class="fa fa-clone fa-3x opacity-75"></i>
						</div>
						</div>
						</div>
			</div>

			<div class="col-sm-12 col-md-12">
						<div class="panel panel-body panel-stats bg-violet-400 has-bg-image">
						<div class="media no-margin">
						<div class="media-body">
						<h3 class="no-margin">{{$jemput}}</h3>
						<span class="text-uppercase text-size-mini">total jemput zakat</span>
						</div>

						<div class="media-right media-middle">
						<i class="fa fa-calendar fa-3x opacity-75"></i>
						</div>
						</div>
						</div>
			</div>

			<div class="col-sm-12 col-md-12">
						<div class="panel panel-body panel-stats bg-indigo-400 has-bg-image">
						<div class="media no-margin">
						<div class="media-body">
						<h3 class="no-margin">{{$konsultasi}}</h3>
						<span class="text-uppercase text-size-mini">total konsultasi zakat</span>
						</div>

						<div class="media-right media-middle">
						<i class="fa fa-tasks fa-3x opacity-75"></i>
						</div>
						</div>
						</div>
			</div>

			<div class="col-sm-12 col-md-12">
						<div class="panel panel-body panel-stats bg-orange-400 has-bg-image">
						<div class="media no-margin">
						<div class="media-body">
						<h3 class="no-margin">{{$konfirmasi}}</h3>
						<span class="text-uppercase text-size-mini">total konfirmasi zakat</span>
						</div>

						<div class="media-right media-middle">
						<i class="fa fa-info-circle fa-3x opacity-75"></i>
						</div>
						</div>
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
