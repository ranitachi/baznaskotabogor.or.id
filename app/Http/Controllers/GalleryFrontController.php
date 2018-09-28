<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\Berita;
use App\Models\Contact;
use App\Services\InstagramImage;

class GalleryFrontController extends Controller
{
  public function index()
  {
    $kontak = Contact::all();
    // $getinstagram = InstagramImage::getImage();
    // $access_token = '1182242538.4443259.d3f5aca463e7455fb22681fcc240ac44';
    // $username = 'baznaskotabogor';
    $getinstagram = InstagramImage::getImage();
    $getfooter = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();

    $getgallery = Gallery::paginate(12);
    return view('front.pages.gallery.index')
      ->with('kontak', $kontak)
      ->with('data', $getgallery)
      ->with('getinstagram', $getinstagram)
      ->with('berita', $getfooter);
  }
    public function detail($id)
    {
        $data['id']=$id;
        $galeri=Gallery::orderby('created_at')->get();
        $video=Video::where('flag','=','1')->orderby('created_at')->get();
        $getinstagram = InstagramImage::getImage();

        $gal=$vid=array();
        foreach($galeri as $k=>$v)
        {
          $gal[$v->category][]=$v;
        }
        foreach($video as $k=>$v)
        {
          $vid[$k]=$v;
        }
        $data['gal']=$gal;
        $data['vid']=$vid;
        $data['instagram']=$getinstagram;
        return view('front.pages.gallery.detail',$data);
    }
}
