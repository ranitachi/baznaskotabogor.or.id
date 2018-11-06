<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Testimony;
use App\Models\Slider;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\FormPendaftaran;
use App\Models\Program;
use App\Models\ProfileCCIT;
use App\Models\Video;
use App\Models\CatBerita;

// use App\Services\InstagramImage;
use Mail;
use Config;
class BerandaFrontController extends Controller
{
    
    public function index()
    {
        $getslider = Slider::orderByRaw('RAND()')->where('flag',1)->limit(4)->get();
        return view('index-front',compact('getslider'));
    }
    // public function index()
    // {
    //     $getinstagram = InstagramImage::getImage();
    //     $gettestimony = Testimony::all();
    //     $kontak = Contact::all();
    //     $profil = ProfileCCIT::all();
    //     $program = Program::all();
    //     $getslider = Slider::paginate(3);
    //     $galeri=Gallery::orderby('created_at')->get();
    //     $getberita = Berita::where('flag', 1)
    //         ->orderby('berita.created_at', 'desc')
    //         ->limit(6)
    //         ->get();
    //     $gal=array();
    //     foreach($galeri as $k=>$v)
    //     {
    //       $gal[$v->category][]=$v;
    //     }
    //     return view('front.pages.home')
    //             ->with('getinstagram', $getinstagram)
    //             ->with('berita', $getberita)
    //             ->with('slider', $getslider)
    //             ->with('profil', $profil)
    //             ->with('program', $program)
    //             ->with('galeri', $gal)
    //             ->with('kontak', $kontak);
    //     // return view('frontend.pages.home.index')
    //     // ->with('getinstagram', $getinstagram)
    //     // ->with('testimony', $gettestimony)
    //     // ->with('jurusan', $getjurusan);
    // }

    public function kontak()
    {
        // $getinstagram = InstagramImage::getImage();
        $kontak = Contact::all();
        $profil = ProfileCCIT::all();
      
        return view('front.pages.kontak.index')
                ->with('profil', $profil)
                ->with('kontak', $kontak);
    }

    public function simpan(Request $request)
    {
    //   echo '<pre>';
    //   print_r($request->all());
    //   echo '</pre>';
        $in=new FormPendaftaran;
        $in->nama=$data['nama']=$nama=$request->nama;
        $in->email=$data['email']=$email=$request->email;
        $in->telp=$data['subjek']=$sub=$request->sub;
        $in->alamat=$data['pesan']=$pesan=$request->pesan;
        $f=$in->save();

        // Config::set('mail.driver', 'smtp');
        // Config::set('mail.host', 'mail.baznaskotabogor.or.id');
        // Config::set('mail.port', 465);
        // Config::set('mail.username', 'kontak-pesan@baznaskotabogor.or.id');
        // Config::set('mail.password', '**kontak-pesan**');
        Mail::send('email.kontak', $data, function ($mail) use ($data)
        {
            $mail->from($data['email'], $data['nama']);
            $mail->to('baznaskota.bogor@baznas.or.id', 'BAZNAS Kota Bogor');
            $mail->subject('Kontak Pesan : '.$data['nama']);
        });

        if($f)
            echo 1;
        else
            echo 0;
    }

    public function programdetail($slug)
    {
      // $getberita = Berita::orderby('berita.created_at', 'desc')->paginate(9);

      // $detailberita = Berita::find($id);
      // $detailberita->view = $detailberita->view + 1;
      // $detailberita->save();

      // $getinstagram = InstagramImage::getImage();
      $kontak = Contact::all();
      return view('front.pages.berita.detail')->with('kontak',$kontak);
      // return view('front.pages.berita.detail')
      //   ->with('data', $detailberita)
      //   ->with('berita', $getberita)
      //   ->with('getinstagram', $getinstagram);
    }
    public function publikasi(Request $request,$jenis)
    {
        $urll = $request->fullUrl();
        $ur=explode('?',$urll);
        $hal=0;
        $pagehal=5;
        if(isset($ur[1]))
        {
            $pg=explode('=',$ur[1]);
            
            if($pg[0]=='page')
            {
                if(isset($pg[1]))
                    $hal=($pg[1]*$pagehal)-$pagehal;
                else
                    $hal=(0*10);
            }
        }

        $jns=str_replace('-',' ',$jenis);

        $berita=Berita::select('*','berita.desc as isi')->where('flag','=',1)
            ->join('cat_berita','cat_berita.id','=','berita.id_kategori')
            ->whereRaw('lower(cat_berita.nama_kategori) = "'.$jns.'"')
            ->orderBy('berita.created_at','desc')->paginate($pagehal);

        $video=Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
        $program=Program::where('flag','=',1)->get();
        $testi=Testimony::orderByRaw('RAND()')->limit(2)->get();
        $cat=CatBerita::all();
        $category=array();
        foreach($cat as $c => $v)
        {
            $category[$v->id]=$v;
        }

        if ($request->ajax()) {
             return view('pages.publikasi.data')
                ->with('berita',$berita)
                ->with('cat',$category)
                ->with('hal',$hal)
                ->render();
        }

        return view('pages.publikasi.index')
            ->with('hal',$hal)
            ->with('berita',$berita)
            ->with('jenis',$jenis)
            ->with('vid',$video)
            ->with('program',$program)
            ->with('testi',$testi)
            ->with('cat',$category);
    }

