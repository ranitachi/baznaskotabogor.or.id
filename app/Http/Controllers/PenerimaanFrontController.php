<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Jurusan;
use App\Models\Berita;
use App\Models\CatBerita;
use App\Services\InstagramImage;

class PenerimaanFrontController extends Controller
{
    public function proses()
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getberita = Berita::orderby('berita.created_at', 'desc')->limit(2)->get();

      $getkonten = Berita::select('berita.desc as desc')
        ->join('cat_berita', 'cat_berita.id', '=', 'berita.id_kategori')
        ->where('cat_berita.nama_kategori', 'like', '%pendaftaran%')
        ->first();

      return view('frontend.pages.penerimaan.proses')
        ->with('konten', $getkonten)
        ->with('berita', $getberita)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }

    public function informasi()
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getberita = Berita::orderby('berita.created_at', 'desc')->limit(2)->get();
      $getkonten = Berita::select('berita.*', 'cat_berita.nama_kategori')->join('cat_berita', 'berita.id_kategori', '=', 'cat_berita.id')
        ->where('cat_berita.nama_kategori', 'like', '%penerimaan%')
        ->orderby('berita.created_at', 'desc')
        ->paginate(6);

      return view('frontend.pages.penerimaan.informasi')
        ->with('berita', $getberita)
        ->with('konten', $getkonten)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }

    public function pendaftaran()
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getberita = Berita::orderby('berita.created_at', 'desc')->limit(2)->get();

      return view('frontend.pages.penerimaan.pendaftaran')
        ->with('berita', $getberita)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }
}
