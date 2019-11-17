<ul style="list-style:none !important;">
@foreach ($bank as $k => $item)
    <li><h3 style="color:#22B662">Rekening {{$k}}</h3>
        <ol>
        @foreach ($item as $kk => $v)
            <li>
                <blockquote style="margin-bottom:4px !important;border-bottom:1px solid #eee;padding:3px !important;font-size:13px;color:#111">
                    {{$v->nama_bank}} : <b style="font-weight: 600">{{$v->nomor_rekening}}</b>
                </blockquote>
            </li>
        @endforeach
        </ol>
    </li>    
@endforeach
</ul>