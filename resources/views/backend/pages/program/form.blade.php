@extends('backend.layouts.master')

@section('title')
	<title>Form Program | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
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
				<li class="active">Form Program</li>
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
              <form class="form-horizontal" action="{{$id==-1 ? URL::to('program') : URL::to('program/'.$id) }}" method="POST" id="form-program">
                <fieldset class="content-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									@if ($id!=-1)
										{{ method_field('PATCH') }}
									@endif
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nama Program</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Nama Program" name="nama_program" id="nama_program" autocomplete="off" value="{{($id!=-1 ? $det->nama_program : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Bagian</label>
                    <div class="col-lg-6">
                      <select class="select2" name="id_bagian">
                          <option value="-1">-Pilih-</option>
                          @foreach ($div as $k => $v)
                            @if ($id!=-1)
                              @if ($det->id_bagian==$v->id)
                                <option value="{{$det->id_bagian}}" selected="selected">{{$v->nama_bagian}}</option>
															@else
																<option value="{{$v->id}}">{{$v->nama_bagian}}</option>
                              @endif
                            @else
                              <option value="{{$v->id}}">{{$v->nama_bagian}}</option>
                            @endif
                          @endforeach
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
									
                  <div class="form-group">
                    <label class="control-label col-lg-2">Logo</label>
                    <div class="col-lg-6">
											<div class="input-group">
										   <span class="input-group-btn">
										     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
										       <i class="fa fa-picture-o"></i> Choose
										     </a>
										   </span>
										   <input id="thumbnail" readonly class="form-control" type="text" name="logo" value="{{($id!=-1 ? $det->logo : '')}}">
										 </div>
										 <img id="holder" style="margin-top:15px;max-height:100px;" src="{{($id!=-1 ? asset($det->logo): '')}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-lg-2">Deskripsi</label>
                    <div class="col-lg-10">
                      <textarea rows="5" cols="5" class="form-control" placeholder="Deskripsi" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
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
      <div data-fab-label="Kembali Ke Program">
        <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon" href="{{URL::to('/program')}}">
          <i class="fab-icon-open icon-backspace2"></i>
        </a>
      </div>
    </li>
  </ul>
