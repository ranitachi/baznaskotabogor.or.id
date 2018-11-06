<div class="row">
    <div class="col-xs-12">                
                <div id="halaman-content">			
						<form id="validasi" class="form_donasi_online"  method="post" autocomplete="on" novalidate="">

							<div class="row"><!-- row donasi -->

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
                                                        <select name="donasi_1" class="form-control" id="donasi_1" data-parsley-id="2550">
                                                            <option value="Zakat">Zakat</option>
                                                            <option value="Infak / Sedekah">Infak / Sedekah</option>
                                                            <option value="Kemanusiaan">Kemanusiaan</option>			
                                                        </select>
                                                        <ul class="parsley-errors-list" id="parsley-id-2550"></ul>
                                                    </div>
                                                </div>


                                                <!-- Keterangan -->
                                                <div class="form-group">
                                                  <label class="col-sm-5 control-label">Keterangan donasi</label>
                                                    <div class="col-sm-7">
                                                        <textarea name="keterangan" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label" for="Jumlah (Rp.)">Jumlah (Rp.) <span class="text-red">*</span></label>
                                                    <div class="col-sm-7">
                                                    <input type="number" class="form-control amount" name="Amount" value="0" required="required" min="10000" max="24500000" data-parsley-id="8960"><ul class="parsley-errors-list" id="parsley-id-8960"></ul>
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
                                                    <select name="sapaan" class="form-control" data-parsley-id="0214">
                                                        <option value="Bapak">Bapak</option><option value="Ibu">Ibu</option><option value="Saudara">Saudara</option><option value="Saudari">Saudari</option>												</select><ul class="parsley-errors-list" id="parsley-id-0214"></ul>
                                                </div>
                                            </div>

                                            <!-- Nama lengkap -->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Nama Lengkap <span class="text-red">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="nama_depan" class="form-control" value="" required="required" data-parsley-id="8668"><ul class="parsley-errors-list" id="parsley-id-8668"></ul>
                                                </div>
                                            </div>

                                            <!-- email -->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Email <span class="text-red">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="email" name="UserEmail" class="UserEmail form-control" value="" required="required" data-parsley-id="1557"><ul class="parsley-errors-list" id="parsley-id-1557"></ul>
                                                </div>
                                            </div>

                                            <!-- telp / hp -->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Telepon / HP <span class="text-red">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="UserContact" class="UserContact form-control" value="" required="required" data-parsley-id="4063"><ul class="parsley-errors-list" id="parsley-id-4063"></ul>
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
												<li class="active">
													<a data-toggle="tab" href="#banktransfer">Transfer Bank</a>
												</li>
												<li>
													<a data-toggle="tab" href="#online">Online Payment</a>
												</li>
											</ul>

											<div class="tab-content">
												<div id="banktransfer" class="tab-pane fade in active">
													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="21" checked="checked" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-bca.png')}}">
														</label><ul class="parsley-errors-list" id="parsley-id-multiple-PaymentId"></ul>
													</div>

													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="22" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-mandiri.png')}}">
														</label>
													</div>

													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="23" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-bni.png')}}">
														</label>
													</div>

													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="24" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-muamalat.png')}}">
														</label>
													</div>

																									</div>

												<div id="online" class="tab-pane fade">
													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="11" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-cimb-clicks.png')}}">
														</label>
													</div>

													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="1" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-visa-master-card.png')}}">
														</label>
													</div>

													
													<div class="radio radio-metode-donasi">
														<label>
														<input type="radio" class="PaymentId" name="PaymentId" value="14" data-parsley-multiple="PaymentId" data-parsley-id="1953">
														<img src="{{asset('images/logo/logo-ib-muamalat.png')}}">
														</label>
													</div>

																									</div>
											</div>
									</div>

									<div class="panel-footer">
						   				<input type="hidden" id="submit_form" name="submit_form" value="b47d224de7"><input type="hidden" name="_wp_http_referer" value="/">										<input type="submit" class="btn btn-block btn-lg btn-warning" value="Donasi Sekarang !">
									</div>

									</div><!-- End panel -->

								</div><!-- end metode pembayaran -->

							</div><!-- end row -->
						</form>

                    </div>
            </div>
        </div>
                    
