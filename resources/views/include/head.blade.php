<div class="row">

    @php
        $program=App\Models\Program::orderByRaw('RAND()')->limit(3)->get();
        foreach ($program as $key => $value):
    @endphp
        <div class="col-md-4 col-sm-4">
            <a href="{{url('program-baznas/'.str_slug($value->nama_program))}}">
                <div class="box">
                    <div class="icon">
                        {{--  <i class="fa fa-group"></i>  --}}
                        <img src="{{asset('images/logo/ZAKAT-BAZNAS.png')}}" style="height:70px;width:70px;">
                    </div>
                    <h2>{{$value->title}}</h2>
                    <p class="text-overflow">{{substr(strip_tags($value->nama_program),0,50)}}</p>
                    <div class="text-overflow" style="margin-top:-20px;font-size:12px;">{{substr(strip_tags($value->desc),0,50)}}...</div>
                </div>
            </a>
        </div>
    @php
        endforeach
    @endphp
    
</div>