<div class="row">
    <div class="col-xs-12">                
                <div id="halaman-content">			
				<form id="form-donasi" class="form_donasi_online"  method="post" autocomplete="on" novalidate="" action="{{url('donasi-zakat')}}">
							@csrf
							<div class="row"><!-- row donasi -->
								<input type="hidden" name="id_donasi" value="{{time()}}">
								<div class="col-md-6 col-xs-12">

									<noscript>
                                        <div class="alert alert-warning">
                                            <p>Broser Anda tidak support Javascript, untuk hasil maksimal, gunakan browser yang mendukung javascript, seperti Google Chrome, Mozilla Firefox, atau Internet Explorer.</p>
                                        </div>
									</noscript>

                                    <!-- Pilihan Donasi -->
                                    <div class="panel panel-success">

										<div class="panel-heading">Pilih Donasi</div>

										<div class="panel-body">
                                            <div class="form-horizontal form-green" role="form" style="">
                                                <fieldset>
                                                

                                                <!-- Jenis Donasi -->
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Jenis Donasi <span class="text-red">*</span></label>
                                                    <div class="col-sm-7">
                                                        <select name="jenis_donasi" class="form-control" id="jenis_donasi" data-parsley-id="2550">
                                                            <option value="Zakat">Zakat</option>
                                                            <option value="Infak / Sedekah">Infak / Sedekah</option>
                                                            {{-- <option value="Kemanusiaan">Kemanusiaan</option>			 --}}
                                                        </select>
                                                        <ul class="parsley-errors-list" id="parsley-id-2550"></ul>
                                                    </div>
                                                </div>


                                                <!-- Keterangan -->
                                                <div class="form-group">
                                                  <label class="col-sm-5 control-label">Keterangan donasi</label>
                                                    <div class="col-sm-7">
                                                        <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label" for="Jumlah (Rp.)">Jumlah (Rp.) <span class="text-red">*</span></label>
                                                    <div class="col-sm-7">
                                                    <input type="text" class="form-control amount" name="jlh_donasi" placeholder="0" required="required" min="10000" id="jlh_donasi"><ul class="parsley-errors-list" id="parsley-id-8960"></ul>
                                                    <span class="help-block">Minimal : 10000</span>
                                                    </div>
                                                </div>

                                                </fieldset>
                                            </div><!-- End pilihan donasi -->
                                        </div>
                                        <div class="form-horizontal form-green" role="form" style="padding-right:15px;">
                                            <fieldset>
                                            <legend style="padding:0 10px;font-size:15px;font-weight:bold">Profil Donatur</legend>

                                            <!-- sapaan -->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Sapaan <span class="text-red">*</span></label>
                                                <div class="col-sm-7">
                                                    <select name="sapaan" class="form-control" id="sapaan">
                                                        <option value="Bapak">Bapak</option><option value="Ibu">Ibu</option><option value="Saudara">Saudara</option><option value="Saudari">Saudari</option>												</select><ul class="parsley-errors-list" id="parsley-id-0214"></ul>
                                                </div>
                                            </div>

                                            <!-- Nama lengkap -->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Nama Lengkap <span class="text-red">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="nama_lengkap" class="form-control" value="" required="required" id="nama_lengkap"><ul class="parsley-errors-list" id="parsley-id-8668"></ul>
                                                </div>
                                            </div>

                                            <!-- email -->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Email <span class="text-red"></span></label>
                                                <div class="col-sm-7">
                                                    <input type="email" name="email" class="UserEmail form-control" value="" id="email" ><ul class="parsley-errors-list" id="parsley-id-1557"></ul>
                                                </div>
                                            </div>

                                            <!-- telp / hp -->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">No HP <span class="text-red">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="hp" class="UserContact form-control" value="" required="required" id="hp"><ul class="parsley-errors-list" id="parsley-id-4063"></ul>
                                                </div>
                                            </div>

                                           

                                            </fieldset>
                                        </div><!-- end profil donatur -->
                                    </div>


									<!-- Profil Donatur -->
									
								</div>


								<!-- Metode pembayaran -->
								<div class="col-md-6 col-xs-12">

									<div class="panel panel-success">

										<div class="panel-heading">Silahkan pilih metode pembayaran :</div>

										<div class="panel-body">

											<ul class="nav nav-tabs">
												{{-- <li class="active">
													<a data-toggle="tab" href="#banktransfer" style="font-size:10px;">Transfer Bank</a>
												</li> --}}
												<li class="active">
													<a data-toggle="tab" href="#virtual" style="font-size:10px;">Virtual Account</a>
												</li>
												<li>
													<a data-toggle="tab" href="#online" style="font-size:10px;">Online Payment</a>
												</li>
											</ul>

											<div class="tab-content">
												{{-- <div id="banktransfer" class="tab-pane fade in active">
													@php
														$bank=\App\Models\Bank::where('kategori','zakat')->get();
													@endphp
													@foreach ($bank as $item)
														@php
															if(strpos($item->nama_bank,'BCA')!==false)
																$img='logo-bca.png';
															elseif(strpos($item->nama_bank,'BNI Syariah')!==false)
																$img='bni-syariah.jpg';
															elseif(strpos($item->nama_bank,'Syariah Mandiri')!==false)
																$img='logo-bank-mandiri-syariah.png';
															elseif(strpos($item->nama_bank,'Bank Mandiri')!==false)
																$img='logo-mandiri.png';
															elseif(strpos($item->nama_bank,'Bank BNI')!==false)
																$img='logo-bni.png';
															elseif(strpos($item->nama_bank,'BJB')!==false)
																$img='bjb-syariah.png';
														@endphp
														<div class="radio radio-metode-donasi">
															<label>
																<input type="radio" class="PaymentId" name="PaymentId" value="transfer-{{$item->id}}" data-parsley-multiple="PaymentId" data-parsley-id="1953">
																<img src="{{asset('images/logo/'.$img)}}">
															</label>
															<ul class="parsley-errors-list" id="parsley-id-multiple-PaymentId"></ul>
														</div>
													@endforeach
												</div> --}}
												<div id="virtual" class="tab-pane fade in active">
													
													<div class="radio radio-metode-donasi">
														<label>
															<input type="radio" class="PaymentId" name="PaymentId" value="BT" data-parsley-multiple="PaymentId" data-parsley-id="1953">
															<img src="{{asset('images/logo/logo-permata.jpg')}}">
														</label>
														<ul class="parsley-errors-list" id="parsley-id-multiple-PaymentId"></ul>
													</div>

													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="B1" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-cimb-niaga.jpg')}}">
														</label>
													</div>

													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="I1" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-bni.png')}}">
														</label>
													</div>
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="VA" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/maybank.jpg')}}">
														</label>
													</div>

													
													{{-- <div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="I2" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/bank-danamon.png')}}">
														</label>
													</div> --}}

												</div>

												<div id="online" class="tab-pane fade">
													
													{{-- <div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="CK" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-cimb-clicks.png')}}">
														</label>
													</div> --}}

													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="VC" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-visa-master-card.png')}}">
														</label>
													</div>

													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="BK" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/icon-bca-klikpay.png')}}">
														</label>
													</div>
													{{-- <div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="MY" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/mandiri-clickpay.png')}}">
														</label>
													</div> --}}
													{{-- <div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="OV" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/ovo.jpg')}}">
														</label>
													</div> --}}

												</div>
											</div>
									</div>

									<div class="panel-footer">
						   				<input type="button" id="btn-donasi" class="btn btn-block btn-lg btn-warning" value="Donasi Sekarang !">
									</div>

									</div><!-- End panel -->

								</div><!-- end metode pembayaran -->

							</div><!-- end row -->
						</form>

                    </div>
            </div>
		</div>


                    
<style>
.text-red
{
	color:red !important;
}
</style>