<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">   
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mains Style-->
    @include('include.head-script')
  </head>

    <body> 
    
    <!-- layout-->
    <div id="layout">

        <!-- Main -->
        @yield('main')
        
        <!-- end Main -->

        <!-- central content -->
        <section class="central_content">
            @yield('content')
        </section>
        <!--end central content -->

        <!--footer-->
        <footer style="background:#000 url({{asset('asset/img/world-map.png')}}) no-repeat;!important;opacity:0.83;">
            @include('include.foot')
        </footer>
        <!-- end Footer -->
    </div>
    <!-- layout-->
    <div id="div_side">
        <div style="margin: 4px 0 0 2px;">
            <a href="{{url('layanan/donasi-zakat')}}" >
                <img src="{{asset('images/icondonasi.png')}}" style="height:75px;float:left" data-toggle="tooltip" title="Donasi Zakat" class="tooltips" data-placement="right">
            </a>
        </div>
        <div style="margin: 4px 0 0 2px;">
            <a href="{{url('layanan/konfirmasi-zakat')}}" >
                <img src="{{asset('images/icon-konfirmasi.png')}}" style="height:75px;float:left" data-toggle="tooltip" title="Konfirmasi Zakat" data-placement="right" class="tooltips">
            </a>
        </div>
    </div>

    <!-- ======================= JQuery libs =========================== -->
    <!-- local copy of jquery. -->       
    @include('include.script')
    <!-- ======================= End JQuery libs =========================== -->
</body>
</html>
<script type="text/javascript">
    $('.tooltips').tooltip();
    var APP_URL = {!! json_encode(url('/')) !!}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<style>
/* #div_side:hover {
  width: 250px;
} */
#div_side {
    clear: both;
    position: fixed;
    top: 300px;
    width: 80px;
    height: 160px;
    border-top: 1px solid #111;
    border-bottom: 1px solid #111;
    border-right: 1px solid #111;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    -moz-border-radius-topright: 10px;
    -moz-border-radius-bottomright: 10px;
    -webkit-border-top-right-radius: 10px;
    -webkit-border-bottom-right-radius: 10px;
    -webkit-box-shadow: 3px 5px 18px #aaa;
    background: #eeeeee;
    transition: width 0.5s;
    -webkit-transition: width 0.5s;
}
</style>
@yield('footscript')

<script type="text/javascript">
        var LHCChatOptions = {};
        LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500,domain:'baznaskotabogor.or.id'};
        (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
        var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
        po.src = '//chat.baznaskotabogor.or.id/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true?r='+referrer+'&l='+location;
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
</script>