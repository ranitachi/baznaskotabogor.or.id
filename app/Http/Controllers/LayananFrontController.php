<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ProfileCCIT;
use App\Models\Staff;
use App\Models\Berita;
use App\Models\Contact;
use App\Models\Bank;
use App\Models\Faq;
use App\Models\Testimony;
use App\Models\Konsultasi;
use App\Models\Konfirmasi;
use App\Models\JemputZakat;
// use App\Services\InstagramImage;
use File;
use Storage;
class LayananFrontController extends Controller
{
    public function index($id=-1)
    {
        // $getinstagram = InstagramImage::getImage();
        $kontak = Contact::all();
        $profil = ProfileCCIT::all();
        $testi = Testimony::orderByRaw('RAND()')->get();
        $bank = Bank::all();

        $d_bank=array();
        foreach($bank as $k=>$v)
        {
            $d_bank[$v->kategori][]=$v;
        }

        $jenis=str_replace('-',' ',$id);
        $layanan=array();
        return view('pages.layanan.index')
            ->with('id',$id)
            ->with('jenis',$jenis)
            ->with('bank',$d_bank)
            ->with('kontak',$kontak)
            ->with('layanan',$layanan)
            ->with('profil',$profil)
            ->with('testi',$testi);
    }
    public function detail($id)
    {
        $data['id']=$id;
        if($id=='jemputzakat')
        {
            return view('front.pages.layanan.jemput',$data);
        }
        else if($id=='konfirmasizakat')
        {
            return view('front.pages.layanan.konfirmasi',$data);
        }
        else if($id=='konsultasizakat')
        {
            return view('front.pages.layanan.konsultasi',$data);
        }
        else if($id=='rekening')
        {
            $rek=Bank::all();
            $r=array();
            foreach($rek as $k=>$v)
            {
                $r[strtolower($v->kategori)][]=$v;
            }
            $data['rekening']=$r;
            
            return view('front.pages.layanan.rekening',$data);
        }
        else
            return view('front.pages.layanan.kalkulator',$data);
    }

    public function simpan(Request $request,$id)
    {
        if($id=='konsultasi-zakat')
        {
            // dd($request->all());
            // echo '<pre>';
            // print_r($request->all());
            // echo '</pre>';
            $konsul=new Konsultasi;
            $konsul->nama	=$request->nama;
            $konsul->telp	=$request->telepon;
            $konsul->email	=$request->email;
            $konsul->alamat	=$request->alamat;
            $konsul->pertanyaan=$request->pertanyaan;
            $konsul->save();

            $pesan="Konsultasi Zakat Anda Sudah Di Simpan, dan Akan segera di Respon.";
        }
        elseif($id=='konfirmasi-zakat')
        {
            // dd($request->all());
            list($tg,$bl,$th)=explode('-',$request->tanggal);
            $tgl=$th.'-'.$bl.'-'.$tg;
            list($idbank,$nm_bank_no_rek)=explode('__',$request->rekening_baznas);
            list($nm_bank,$no_rek)=explode(':',$nm_bank_no_rek);

            // $konf=new Konfirmasi;
            if($request->id!='')
            {

                $konf=Konfirmasi::find($request->id);
                $konf->desc=$request->keterangan;
                $konf->validasi=0;
                $konf->tgl_transfer=$tgl;
                $konf->id_bank=$idbank;
                $konf->nama_pengirim=$request->no_rekening.'::'.$request->nama_rekening;
                $konf->bank_asal=$request->nama_bank;
                $konf->jumlah=str_replace(',','',$request->jumlah);
                $konf->save();
            }
            else
            {
                $konf=new Konfirmasi;
                $konf->file='--';
                $konf->desc=$request->keterangan;
                $konf->validasi=0;
                $konf->tgl_transfer=$tgl;
                $konf->id_bank=$idbank;
                $konf->nama_pengirim=$request->no_rekening.'::'.$request->nama_rekening;
                $konf->bank_asal=$request->nama_bank;
                $konf->jumlah=str_replace(',','',$request->jumlah);
                $konf->save();
            }
            $pesan="Konfirmasi Zakat Anda Sudah Di Simpan, dan Akan segera Kami di Tindak Lanjuti.<br>Jazakumullahu Khairan Katsira";
        }
        elseif($id=='jemput-zakat')
        {
            // dd($request->all());
            $jemput=new JemputZakat;
            $jemput->nama=$request->nama;
            $jemput->telp=$request->telepon;
            $jemput->email=$request->email;
            $jemput->alamat=$request->alamat;
            $jemput->desc=$request->keterangan;
            $jemput->jumlah=str_replace(',','',$request->jumlah);
            $jemput->validasi=0;
            $jemput->save();
            $pesan="Data Jemput Zakat Anda Sudah Di Simpan, dan Akan segera di Tindak Lanjuti.<br>Jazakumullahu Khairan Katsira";
        }

        return redirect('layanan/'.$id)->with('pesan',$pesan);
        
    }
    public function upload_konfirmasi(Request $request)
    {
        $dir='';
        if( $request->hasFile('file')) 
        {
            $filenamewithextension = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('images',$filenamewithextension);
            $dir='images/'.$filenamewithextension;
            // echo $filenamewithextension;
            $konf=new Konfirmasi;
            $konf->file=$dir;
            $konf->desc='-';
            $konf->validasi=0;
            $konf->tgl_transfer=date('Y-m-d');
            $konf->id_bank=0;
            $konf->nama_pengirim='-';
            $konf->bank_asal='-';
            $konf->jumlah=0;
            $konf->save();
            echo $konf->id;
        }
    }

    public function hapus_foto_konfirmasi($file)
    {
        $ko=Konfirmasi::where('file','like',"%$file%")->first();
        // dd($ko);
        if($ko)
        {
            $ko->forceDelete();
            // File::delete('images/'.$file);
        }
        Storage::delete('images/'.$file);
    }
}
