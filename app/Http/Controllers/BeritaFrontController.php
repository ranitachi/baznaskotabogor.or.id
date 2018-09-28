<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Berita;
use App\Models\Bagian;
use App\Models\CatBerita;
use App\Models\Contact;
use App\Models\Program;
// use App\Services\InstagramImage;

class BeritaFrontController extends Controller
{
    public function thelist()
    {
      // $getinstagram = InstagramImage::getImage();
      $getdivisi = Bagian::all();
      $kontak = Contact::all();
      
      $getberita = Berita::where('flag', 1)
        ->orderby('berita.created_at', 'desc')
        ->paginate(9);
      
      return view('front.pages.berita.list')
        ->with('bagian', $getdivisi)
        ->with('berita', $getberita)
        ->with('kontak',$kontak);
    }

    public function detail($id)
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

    public function kategoridivisi($id)
    {
      $get = CatBerita::where('id_divisi', $id)->get();
      return $get;
    }

    public function find(Request $request)
    {
      $getjurusan = Jurusan::where('status', 1)->get();
      $getdivisi = DivisiCCIT::all();

      $getinstagram = InstagramImage::getImage();

      $getberita = Berita::where('id_kategori', $request->kategori)
        ->where('flag', 1)
        ->orderby('berita.created_at', ($request->urutan != "" ? $request->urutan : 'desc'))
        ->paginate(9);

      return view('frontend.pages.berita.list')
        ->with('divisi', $getdivisi)
        ->with('berita', $getberita)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }

    
}
