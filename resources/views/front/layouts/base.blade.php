<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @include('front.includes.head')
    
</head>

<body id="topbody">
                    
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=118442102066';
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!--//================preloader  start==============//--> 
        {{-- <div class="preloader">
            <div class="cssload-container">
                <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
            </div>
        </div> --}}
        @include('front.includes.navbar',['kontak'=>$kontak,'st'=>$st])
        <div class="clear"></div>	
        <!-- Start of slider area -->
        @yield('slider')
        {{--  @include('front.includes.slider')  --}}
        <div class="clear"></div>
        <!-- End of slider area -->
        <!-- Start page content -->
        @yield('content')
        <!-- End page content -->
        <!-- Start footer area -->
        @if(isset($getinstagram))
            @include('front.includes.footer',['getinstagram'=>$getinstagram])
        @else
            @include('front.includes.footer')
        @endif
        <!-- End footer area -->
        <!-- start scrollUp
        ============================================ -->
       
        <a id="scroll-top" class="" href="#topbody" style="margin-bottom:40px;"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
    <!-- Body main wrapper end -->

    @include('front.includes.footscript')

    @yield('pagescript')
        
        <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
            $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        </script>
        
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
                    
</body>

</html>
