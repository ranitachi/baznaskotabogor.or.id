<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Zakat Profesi</a></li>
    {{-- <li><a data-toggle="tab" href="#menu1">Zakat Perdagangan/Usaha</a></li> --}}
    {{-- <li><a data-toggle="tab" href="#menu2">Zakat Harta Simpanan</a></li> --}}
  </ul>

  <div class="tab-content" style="padding:10px;">
    <div id="home" class="tab-pane fade in active">
      <h2>Zakat Profesi</h2>
      <p>
        <div style="width:100%;float:left;margin-bottom:15px;font-size:14px">
           <div style="width:49%;float:left;font-size:14px">Harga Emas Saat Ini Rp&nbsp;<input type="text" id="emas" name="emas" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:35%;margin:0px;border:1px solid #990000;" onkeyup="calc_profesi('emas')" placeholder="0"></div>
           <div style="width:49%;float:right;font-size:14px">NISAB -  Rp&nbsp;<input type="text" id="nisab" name="nisab" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:65%;margin:0px;border:1px solid #990000;background:#ffeddc"  placeholder="0" readonly="readonly"></div>
       </div>
        <div style="width:100%;float:left;margin-bottom:15px;font-size:14px">
           <div style="width:65%;float:left;font-size:14px">a. Pendapatan / Gaji per Bulan (setelah dipotong pajak)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="prof1" name="prof1" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;" onkeyup="calc_profesi('prof1')" placeholder="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:14px">
           <div style="width:65%;float:left;font-size:14px">b. Bonus/pendapatan lain-lain selama setahun</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="prof2" name="prof2" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;" onkeyup="calc_profesi('prof2')" placeholder="0"></div>
       </div>

       <div style="width:100%;float:left;margin-bottom:15px;font-size:14px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;">C. Jumlah Pendapatan per Tahun</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="prof4" name="prof4" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" readonly="readonly" placeholder="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:14px">
           <div style="width:65%;float:left;font-size:14px">d. Rata-rata pengeluaran rutin per bulan (kebutuhan fisik, air, listrik, pendidikan, kesehatan, transportasi, dll)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="prof5" name="prof5" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;" onkeyup="calc_profesi('prof5')" placeholder="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:14px">
           <div style="width:65%;float:left;font-size:14px">e. Pengeluaran lainnya dalam satu tahun (pendidikan, kesehatan, dll)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="prof6" name="prof6" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;" onkeyup="calc_profesi('prof6')" placeholder="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:14px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;">F. Jumlah Pengeluaran per Tahun (12 x d + e)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="prof7" name="prof7" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" readonly="readonly" placeholder="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:14px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;" readonly="readonly" placeholder="0">G. Penghasilan kena zakat (C - F , jika &gt; nisab)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="prof8" name="prof8" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" placeholder="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:14px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;">H.  JUMLAH ZAKAT PROFESI YANG WAJIB DIBAYARKAN PER TAHUN (2,5% x G)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="prof9" name="prof9" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" placeholder="0"></div>
       </div>
      </p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h2>Zakat Perdagangan/Usaha</h2>
      
      <p>
        <div style="width:100%;float:left;margin-bottom:15px;font-size:11px">
           <div style="width:65%;float:left;font-size:14px">a. Nilai Kekayaan Perusahaan (termasuk uang tunai, simpanan di bank, real estate, alat produksi, inventori, barang jadi, dll)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="usaha1" name="usaha1" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" onchange="calc_usaha()" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px">
           <div style="width:65%;float:left;font-size:14px">b. Utang perusahaan jatuh tempo</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="usaha2" name="usaha2" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" onchange="calc_usaha()" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px">
           <div style="width:65%;float:left;font-size:14px">c. Komposisi Kepemilikan (dalam persen)</div>
           <div style="width:25%;float:right;text-align:right;margin-right:40px;"><input type="text" id="usaha3" name="usaha3" style="padding:5px;font-size:11px;text-align:right;width:50px;margin:0px;border:1px solid #990000" onchange="calc_usaha()" value="100">&nbsp;%</div>
       </div>

       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;">D. Jumlah Bersih Harta Usaha (c % * [a-b])</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="usaha4" name="usaha4" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddcbackground:#ffeddc" readonly="readonly" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;">E. Harta usaha kena zakat (D, jika &gt;  nisab)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="usaha5" name="usaha5" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddcbackground:#ffeddc" readonly="readonly" value="0"></div>
       </div>

       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;">F.  JUMLAH ZAKAT ATAS HARTA USAHA YANG WAJIB DIBAYARKAN PER TAHUN (2,5% X E)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="usaha6" name="usaha6" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddcbackground:#ffeddc" value="0"></div>
       </div>
      </p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h2>Zakat Harta Simpanan</h2>
      <p>
          <div style="width:100%;float:left;margin-bottom:15px;font-size:14px">
           <div style="width:49%;float:left;font-size:14px">Harga Emas Saat Ini Rp&nbsp;<input type="text" id="emass" name="emass" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:35%;margin:0px;border:1px solid #990000;" onkeyup="calc_profesi('emass')" placeholder="0"></div>
           <div style="width:49%;float:right;font-size:14px">NISAB -  Rp&nbsp;<input type="text" id="nisab" name="nisab" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:65%;margin:0px;border:1px solid #990000;background:#ffeddc"  placeholder="0" readonly="readonly"></div>
       </div>
      </p>
      <p>
        <div style="width:100%;float:left;margin-bottom:15px;font-size:11px">
           <div style="width:65%;float:left;font-size:14px">a. Uang Tunai, Tabungan, Deposito atau sejenisnya</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="simp1" name="simp1" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" onchange="calc_simpanan()" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px">
           <div style="width:65%;float:left;font-size:14px">b. Saham atau surat-surat berharga lainnya</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="simp2" name="simp2" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" onchange="calc_simpanan()" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px">
           <div style="width:65%;float:left;font-size:14px">c. Real Estate (tidak termasuk rumah tinggal yang dipakai sekarang)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="simp3" name="simp3" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" onchange="calc_simpanan()" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px">
           <div style="width:65%;float:left;font-size:14px">d. Emas, Perak, Permata atau sejenisnya</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="simp4" name="simp4" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" onchange="calc_simpanan()" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px">
           <div style="width:65%;float:left;font-size:14px">e. Mobil (lebih dari keperluan pekerjaan anggota keluarga)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="simp5" name="simp5" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" onchange="calc_simpanan()" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;">F. Jumlah Harta Simpanan (a+b+c+d+e)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="simp6" name="simp6" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddcbackground:#ffeddc" readonly="readonly" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px">
           <div style="width:65%;float:left;font-size:14px">g. Hutang Pribadi yg jatuh tempo dalam tahun ini</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="simp7" name="simp7" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddc" onchange="calc_simpanan()" value="0"></div>
       </div>
       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;">H. Harta simpanan kena zakat(F-g, jika &gt; nisab)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="simp8" name="simp8" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddcbackground:#ffeddc" readonly="readonly" value="0"></div>
       </div>

       <div style="width:100%;float:left;margin-bottom:15px;font-size:11px;">
           <div style="width:65%;float:left;font-size:14px;background:#ddd;font-weight:bold;">I.  JUMLAH ZAKAT ATAS SIMPANAN YANG WAJIB DIBAYARKAN PER TAHUN (2,5% x h)</div>
           <div style="width:34%;float:right;">Rp&nbsp;<input type="text" id="simp9" name="simp9" style="font-size:12px;text-align:right;padding:3px 5px  !important;height:30px !important;width:85%;margin:0px;border:1px solid #990000;background:#ffeddcbackground:#ffeddc" value="0"></div>
       </div>
      </p>
    </div>
  </div>