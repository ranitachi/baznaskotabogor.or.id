@extends('backend.layouts.master')

@section('title')
	<title>Program {{$program->nama_program}} | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
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
				<li class=""><a href="{{URL::to('/program')}}">Program</a></li>
				<li class="active">{{$program->nama_program}}</li>
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
            {{-- <div id="data-loader">
              <center>
                <img src="{{asset('images/logo/loading-bl-blue.gif')}}">
              </center>
            </div> --}}
            <div id="data" style="padding:15px">
              <form class="form-horizontal">
                <fieldset class="content-group">
                    <div class="form-group">
                    <label class="control-label col-lg-4"><h2>{{str_replace('-',' ',strtoupper($program->nama_program))}}</h2></label>
                    <div class="col-lg-12">
                        {!! $program->desc !!}
                      
                    </div>
                    </div>
                    @if($id!=-1)
                    <div class="form-group">
                    <div class="text-right">
                        <button type="button" onclick="bukaform({{$program->id}})" class="btn btn-success"><i class="icon-pencil5"></i>&nbsp;&nbsp;Edit</button>
                    </div>
                    </div>
                    @endif
                </fieldset>
                </form>
            </div>
          </div>
        </div>
    </div>
    <!-- END STATISTICS -->


		@include('backend.includes.footer')
	</div>
@endsection
@section('footscripts')
	<script>

    function bukaform(id)
    {
        location.href=APP_URL+'/program-form/'+id;
    }
	</script>
@endsection

