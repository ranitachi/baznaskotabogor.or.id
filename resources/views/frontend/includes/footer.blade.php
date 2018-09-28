<footer class="footer-area">
            <div class="footer-top ptb-30 navy-bg footer-two2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="footer-logo-address">
                                <div class="footer-address">
                                    <div class="header-top-info">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="icofont icofont-ui-call"></i>
                                                    Telp / Fax  (021)-7884-9047 / 786-3508
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icofont icofont-envelope"></i>
                                                    ccit@eng.ui.ac.id
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icofont icofont-location-pin"></i>
                                                    Gedung Enginering Center FTUI Lantai 1 Kampus Baru UI Depok 16424
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($getinstagram)!=0)
                            <div class="col-md-4 col-sm-6">
                        @else
                            <div class="col-md-5 col-sm-6">
                        @endif
                            <div class="footer-2">
                                <a href="#" style="font-size: 30px; color: #f8b239;">
                                  <strong>
                                    CEP CCIT FTUI
                                  </strong>
                                </a>
                                <div class="footer-text-all">
                                    <p>CEP-CCIT FTUI adalah unit usaha dibawah naungan Fakultas Teknik Universitas Indonesia yang bergerak di bidang pendidikan teknologi informasi dan sertifikasi internasional.</p>
                                </div>
                                <div class="footer-2-social">
                                    <ul style="list-style:none;">
                                      <li><a href="https://web.facebook.com/ccit.ftui"><i class="icofont icofont-social-facebook"></i></a></li>
                                      <li><a href="https://twitter.com/CCIT_FTUI"><i class="icofont icofont-social-twitter"></i></a></li>
                                      <li><a href="https://www.instagram.com/ccit_ftui/"><i class="icofont icofont-social-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if(count($getinstagram)!=0)
                            <div class="col-md-3 col-sm-6">
                        @else
                            <div class="col-md-5 col-sm-6">
                        @endif
                            <div class="footer-text mrg-xs ft22">
                                <h3>Pengumuman Terbaru</h3>
                                <div class="middle-mgn">
                                  @php
                                    $limit = 2;
                                    $count = 0;
                                  @endphp
                                  @foreach ($berita as $key)
                                    <div class="img-text-both">
                                      <div class="img-both">
                                        <a href="{{ route('front.detailberita', $key->id) }}">
                                          @if (is_null($key->file) || !file_exists(asset($key->file)))
                                            <img alt="" src="{{ asset('frontend/images/ccit-img-berita.png') }}" style="width:66px;height:66px;">
                                          @else
                                            @php
                                            $getthumb = explode('/', $key->file);
                                            $thumb = $getthumb[1].'/'.$getthumb[2]."/thumbs/".$getthumb[3];
                                            @endphp
                                            <img alt="" src="{{ asset('/') }}{{ $thumb }}" style="width:66px;height:66px;">
                                          @endif
                                        </a>
                                      </div>
                                      <div class="text-both">
                                        <h3><a href="{{ route('front.detailberita', $key->id) }}">{{ $key->title }}</a></h3>
                                      </div>
                                    </div>
                                    <br>
                                    <br>
                                    @php
                                      $count++;
                                    @endphp
                                    @if ($count==$limit)
                                      @php
                                        break;
                                      @endphp
                                    @endif
                                  @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="footer-text mrg-xs ft22 tfp7">
                                <h3>Profile CCIT</h3>
                                <ul class="footer-text-all" style="list-style-type: none;">
                                    <li><a href="{{ route('front.sejarah') }}"><i class="icofont icofont-caret-right"></i> Sejarah</a></li>
                                    <li><a href="{{ route('front.visimisi') }}"><i class="icofont icofont-caret-right"></i> Visi Misi</a></li>
                                    <li><a href="{{ route('front.organisasi') }}"><i class="icofont icofont-caret-right"></i> Struktur Organisasi</a></li>
                                    <li><a href="{{ route('front.kurikulum') }}"><i class="icofont icofont-caret-right"></i> Kurikulum</a></li>
                                    <li><a href="{{ route('front.staff') }}"><i class="icofont icofont-caret-right"></i> Staff</a></li>
                                </ul>
                            </div>
                        </div>
                        @if(count($getinstagram)!=0)
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-text mrg-sm3 mrg-xs">
                                <h3>Instagram Photo</h3>
                                    <div class="footer-instagram">
                                        @if(count($getinstagram)!=0)
                                            @php
                                                $count=0;
                                            @endphp
                                            @foreach($getinstagram as $item)
                                                <div class="img-one">
                                                    <a href="https://instagram.com/ccit_ftui" target="_blank">
                                                        <img src="{{ $item }}" width="66px">
                                                    </a>
                                                </div>
                                                @php
                                                    $count++;
                                                    if ($count==9) {
                                                        break;
                                                    }
                                                @endphp
                                            @endforeach
                                        @endif
                                    <div id="instafeed"></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="footer-bottom-text ptb-20">
                                <p>
                                    Copyrights © <a> 2017 CEP CCIT FTUI</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>