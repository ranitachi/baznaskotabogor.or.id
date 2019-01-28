<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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
use App\Models\ZakatOnline;
// use App\Services\InstagramImage;
use File;
use Storage;
use Mail;
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

    public function donasi_zakat(Request $req)
    {
        $merchantCode = 'D4505'; // from duitku
        $merchantKey = 'e2114de17cebc0fce3ddb1b46b64dbd8'; // from duitku
        $paymentAmount = str_replace(',','',$req->jlh_donasi);
        $paymentMethod = $req->PaymentId;
        $merchantOrderId=$iddonasi=$req->id_donasi;
        $productDetails=$req->jenis_donasi;
        $email=$req->email;
        $phoneNumber=$req->hp;
        $additionalParam= $req->nama_lengkap;
        $merchantUserInfo = $req->nama_lengkap;
        $customerVaName = $req->nama_lengkap;
        $callbackUrl = 'http://payment.baznaskotabogor.or.id/callback.php'; // url for callback
        $returnUrl = 'http://payment.baznaskotabogor.or.id/return.php'; // url for redirect
        $expiryPeriod = '10'; // set the expired time in minutes

        if(strpos($paymentMethod,'Transfer')===false)
        {
            $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);
            $item1 = array(
                'name' => $req->jenis_donasi,
                'price' => $paymentAmount,
                'quantity' => 1
            );

            $itemDetails = array(
                $item1
            );

           $params = array(
                'merchantCode' => $merchantCode,
                'paymentAmount' => $paymentAmount,
                'paymentMethod' => $paymentMethod,
                'merchantOrderId' => $merchantOrderId,
                'productDetails' => $productDetails,
                'additionalParam' => $additionalParam,
                'merchantUserInfo' => $merchantUserInfo,
                'customerVaName' => $customerVaName,
                'email' => $email,
                'phoneNumber' => $phoneNumber,
                'itemDetails' => $itemDetails,
                'callbackUrl' => $callbackUrl,
                'returnUrl' => $returnUrl,
                'signature' => $signature,
                'expiryPeriod' => $expiryPeriod
            );

            $params_string = json_encode($params);
            $url = 'http://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
            // $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params_string))
            );   
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            //execute post
            $request = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if($httpCode == 200)
            {
                $result = json_decode($request, true);
                $donasi=new ZakatOnline;
                $donasi->id_donasi=$req->id_donasi;
                $donasi->nama_lengkap=$req->nama_lengkap;
                $donasi->email=$req->email;
                $donasi->hp=$req->hp;
                $donasi->jenis_donasi=$req->jenis_donasi;
                $donasi->jlh_donasi=$paymentAmount;
                $donasi->metode_payment=$req->PaymentId;
                $donasi->status_donasi='0';
                $donasi->tanggal_donasi=date('Y-m-d H:i:s');
                $donasi->noVA=$result['vaNumber'];
                $donasi->save();

                // $result = json_decode($request, true);
                // header('Location: '. $result['paymentUrl']);
                return redirect()->to($result['paymentUrl'])->send();
                // echo "paymentUrl :". $result['paymentUrl'] . "<br />";
                // echo "merchantCode :". $result['merchantCode'] . "<br />";
                // echo "reference :". $result['reference'] . "<br />";
                // echo "vaNumber :". $result['vaNumber'] . "<br />";
                // echo "amount :". $result['amount'] . "<br />";
                // echo "statusCode :". $result['statusCode'] . "<br />";
                // echo "statusMessage :". $result['statusMessage'] . "<br />";
                // echo '<pre>';
                // print_r($result);
                // echo '</pre>';
            }
            else
            {

                echo $httpCode;
            }
        }
    }
    public function terima_kasih(Request $request)
    {
        // return $request->all();
        $kontak = Contact::all();
        $profil = ProfileCCIT::all();
        $testi = Testimony::orderByRaw('RAND()')->get();
        $bank = Bank::all();
        $zakatonline = ZakatOnline::where('id_donasi',$request->merchantOrderId)->first();
        $this->kirimsms($zakatonline->hp,$zakatonline->jlh_donasi);
        $d_bank=array();
        foreach($bank as $k=>$v)
        {
            $d_bank[$v->kategori][]=$v;
        }

        return view('pages.layanan.terima-kasih')
                ->with('bank',$d_bank)
                ->with('kontak',$kontak)
                ->with('profil',$profil)
                ->with('zakatonline',$zakatonline)
                ->with('testi',$testi);
    }

    public function kirimsms($nohp,$jlh)
    {
        $zenziva=Config::get('services.zenziva');
        $telepon = $nohp;
        $message = 'Terima Kasih Atas Kepercayaan Anda Menyalurkan Donasi Zakat/Infak/Sedekah Pada BAZNAS Kota Bogor Sebesar Rp.'.number_format($jlh,0,',','.');
        
        $url = 'http://baznaskotabogor.zenziva.co.id/api/sendsms/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $zenziva['userkey'],
            'passkey' => $zenziva['passkey'],
            'nohp' => $telepon,
            'pesan' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }
    public function konfirmasi(Request $request)
    {
        // return $request->all();
        $kontak = Contact::all();
        $profil = ProfileCCIT::all();
        $testi = Testimony::orderByRaw('RAND()')->get();
        $bank = Bank::all();
        $zakatonline = ZakatOnline::where('id_donasi',$request->merchantOrderId)->first();

        $d_bank=array();
        foreach($bank as $k=>$v)
        {
            $d_bank[$v->kategori][]=$v;
        }

        return view('pages.layanan.konfirmasi-donasi')
                ->with('bank',$d_bank)
                ->with('kontak',$kontak)
                ->with('zakatonline',$zakatonline)
                ->with('profil',$profil)
                ->with('testi',$testi);
    }

    public function getMail()
    {
        /* connect to gmail */
        // $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
        $username = 'baznaskota.bogor@baznas.or.id';
        $password = 'baznasbogor17';
        // $username = 'fachran.nazarullah@gmail.com';
        // $password = '2707itachi!@#$%^';

        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect: ' . imap_last_error());

        $emails = imap_search($inbox, 'UNSEEN');
        $mail=array();
        if ($emails) {
            $output = '';
            $mails = array();

            rsort($emails);

            foreach ($emails as $email_number) {
                $header = imap_headerinfo($inbox, $email_number);
                $message = quoted_printable_decode (imap_fetchbody($inbox, $email_number, 1));
                $msg=trim(str_replace(array("\r","\n","\t"), '',trim(preg_replace('/\t+/', '',$message))));
                $pattern = "/Kode Virtual Account :(.*?)Jumlah Pembayaran/";
                $dd['message']=$msg;
                preg_match($pattern, $msg, $matches);
                $dd['noVA']=(isset($matches[1]) ? trim(str_replace('-','',$matches[1])) : '');
                $dd['from']=$from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
                $dd['toaddress']=$toaddress = $header->toaddress;
                $mail[]=$dd;
                // if(imap_search($inbox, 'UNSEEN')){
                //     /*Store from and message body to database*/
                //     // DB::table('email')->insert(['from'=>$from, 'body'=>$message]);
                //     // return view('emails.display');
                // }
                // else{
                //     // $data = Email::all();
                //     // return view('emails.display',compact('data'));

                // }
            }
            
        }
        imap_close($inbox);
        return $mail;
    }
    function sendEmail()
    {
        $data['email']='baznaskota.bogor@baznas.or.id';
        $data['nama']='BAZNAS Kota Bogor';
        $data['pesan']='Test';
        Mail::send('email.kontak', $data, function ($mail) use ($data)
        {
            $mail->from($data['email'], $data['nama']);
            $mail->to('fachran.nazarullah@gmail.com', 'Fachran Nazarullah');
            $mail->subject('Kontak Pesan : '.$data['nama']);
        });
    }
}
