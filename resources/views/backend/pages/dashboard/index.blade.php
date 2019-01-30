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
			
			<div class="container" style="width:100%;background:#fff;">                
				<div class="row" style="padding:10px;">
					<div class="col-md-8">&nbsp;</div>
					<div class="col-md-2">
						Bulan <select name="bulan" id="bulan" class="form-control pull-right" onchange="loaddata()">
							@for ($i = 1; $i <= 12; $i++)
								@if ($i==$bln)
									<option selected="selected" value="{{$i}}">{{getBulan($i)}}</option>
								@else	
									<option value="{{$i}}">{{getBulan($i)}}</option>
								@endif
								
							@endfor
						</select>
					</div>
					<div class="col-md-2">
						Tahun <select name="tahun" id="tahun" class="form-control pull-right" onchange="loaddata()">
							@for ($i = (date('Y')-4); $i <= date('Y'); $i++)
								@if ($i==$thn)
									<option selected="selected" value="{{$i}}">{{$i}}</option>
								@else	
									<option value="{{$i}}">{{$i}}</option>
								@endif
								
							@endfor
						</select>
					</div>
				</div>
				<canvas id="myChart" height="180px"></canvas>  
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
		
			<div class="col-sm-12 col-md-12">
						<div class="panel panel-body panel-stats bg-warning-400 has-bg-image">
						<div class="media no-margin">
						<div class="media-body">
						<h3 class="no-margin">{{isset($d_quota) ? $d_quota->credit : 'n/a'}}</h3>
						<span class="text-uppercase text-size-mini">Quota SMS Center</span>
						</div>

						<div class="media-right media-middle">
						<i class="fa fa-clone fa-3x opacity-75"></i>
						</div>
						</div>
						</div>
			</div>
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
@section('footscripts')
@php
	$jenis=array('Zakat','Infak');
	$jlh=array(
		$don_zakat,
		$don_infak
	);
@endphp
    <script src="{{asset('js/chartjs/chartjs.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/chartjs/datalabel.js')}}" type="text/javascript"></script>
    <script>
		function loaddata()
		{
			var thn=$('#tahun').val();
			var bln=$('#bulan').val();
			location.href=APP_URL+'/dashboard/'+thn+'/'+bln;
		}
			
			var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($jenis);?>,
                    datasets: [{
                        label: '',
                        data : <?php echo json_encode($jlh);?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Grafik Penerimaan Zakat Online Bulan {{getBulan($bln)}} {{$thn}}'
                    },
                    responsive:true,
                    legend: false,
                    tooltips: false,
                    
                    elements: {
                            rectangle: {
                            backgroundColor: "#cc55aa"
                        }
                    },
                    plugins: {
                    datalabels: {
                            align: 'end',
                            anchor: 'end',
                            color: "#000000",
                            formatter: function(value, context) {
                                return value.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1.');
                            }
                        }
                    }
                }
            });	
</script>
@endsection

