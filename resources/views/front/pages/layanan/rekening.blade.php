<div class="row">
    <div class="col-lg-4">
        <legend>Rekening Zakat</legend>
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Nomor Rekening</th>
                    <th>Rekening</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($rekening['zakat']))                
                @foreach($rekening['zakat'] as $k => $v)
                    <tr>
                        <td>{{$v->nomor_rekening}}</td>
                        <td>{{$v->nama_bank}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-lg-4">
        <legend>Rekening Infak</legend>
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Nomor Rekening</th>
                    <th>Rekening</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($rekening['infak']))
                @foreach($rekening['infak'] as $k => $v)
                    <tr>
                        <td>{{$v->nomor_rekening}}</td>
                        <td>{{$v->nama_bank}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-lg-4">
        <legend>Rekening Kemanusiaan</legend>
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Nomor Rekening</th>
                    <th>Rekening</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($rekening['kemanusiaan']))
                @foreach($rekening['kemanusiaan'] as $k => $v)
                    <tr>
                        <td>{{$v->nomor_rekening}}</td>
                        <td>{{$v->nama_bank}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
