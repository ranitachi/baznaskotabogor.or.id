<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ProfileCCIT;
use App\Models\Staff;
use App\Models\Berita;
use App\Models\Contact;
use App\Models\Faq;
use App\Services\InstagramImage;

class ProfileFrontController extends Controller
{
    public function index()
    {
      $getinstagram = InstagramImage::getImage();
      $kontak = Contact::all();
      $profil = ProfileCCIT::all();
       
      return view('front.pages.profile.index')
        ->with('kontak',$kontak)
        ->with('profil',$profil)
        ->with('getinstagram', $getinstagram);
    }
    public function kontak()
    {
      
      $kontak = Contact::all();
      $profil = ProfileCCIT::all();
       
      return view('pages.kontak.index')
        ->with('kontak',$kontak)
        ->with('profil',$profil);
    }

    public function detailprofil($jenis)
    {
      $profil = ProfileCCIT::where('category','like', $jenis)->first();
      return view('pages.profil.index')
        ->with('profil', $profil);
      
    }

    public function detail($id)
    {
      $get = ProfileCCIT::where('id','=', $id)->get();
      return view('front.pages.profile.detail')
        ->with('profil', $get);
      }

    public function kontakpost(Request $request)
    {
      $to      = 'ccit@eng.ui.ac.id';
      $subject = $request->subject;
      $message = $request->message;
      $headers = "From: $request->email" . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $message, $headers);

      return redirect()->route('front.kontak')->with('message', 'Terima kasih, pesan anda akan segera kami tanggapi.');
    }

    public function faq()
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getberita = Berita::orderby('berita.created_at', 'desc')->limit(2)->get();
      $getfaq = Faq::where('flag', 1)->paginate(10);

      return view('frontend.pages.profile.faq')
        ->with('jurusan', $getjurusan)
        ->with('faq', $getfaq)
        ->with('getinstagram', $getinstagram)
        ->with('berita', $getberita);
    }
}
