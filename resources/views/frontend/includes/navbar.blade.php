<header class="header-area">
    <div class="header-top navy-bg ptb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="header-top-info">
                        <ul>
                            <li>
                                <a>
                                    <i class="icofont icofont-ui-call"></i>
                                    Telp/Fax : (021)-7884-9047 / 786-3508
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="icofont icofont-envelope"></i>
                                    ccit@eng.ui.ac.id
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 hidden-xs">
                    <div class="header-top-right f-right">
                        <div class="header-top-social f-right">
                            <p>Follow Us &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</p>
                            <ul>
                                <li><a href="https://web.facebook.com/ccit.ftui" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
                                <li><a href="https://twitter.com/CCIT_FTUI" target="_blank"><i class="icofont icofont-social-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/ccit_ftui/" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom stick-h2">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="logo">
                        <a href="{{ route('front.beranda') }}"><img src="{{ asset('frontend/images/logo/logoccit.png') }}" alt=""> </a>
                    </div>
                </div>
                <div class="col-md-10 hidden-sm hidden-xs">
                    <div class="menu-area f-right">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{ route('front.beranda') }}">BERANDA  </a></li>
                                <li class="level-menu"><a href="#">PROFIL <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    <ul class="tas">
                                        <li><a href="{{ route('front.sejarah') }}">Sejarah</a></li>
                                        <li><a href="{{ route('front.visimisi') }}">Visi Misi</a></li>
                                        <li><a href="{{ route('front.organisasi') }}">Struktur Organisasi</a></li>
                                        <li><a href="{{ route('front.kurikulum') }}">Kurikulum</a></li>
                                        <li><a href="{{ route('front.staff') }}">Staff</a></li>
                                        <li>
                                          <a href="#">Aliansi <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            <ul class="tas">
                                              <li><a href="{{ route('front.nasional') }}">Nasional</a></li>
                                              <li><a href="{{ route('front.internasional') }}">Internasional</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('front.kontak') }}">Hubungi Kami</a></li>
                                        <li><a href="{{ route('front.faq') }}">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="coloumn-one"><a href="#">AKADEMIK <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    <ul>
                                        <li>
                                          <a href="#">Konsentrasi Program <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            <ul class="tas">
                                              @foreach ($jurusan as $key)
                                                <li><a href="{{ route('front.jurusan', $key->id) }}">{{ $key->nama_jurusan }}</a></li>
                                              @endforeach
                                            </ul>
                                        </li>
                                        <li>
                                          <a href="#">Aturan Akademik <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            <ul class="tas">
                                              <li><a href="{{ route('front.himpunan') }}">Himpunan Peraturan Akademik</a></li>
                                              <li><a href="{{ route('front.kalender') }}">Kalender Akademik</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="coloumn-one"><a href="#">PENERIMAAN <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    <ul>
                                        <li><a href="{{ route('front.proses-penerimaan') }}">Proses Penerimaan</a></li>
                                        <li><a href="{{ route('front.informasi-penerimaan') }}">Informasi Penerimaan</a></li>
                                        <li><a href="{{ route('front.pendaftaran') }}">Pendaftaraan Online</a></li>
                                        <li><a href="{{ route('exam.index') }}">Simulasi Ujian</a></li>
                                    </ul>
                                </li>
                                <li class="coloumn-one"><a href="#">PESERTA DIDIK <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    <ul>
                                        <li><a href="{{ route('front.prestasi') }}">Prestasi</a></li>
                                        <li><a href="{{ route('front.komunitas') }}">Komunitas</a></li>
                                        <li><a href="{{ route('front.beasiswa') }}">Beasiswa</a></li>
                                    </ul>
                                </li>
                                <li class="coloumn-one"><a href="#">ALUMNI <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    <ul>
                                        <li><a href="{{ route('front.testimoni') }}">Testimoni</a></li>
                                        <li><a href="{{ route('front.berita-alumni') }}">Berita Alumni</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('front.gallery') }}">GALLERY</a></li>
                                <li><a href="{{ route('front.event') }}">EVENT</a></li>
                                <li><a href="{{ route('front.karir') }}">KARIR</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- mobile-menu-area start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                      <ul>
                          <li class="active"><a href="{{ route('front.beranda') }}">BERANDA  </a></li>
                          <li class="level-menu"><a href="#">PROFIL <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                              <ul class="tas">
                                  <li><a href="{{ route('front.sejarah') }}">Sejarah</a></li>
                                  <li><a href="{{ route('front.visimisi') }}">Visi Misi</a></li>
                                  <li><a href="{{ route('front.organisasi') }}">Struktur Organisasi</a></li>
                                  <li><a href="{{ route('front.kurikulum') }}">Kurikulum</a></li>
                                  <li><a href="{{ route('front.staff') }}">Staff</a></li>
                                  <li>
                                    <a href="#">Aliansi <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                      <ul class="tas">
                                        <li><a href="{{ route('front.nasional') }}">Nasional</a></li>
                                        <li><a href="{{ route('front.internasional') }}">Internasional</a></li>
                                      </ul>
                                  </li>
                                  <li><a href="{{ route('front.kontak') }}">Hubungi Kami</a></li>
                              </ul>
                          </li>
                          <li class="coloumn-one"><a href="#">AKADEMIK <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                              <ul>
                                  <li>
                                    <a href="#">Konsentrasi Program <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                      <ul class="tas">
                                        @foreach ($jurusan as $key)
                                          <li><a href="{{ route('front.jurusan', $key->id) }}">{{ $key->nama_jurusan }}</a></li>
                                        @endforeach
                                      </ul>
                                  </li>
                                  <li>
                                    <a href="#">Aturan Akademik <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                      <ul class="tas">
                                        <li><a href="{{ route('front.himpunan') }}">Himpunan Peraturan Akademik</a></li>
                                        <li><a href="{{ route('front.kalender') }}">Kalender Akademik</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </li>
                          <li class="coloumn-one"><a href="#">PENERIMAAN <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                              <ul>
                                  <li><a href="{{ route('front.proses-penerimaan') }}">Proses Penerimaan</a></li>
                                  <li><a href="{{ route('front.informasi-penerimaan') }}">Informasi Penerimaan</a></li>
                                  <li><a href="{{ route('front.pendaftaran') }}">Pendaftaraan Online</a></li>
                                  <li><a href="{{ route('exam.index') }}">Simulasi Ujian</a></li>
                              </ul>
                          </li>
                          <li class="coloumn-one"><a href="#">PESERTA DIDIK <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                              <ul>
                                  <li><a href="{{ route('front.prestasi') }}">Prestasi</a></li>
                                  <li><a href="{{ route('front.komunitas') }}">Komunitas</a></li>
                                  <li><a href="{{ route('front.beasiswa') }}">Beasiswa</a></li>
                              </ul>
                          </li>
                          <li class="coloumn-one"><a href="#">ALUMNI <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                              <ul>
                                  <li><a href="{{ route('front.testimoni') }}">Testimoni</a></li>
                                  <li><a href="{{ route('front.berita-alumni') }}">Berita Alumni</a></li>
                              </ul>
                          </li>
                          <li><a href="{{ route('front.gallery') }}">GALLERY</a></li>
                          <li><a href="{{ route('front.event') }}">EVENT</a></li>
                          <li><a href="{{ route('front.karir') }}">KARIR</a></li>
                      </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu-area end -->
<!-- End of header area -->
