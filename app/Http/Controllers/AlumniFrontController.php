<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Jurusan;
use App\Models\Berita;
use App\Models\Testimony;
use App\Services\InstagramImage;

class AlumniFrontController extends Controller
{
    public function testimoni()
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getberita = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();
      $gettesti = Testimony::limit(3)->get();

      return view('frontend.alumni.testimoni')
        ->with('testi', $gettesti)
        ->with('berita', $getberita)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }

    public function berita()
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getberita = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();
      $getkonten = Berita::select('berita.*', 'cat_berita.nama_kategori')->join('cat_berita', 'berita.id_kategori', '=', 'cat_berita.id')
        ->where('cat_berita.nama_kategori', 'like', '%alumni%')
        ->orderby('berita.created_at', 'desc')
        ->paginate(6);

      return view('frontend.alumni.berita-alumni')
        ->with('berita', $getberita)
        ->with('konten', $getkonten)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }
}
