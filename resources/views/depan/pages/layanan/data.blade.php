@if ($id=='konsultasi-zakat')
    @include('depan.pages.layanan.konsultasi')
@elseif ($id=='konfirmasi-zakat')
    @include('depan.pages.layanan.konfirmasi')
@elseif ($id=='jemput-zakat')
    @include('depan.pages.layanan.jemput')
@elseif ($id=='rekening-zakat')
    @include('depan.pages.layanan.rekening')
@elseif ($id=='kalkulator-zakat')
    @include('depan.pages.layanan.kalkulator')
@elseif ($id=='donasi-zakat')
    @include('depan.pages.layanan.donasi-zakat')
@endif