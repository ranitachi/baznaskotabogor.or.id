<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\FormPendaftaran;
use App\Models\Jurusan;
use App\Models\Konfirmasi;
use App\Models\AccountDaftar;
use DB;
use Hash;
class PendaftaranController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      return view('backend.pages.pendaftaran.index');
    }
    public function data($id=-1)
    {
      $data['id']=$id;
      $j=Jurusan::all();
      $jur=array();
      foreach ($j as $k => $v) {
        $jur[$v->id]=$v;
      }
      $data['jur']=$jur;

      $kn=Konfirmasi::all();
      $kon=array();
      foreach ($kn as $k => $v) {
        $kon[$v->id_pendaftaran]=$v;
      }
      $data['kon']=$kon;

      $d=FormPendaftaran::orderBy('created_at','desc')->get();
      $data['data']=$d;
      return view('backend.pages.pendaftaran.data',$data);
    }
    public function form($id=-1)
    {
      $data['id']=$id;
      if($id!=-1)
      {
        $det=DB::table('form_pendaftaran')
                      ->join('account_daftar','form_pendaftaran.id','=','account_daftar.id_daftar')
                      ->join('konfirmasi','konfirmasi.id_pendaftaran','=','form_pendaftaran.id')
                      ->select('konfirmasi.id as kid','form_pendaftaran.*','account_daftar.id as aid','account_daftar.*','konfirmasi.*')
                      ->get();
        $data['det']=$det[0];
      }
      $j=Jurusan::all();
      $jur=array();
      foreach ($j as $k => $v) {
        $jur[$v->id]=$v;
      }
      $data['jurusan']=$jur;
      $data['jenis']=array("Transfer ATM","Mobile/Internet Banking","Setor Tunai");
      $data['bank']=array("Bukopin","BCA","Mandiri","Syariah Mandiri","Muammalat","BNI","BRI","CIMB Niaga","lainnya");
      $data['sumber']=array("Poster/Flyer/Pamflet","Presentasi Ke Sekolah","Teman/Keluarga","Sosial Media/Website","Lainnya");
      $data['no_daftar']=strtoupper(uniqid());
      $data['password']=substr(strtoupper(sha1(uniqid())),0,8);
      return view('backend.pages.pendaftaran.form',$data);
      // echo '<pre>';
      // print_r($data['det']);
      // echo '</pre>';
    }

    public function store(Request $request) {
    //$create = MataKuliah::create($request->all());
    // echo '<pre>';
    // print_r($request->all());
    // echo '</pre>';
      $setpendaftaran = new FormPendaftaran;
      $setpendaftaran->nama = $request->nama;
      $setpendaftaran->email = $request->email;
      $setpendaftaran->asal_sekolah = $request->asal_sekolah;
      $setpendaftaran->sumber_info = $request->sumber_info;
      $setpendaftaran->minat_jurusan = $request->minat_jurusan;
      $setpendaftaran->nomor_pendaftaran = strtoupper($request->no_pendaftaran);
      $setpendaftaran->save();

              // user account created
      $setuser = new AccountDaftar;
      $setuser->username = $request->username;
      $setuser->password = Hash::make($request->password);
      $setuser->id_daftar = $setpendaftaran->id;
      $setuser->save();
      
      $konfirmasi = new Konfirmasi;
      $konfirmasi->jenis = $request->jenis;
      $konfirmasi->bank = $request->bank;
      $konfirmasi->nomor_rekening = $request->nomor_rekening;
      $konfirmasi->pemilik_rekening = $request->pemilik_rekening;
      $konfirmasi->file = $request->file;
      $konfirmasi->validasi = 1;
      $konfirmasi->id_pendaftaran = $setpendaftaran->id;
      $konfirmasi->save();
   
      return redirect('pendaftaran')->with('pesan', 'Data Pendaftaran Baru Berhasil Di Simpan');
  }

  public function update(Request $request,$id)
  {
      $fp['nama'] = $request->nama;
      $fp['email'] = $request->email;
      $fp['asal_sekolah'] = $request->asal_sekolah;
      $fp['sumber_info'] = $request->sumber_info;
      $fp['minat_jurusan'] = $request->minat_jurusan;
      $fp['nomor_pendaftaran'] = strtoupper($request->no_pendaftaran);
      FormPendaftaran::find($id)->update($fp);

      if($request->password!='')
          $ad['password'] = Hash::make($request->password);
      
      $ad['username'] = $request->username;
      $ad['id_daftar'] = $id;
      AccountDaftar::where('id_daftar','=',$id)->update($ad);

      $kn['jenis'] = $request->jenis;
      $kn['bank'] = $request->bank;
      $kn['nomor_rekening'] = $request->nomor_rekening;
      $kn['pemilik_rekening'] = $request->pemilik_rekening;
      $kn['file'] = $request->file;
      $kn['validasi'] = 1;
      $kn['id_pendaftaran'] = $id;
      Konfirmasi::where('id_pendaftaran','=',$id)->update($kn);

      return redirect('pendaftaran')->with('pesan', 'Data Pendaftaran Baru Berhasil Di Edit');
  }
  public function destroy($id) {
    Konfirmasi::where('id_pendaftaran','=',$id)->delete();
    AccountDaftar::where('id_daftar','=',$id)->delete();
    FormPendaftaran::find($id)->delete();
    return response()->json(['done']);
  }
}
