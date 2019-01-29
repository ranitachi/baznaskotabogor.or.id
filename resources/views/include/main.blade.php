           <!-- Main title -->
       
                <!-- Main Name -->
                <div class="main_name fadeInDown animated delay1">
                    <div class="container" style="width:1200px">
                        @include('include.menu')
                    </div>
                </div>
                <!-- end Main Name -->

            <div class="flexslider">
                <ul class="slides">
                    @foreach ($getslider as $i=>$v)
                        
                    
                    <li class="bg-img bg-img-1 slider-1" style="background-image:url('{{asset($v->picture)}}') !important;background-repeat: no-repeat !important;background-size: cover !important;width: 100% !important;height: 100vh !important;position: relative;">
                       <div class="style_one">
                            <div class="container">
                                <div class="row" style="min-height:400px;">     
                                    <div class="col-md-6">
                                        <h1 class="animated bounceInRight delay1" style="">
                                            {{$v->title}}
                                        </h1>
                                        <p class="lead animated bounceInUp delay2">{{$v->desc}}</p>
                                    </div>                                    
                                </div>  
                            </div>                                                                                         
                        </div>
                    </li>
                    @endforeach  

                </ul>
            </div>   
                <!--  Bar done -->
                <div class="done_info fadeInUp animated delay2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="box">
                                        &nbsp;
                                        <br>
                                        &nbsp;
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- @include('include.head') --}}
                    </div>
                </div>
                <!--  end Bar done -->

    