<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Jurusan;
use App\Models\SupportingDoc;
use App\Models\Berita;
use App\Models\Jurmat;
use App\Models\Kalender;
use App\Services\InstagramImage;

class AkademikFrontController extends Controller
{
    public function kalender()
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getfooter = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();

      $getkalender = Kalender::all();

      return view('frontend.pages.akademik.kalender')
        ->with('berita', $getfooter)
        ->with('kalender', $getkalender)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }

    public function jurusan($id)
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getfooter = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();
      $get = Jurusan::find($id);
      $getmatkul = Jurmat::where('id_jurusan', $id)->get();

      return view('frontend.pages.akademik.jurusan')
        ->with('matkul', $getmatkul)
        ->with('berita', $getfooter)
        ->with('jurusan', $getjurusan)
        ->with('getinstagram', $getinstagram)
        ->with('datajurusan', $get);
    }

    public function jurusanpost(Request $request)
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getfooter = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();
      $get = Jurusan::find($request->id);
      $getmatkul = Jurmat::where('id_jurusan', $request->id)->get();

      return view('frontend.pages.akademik.jurusan')
        ->with('berita', $getfooter)
        ->with('matkul', $getmatkul)
        ->with('jurusan', $getjurusan)
        ->with('getinstagram', $getinstagram)
        ->with('datajurusan', $get);
    }

    public function himpunan()
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getfooter = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();
      $getfile = SupportingDoc::paginate(10);

      return view('frontend.pages.akademik.himpunan')
        ->with('berita', $getfooter)
        ->with('himpunan', $getfile)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }
}
