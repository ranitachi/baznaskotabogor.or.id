<header id="header">
			<div class="top-bar theme-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 left">
                            <ul>								
								<li><a><i class="fa fa-phone"></i> {{count($kontak)!=0 ? $kontak[0]->telepon : ''}}</a></li>	
								<li><a href="#"><i class="fa fa-envelope"></i> {{count($kontak)!=0 ? $kontak[0]->email : ''}}</a></li>							
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 right">
                            <ul>
								<li>Follow us :</li>
								<li><a href="{{count($kontak)!=0 ? $kontak[0]->facebook : '#'}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{count($kontak)!=0 ? $kontak[0]->twitter : '#'}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{count($kontak)!=0 ? $kontak[0]->instagram : '#'}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
         <div id="main-menu" class="wa-main-menu sticky-nav">
            <!-- Menu -->
            <div class="wathemes-menu relative">
               <!-- navbar -->
               <div class="navbar navbar-default mar0" role="navigation">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-12 head-box">
                        
                           <div class="navbar-header">
                              <!-- Button For Responsive toggle -->
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                              <span class="sr-only">Toggle navigation</span> 
                              <span class="icon-bar"></span> 
                              <span class="icon-bar"></span> 
                              <span class="icon-bar"></span>
                              </button> 
                              <!-- Logo -->
                              <a class="navbar-brand" href="{{URL::to('/')}}">
                              <img class="site_logo" alt="Site Logo"  src="{{asset('images/logo/logo.png')}}"/>
                              </a>
                           </div>
                           <!-- Navbar Collapse -->
                           <div class="navbar-collapse collapse" style="margin-top:40px;">
                              <!-- nav -->
                              <ul class="nav navbar-nav">
                                 <li><a href="{{$st==0 ? '#topbody' : URL::to('/')}}">Beranda</a></li>
                                 <li><a href="{{$st==0 ? '#profil' : URL::to('/profil')}}">Profil</a></li>
                                 <li><a href="{{$st==0 ? '#services' : URL::to('/program/list/-')}}">Program</a></li>
                                 <li><a href="{{$st==0 ? '#testimonial' : URL::to('/layanan/list')}}">layanan</a></li>
                                 {{--  <li><a href="#rekening">Rekening</a></li>  --}}
                                 <li><a href="{{$st==0 ? '#galeri' : URL::to('/gallery')}}">Galeri</a></li>
                                 <li><a href="{{$st==0 ? '#our_blog' : URL::to('/berita/list')}}">Artikel & Berita</a></li>
                                 <li><a href="{{$st==0 ? '#contact_us' : URL::to('/kontak')}}">Kontak</a></li>
                              </ul>
                           </div>
                           <!-- navbar-collapse -->
                        </div>
                        <!-- col-md-12 -->
                     </div>
                     <!-- row -->
                  </div>
                  <!-- container -->
               </div>
               <!-- navbar -->
            </div>
            <!--  Menu -->
         </div>
      </header>