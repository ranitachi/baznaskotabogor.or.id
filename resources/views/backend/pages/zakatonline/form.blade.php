@extends('backend.layouts.master')

@section('title')
	<title>Form Jemput Zakat | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
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
				<li class="active">Form Jemput Zakat</li>
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
              <form class="form-horizontal" action="{{$id==-1 ? URL::to('jemputzakat') : URL::to('jemputzakat/'.$id) }}" method="POST" id="form-berita">
                <fieldset class="content-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									@if ($id!=-1)
										{{ method_field('PATCH') }}
									@endif
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nama Muzzaki</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Nama" name="title" id="title" autocomplete="off" value="{{($id!=-1 ? $det->nama : '')}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Telepon</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Telepon" name="telp" id="telp" autocomplete="off" value="{{($id!=-1 ? $det->telp : '')}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Email</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="email" name="email" id="email" autocomplete="off" value="{{($id!=-1 ? $det->email : '')}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Jumlah Donasi</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Jumlah Donasi" name="jumlah" id="jumlah" autocomplete="off" value="{{($id!=-1 ? ($det->jumlah) : '')}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Alamat</label>
                    <div class="col-lg-10">
                      <textarea rows="5" cols="5" class="form-control" placeholder="Alamat" name="alamat">{{($id!=-1 ? $det->alamat : '')}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
							      <label class="control-label col-lg-2">Status Jemput Zakat</label>
							      <div class="col-lg-4">
							        <select class="select2 form-control" name="validasi">
							            <option value="-1">-Pilih-</option>
							            <option value="1" {{$id!=-1 ? ($det->validasi=='1' ? 'selected="selected"' : '') : ''}}>Sudah Di Jemput</option>
							            <option value="0" {{$id!=-1 ? ($det->validasi=='0' ? 'selected="selected"' : '') : ''}}>Belum Di Jemput</option>
							        </select>
							      </div>
							    </div>
                  
                  <div class="form-group">
                    <label class="control-label col-lg-2">Keterangan</label>
                    <div class="col-lg-10">
                      <textarea rows="5" cols="5" class="form-control"  placeholder="Keterangan" name="desc" readonly>{{($id!=-1 ? $det->desc : '')}}</textarea>
                    </div>
                  </div>
                  <div class="text-right">
  									<button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
  								</div>
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
  $(document).ready(function(){

			
  });

	</script>
@endsection
<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right">
    <li>
      <div data-fab-label="Kembali">
        <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon" href="{{URL::to('/jemputzakat')}}">
          <i class="fab-icon-open icon-backspace2"></i>
        </a>
      </div>
    </li>
  </ul>
