<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Berita;
use App\Models\CatBerita;
use App\Models\Bagian;
use Auth;
class BeritaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.berita.index');
  }
  public function beritastatus(Request $request,$id)
  {
    $dt=$request->all();
    $edit = Berita::find($id)->update($dt);
    return response()->json($edit);
    // dd($dt);
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $idlevel=Auth::user()->level;
    if($idlevel==1)
    {
      $div=Bagian::all();
      $c=CatBerita::all();
    }
    else {
      # code...
      $cat=array();
      $div=Bagian::where('id_level',$idlevel)->get();
      if(count($div)!=0)
        $c=CatBerita::where('id_divisi','=',$div[0]->id)->get();
        //$cat=CatBerita::where('id_divisi','=',$div[0]->id)->get();
    }
    $cat=array();
    foreach ($c as $k => $v)
    {
      $cat[$v->id]=$v;
    }
    $data['cat']=$cat;
    $data['data']=Berita::orderBy('created_at','desc')->get();
    return view('backend.pages.berita.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    $idlevel=Auth::user()->level;
    if($idlevel==1)
    {
      $data['div']=Bagian::all();
      $cat=CatBerita::all();
    }
    else {
      $cat=array();
      $data['div']=$div=Bagian::where('id_level',$idlevel)->get();
      if(count($div)!=0)
        $cat=CatBerita::where('id_divisi','=',$div[0]->id)->get();

    }
    $data['cat']=$cat;
    if($id!=-1)
    {
      $data['det']=Berita::find($id);
    }
    return view('backend.pages.berita.form',$data);
  }

  public function store(Request $request) {
    $create = Berita::create($request->all());
    // return response()->json($create);
    return redirect('berita')->with('pesan', 'Data Berita Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
      $edit = Berita::find($id)->update($request->all());
      // return response()->json($edit);
      return redirect('berita')->with('pesan', 'Data Berita Berhasil Di Edit');
  }

  public function destroy($id) {
    Berita::find($id)->delete();
    return response()->json(['done']);
  }
}
