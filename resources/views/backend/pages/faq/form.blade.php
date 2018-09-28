@extends('backend.layouts.master')

@section('title')
	<title>FAQ | Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>
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
				<li class=""><a href="{{URL::to('/berita')}}">Berita</a></li>
				<li class="active">Form FAQ</li>
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
              <form class="form-horizontal" action="{{$id==-1 ? URL::to('faq') : URL::to('faq/'.$id) }}" method="POST" id="form-faq">
                <fieldset class="content-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									@if ($id!=-1)
										{{ method_field('PATCH') }}
									@endif


                  <div class="form-group">
                    <label class="control-label col-lg-2">Pertanyaan</label>
                    <div class="col-lg-10">
                      <textarea rows="5" cols="5" class="form-control" placeholder="Pertanyaan" name="question" id="question">{{($id!=-1 ? $det->question : '')}}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Jawaban</label>
                    <div class="col-lg-10">
                      <textarea rows="5" cols="5" class="form-control" placeholder="Jawaban" name="answer" id="answer">{{($id!=-1 ? $det->answer : '')}}</textarea>
                    </div>
                  </div>
									<div class="form-group">
							      <label class="control-label col-lg-2">Flag</label>
							      <div class="col-lg-4">
							        <select class="select2" name="flag">
							            <option value="-1">-Pilih-</option>
							            <option value="1" {{$id!=-1 ? ($det->flag=='1' ? 'selected="selected"' : '') : ''}}>Active</option>
							            <option value="0" {{$id!=-1 ? ($det->flag=='0' ? 'selected="selected"' : '') : ''}}>DeActive</option>
							        </select>
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
			CKEDITOR.replace('question', options);
			CKEDITOR.replace('answer', options);
  });

	</script>
@endsection
<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right">
    <li>
      <div data-fab-label="Kembali Ke Berita">
        <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon" href="{{URL::to('/faq')}}">
          <i class="fab-icon-open icon-backspace2"></i>
        </a>
      </div>
    </li>
  </ul>
