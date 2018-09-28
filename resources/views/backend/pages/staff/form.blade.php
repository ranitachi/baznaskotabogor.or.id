@extends('backend.layouts.master')

@section('title')
	<title>Staff | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
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
				<li class="">BAZNAS Kota Bogor</li>
				<li class="active">Form Staff</li>
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
              <form class="form-horizontal" action="{{$id==-1 ? URL::to('staff') : URL::to('staff/'.$id) }}" method="POST" id="form-staff">
                <fieldset class="content-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									@if ($id!=-1)
										{{ method_field('PATCH') }}
									@endif
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nama Staff</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" autocomplete="off" value="{{($id!=-1 ? $det->nama : '')}}">
                    </div>
                  </div>

                  <input type="hidden" name="id_user" value="2">
                  <div class="form-group">
                    <label class="control-label col-lg-2">Photo</label>
                    <div class="col-lg-6">
											<div class="input-group">
										   <span class="input-group-btn">
										     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
										       <i class="fa fa-picture-o"></i> Choose
										     </a>
										   </span>
										   <input id="thumbnail" readonly class="form-control" type="text" name="photo" value="{{($id!=-1 ? $det->photo : '')}}">
										 </div>
										 <img id="holder" style="margin-top:15px;max-height:100px;" src="{{($id!=-1 ? asset($det->photo): '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Jabatan</label>
                    <div class="col-lg-6">
                      <select class="select2" name="id_jabatan">
                          <option value="-1">-Pilih-</option>
                          @foreach ($jabatan as $k => $v)
                            @if ($id!=-1)
                              @if ($det->id_jabatan==$v->id)
                                <option value="{{$det->id_jabatan}}" selected="selected">{{$v->nama_jabatan}}</option>
															@else
																<option value="{{$v->id}}">{{$v->nama_jabatan}}</option>
                              @endif
                            @else
                              <option value="{{$v->id}}">{{$v->nama_jabatan}}</option>
                            @endif
                          @endforeach
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">User</label>
                    <div class="col-lg-6">
                      <select class="select2" name="id_user">
                          <option value="-1">-Pilih-</option>
                          @foreach ($user as $k => $v)
                            @if ($id!=-1)
                              @if ($det->id_user==$v->id)
                                <option value="{{$det->id_user}}" selected="selected">{{$v->name}} :: {{$v->username}}</option>
															@else
																<option value="{{$v->id}}">{{$v->name}} :: {{$v->username}}</option>
                              @endif
                            @else
                              <option value="{{$v->id}}">{{$v->name}} :: {{$v->username}}</option>
                            @endif
                          @endforeach
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Akun Facebook</label>
                    <div class="col-lg-6">
											<input type="text" class="form-control" placeholder="Facebook" name="facebook" id="facebook" autocomplete="off" value="{{($id!=-1 ? $det->facebook : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Akun Twitter</label>
                    <div class="col-lg-6">
											<input type="text" class="form-control" placeholder="Twitter" name="twitter" id="twitter" autocomplete="off" value="{{($id!=-1 ? $det->twitter : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Akun LinkedIn</label>
                    <div class="col-lg-6">
											<input type="text" class="form-control" placeholder="LinkedId" name="linkedin" id="linkedin" autocomplete="off" value="{{($id!=-1 ? $det->linkedin : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Keterangan</label>
                    <div class="col-lg-10">
                      <textarea rows="5" cols="5" class="form-control" placeholder="" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
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
			var options = {
				filebrowserImageBrowseUrl: APP_URL+'/laravel-filemanager?type=Images',
				filebrowserImageUploadUrl: APP_URL+'/laravel-filemanager/upload?type=Images&_token=',
				filebrowserBrowseUrl: APP_URL+'/laravel-filemanager?type=Files',
				filebrowserUploadUrl: APP_URL+	'/laravel-filemanager/upload?type=Files&_token='
			};
			CKEDITOR.replace('desc', options);
  });

	</script>
@endsection
<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right">
    <li>
      <div data-fab-label="Kembali Ke Berita">
        <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon" href="{{URL::to('/berita')}}">
          <i class="fab-icon-open icon-backspace2"></i>
        </a>
      </div>
    </li>
  </ul>
