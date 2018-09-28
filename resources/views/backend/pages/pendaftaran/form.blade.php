@extends('backend.layouts.master')

@section('title')
	<title>Form Pendaftaran | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
@stop


@section('page-header')
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</span></h4>
				Menuju Bogor Kota Zakat 2020
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-component">
			<ul class="breadcrumb">
				<li class=""><a href="{{URL::to('/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
				<li class="active">Form Pendaftaran</li>
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
              <form class="form-horizontal" action="{{$id==-1 ? URL::to('pendaftaran') : URL::to('pendaftaran/'.$id) }}" method="POST" id="form-pendaftaran">
                <fieldset class="content-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									@if ($id!=-1)
										{{ method_field('PATCH') }}
									@endif
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nomor Pendaftaran</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" readonly placeholder="Nomor Pendaftaran" name="no_pendaftaran" id="no_pendaftaran" autocomplete="off" value="{{($id!=-1 ? $det->nomor_pendaftaran : $no_daftar)}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nama</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" autocomplete="off" value="{{($id!=-1 ? $det->nama : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Email</label>
                    <div class="col-lg-6">
                      <input type="email" class="form-control" placeholder="Email" name="email" id="email" autocomplete="off" value="{{($id!=-1 ? $det->email : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Asal Sekolah</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" id="asal_sekolah" autocomplete="off" value="{{($id!=-1 ? $det->asal_sekolah : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Sumber Info</label>
                    <div class="col-lg-3">
                      <select class="select2" name="sumber_info">
							            <option value="-1">-Pilih-</option>
							            @foreach($sumber as $k => $v)
                                            @if($id!=-1)
                                                @if($v==$det->sumber_info)
                                                    <option value="{{$v}}" selected="selected">{{$det->sumber_info}}</option>
                                                @else
                                                    <option value="{{$v}}">{{$v}}</option>
                                                @endif
                                            @else
                                                <option value="{{$v}}">{{$v}}</option>
                                            @endif
                                        @endforeach
							        </select>
                    </div>
                  </div>

                  
				    <div class="form-group">
							      <label class="control-label col-lg-2">Minat Jurusan</label>
							      <div class="col-lg-3">
							        <select class="select2" name="minat_jurusan">
							            <option value="-1">-Pilih-</option>
							            @foreach($jurusan as $k => $v)
                                            @if($id!=-1)
                                                @if($v->id==$det->minat_jurusan)
                                                    <option value="{{$det->minat_jurusan}}" selected="selected">{{$v->nama_jurusan}}</option>
                                                @else
                                                    <option value="{{$v->id}}">{{$v->nama_jurusan}}</option>
                                                @endif
                                            @else
                                                <option value="{{$v->id}}">{{$v->nama_jurusan}}</option>
                                            @endif
                                        @endforeach
							        </select>
							      </div>
							    </div>
                  
                <hr>
                <div class="form-group">
                    <label class="control-label col-lg-2">Bukti Pembayaran</label>
                    <div class="col-lg-6">
											<div class="input-group">
										   <span class="input-group-btn">
										     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
										       <i class="fa fa-picture-o"></i> Choose
										     </a>
										   </span>
										   <input id="thumbnail" readonly class="form-control" type="text" name="file" value="{{($id!=-1 ? $det->file : '')}}">
										 </div>
										 <img id="holder" style="margin-top:15px;max-height:100px;" src="{{($id!=-1 ? asset($det->file): '')}}">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-lg-2">Jenis Pembayaran</label>
                    <div class="col-lg-3">
                            <select class="select2" name="jenis">
							            <option value="-1">-Pilih-</option>
							            @foreach($jenis as $k => $v)
                                            @if($id!=-1)
                                                @if($v==$det->jenis)
                                                    <option value="{{$v}}" selected="selected">{{$det->jenis}}</option>
                                                @else
                                                    <option value="{{$v}}">{{$v}}</option>
                                                @endif
                                            @else
                                                <option value="{{$v}}">{{$v}}</option>
                                            @endif
                                        @endforeach
							        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nama Bank</label>
                    <div class="col-lg-3">
                      <select class="select2" name="bank">
							            <option value="-1">-Pilih-</option>
							            @foreach($bank as $k => $v)
                                            @if($id!=-1)
                                                @if($v==$det->bank)
                                                    <option value="{{$v}}" selected="selected">{{$det->bank}}</option>
                                                @else
                                                    <option value="{{$v}}">{{$v}}</option>
                                                @endif
                                            @else
                                                <option value="{{$v}}">{{$v}}</option>
                                            @endif
                                        @endforeach
							        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nomor Rekening</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Nomor Rekening" name="nomor_rekening" id="nomor_rekening" autocomplete="off" value="{{($id!=-1 ? $det->nomor_rekening : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Pemilik Rekening</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Pemilik Rekening" name="pemilik_rekening" id="pemilik_rekening" autocomplete="off" value="{{($id!=-1 ? $det->pemilik_rekening : '')}}">
                    </div>
                  </div>
                 
                <hr>
                <div class="form-group">
                    <label class="control-label col-lg-2">Username</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Username" name="username" id="username" autocomplete="off" value="{{($id!=-1 ? $det->username : '')}}">
                    </div>
                  </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Password</label>
                    <div class="col-lg-6">
                      <input type="text"  class="form-control" placeholder="Password" name="password" id="password" autocomplete="off" value="{{($id!=-1 ? '' : $password)}}" {{(Auth::user()->level!=1 ? 'readonly' : '')}}>
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
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
	<script>
  $(document).ready(function(){
      $('#lfm').filemanager('image', {prefix: APP_URL+'/laravel-filemanager'});
	    $('.select2').select2();
			
        $('#email').onkeyup(function(){
            $('#username').val($(this).val());
        });
  });

	</script>
@endsection
<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right">
    <li>
      <div data-fab-label="Kembali Ke Pendaftar">
        <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon" href="{{URL::to('/pendaftaran')}}">
          <i class="fab-icon-open icon-backspace2"></i>
        </a>
      </div>
    </li>
  </ul>
