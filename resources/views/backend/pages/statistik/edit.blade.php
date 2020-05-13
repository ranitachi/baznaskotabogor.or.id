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
                <form class="form-horizontal" action="{{ route('statistik.update',$statistik->id) }}" method="post" id="form-rekening">
                    <fieldset class="content-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @method('PATCH')
                        <div class="form-group">
                        <label class="control-label col-lg-4">Tahun</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Tahun" name="tahun" id="tahun" autocomplete="off"  value="{{ $statistik->tahun }}">
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Jumlah Muzzaki</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Jumlah Muzzaki" name="jlh_muzzaki" id="jlh_muzzaki" autocomplete="off" value="{{ $statistik->jlh_muzzaki }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Jumlah Mustahik</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Jumlah Mustahik" name="jlh_mustahik" id="jlh_mustahik" autocomplete="off" value="{{ $statistik->jlh_mustahik }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Jumlah Penghimpunan</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Jumlah Penghimpunan" name="jlh_penghimpunan" id="jlh_penghimpunan" autocomplete="off" value="{{ $statistik->jlh_penghimpunan }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Jumlah Penyaluran</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Jumlah Penyaluran" name="jlh_penyaluran" id="jlh_penyaluran" autocomplete="off" value="{{ $statistik->jlh_penyaluran }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">&nbsp;</label>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Simpan</button>
                            </div>
                        </div>
                    </fieldset>
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