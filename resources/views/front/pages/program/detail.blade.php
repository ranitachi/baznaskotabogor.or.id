@if (isset($program[$slug]))
    @if(count($program[$slug])!=0)
        {!!$program[$slug]->desc!!}
    @else
        <i>Data Program Belum Tersedia</i>
    @endif
@else
    <i>Data Program Belum Tersedia</i>
@endif