    public function detailpublikasi($jenis,$slug)
    {
        $publ=Berita::all();
        $pub=array();
        foreach($publ as $k=>$v)
        {
            if(str_slug($v->title)==$slug)
            {
                $pub=$v;
            }
        }
        $video=Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
        $program=Program::where('flag','=',1)->get();
        $testi=Testimony::orderByRaw('RAND()')->limit(2)->get();
        return view('pages.publikasi.detail')
            ->with('pub',$pub)
            ->with('jenis',$jenis)
            ->with('vid',$video)
            ->with('program',$program)
            ->with('testi',$testi);
    }

    public function dokumentasi(Request $request,$jenis)
    {
        $urll = $request->fullUrl();
        $ur=explode('?',$urll);
        $hal=0;

        if($jenis=='foto')
            $pagehal=10;
        else
            $pagehal=6;
        
            if(isset($ur[1]))
        {
            $pg=explode('=',$ur[1]);
            
            if($pg[0]=='page')
            {
                if(isset($pg[1]))
                    $hal=($pg[1]*$pagehal)-$pagehal;
                else
                    $hal=(0*10);
            }
        }


        $program=Program::where('flag','=',1)->get();
        $testi=Testimony::orderByRaw('RAND()')->limit(2)->get();
        $video=Video::where('flag','=',1)->orderBy('created_at','desc')->paginate($pagehal);
        $galeri=Gallery::where('flag','=',1)->orderBy('created_at','desc')->paginate($pagehal);
        if($jenis=='video')
        {
            if ($request->ajax()) {
                return view('pages.video.data')
                    ->with('program',$program)
                    ->with('testi',$testi)
                    ->with('vid',$video)
                    ->with('hal',$hal)
                    ->with('jenis',$jenis)
                    ->render();
            }

            return view('pages.video.index')
                ->with('program',$program)
                ->with('testi',$testi)
                ->with('hal',$hal)
                ->with('jenis',$jenis)
                ->with('vid',$video);
        }
        else
        {
            if ($request->ajax()) {
                return view('pages.foto.data')
                    ->with('program',$program)
                    ->with('testi',$testi)
                    ->with('galeri',$galeri)
                    ->with('jenis',$jenis)
                    ->with('hal',$hal)
                    ->render();
            }

            return view('pages.foto.index')
                ->with('program',$program)
                ->with('testi',$testi)
                ->with('hal',$hal)
                ->with('jenis',$jenis)
                ->with('galeri',$galeri);
        }
    }

    public function testimoni(Request $request)
    {
        $urll = $request->fullUrl();
        $ur=explode('?',$urll);
        $hal=0;
        $pagehal=5;
        if(isset($ur[1]))
        {
            $pg=explode('=',$ur[1]);
            
            if($pg[0]=='page')
            {
                if(isset($pg[1]))
                    $hal=($pg[1]*$pagehal)-$pagehal;
                else
                    $hal=(0*10);
            }
        }

        $testi=Testimony::orderBy('created_at','desc')->paginate($pagehal);

        $video=Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
        $program=Program::where('flag','=',1)->get();
  
        if ($request->ajax()) {
             return view('pages.testimoni.data')
                ->with('testi',$testi)
                ->with('hal',$hal)
                ->render();
        }

        return view('pages.testimoni.index')
            ->with('hal',$hal)
            ->with('vid',$video)
            ->with('program',$program)
            ->with('testi',$testi);
    }
}
