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


    <!-- ======================= JQuery libs =========================== -->
    <!-- local copy of jquery. -->       
    @include('include.script')
    <!-- ======================= End JQuery libs =========================== -->
</body>
</html>
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
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