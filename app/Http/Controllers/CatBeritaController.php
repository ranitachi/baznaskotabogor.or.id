<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\CatBerita;
use App\Models\Bagian;
use Auth;
class CatBeritaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      return view('backend.pages.cat_berita.index');
    }

    public function data($id=-1)
    {
      $data['id']=$id;

      $idlevel=Auth::user()->level;
      if($idlevel==1)
      {
        $data['cat']=CatBerita::all();
        $div=Bagian::all();
      }
      else
      {
        $data['cat']=array();
        $div=Bagian::where('id_level',$idlevel)->get();
        if(count($div)!=0)
          $data['cat']=CatBerita::where('id_divisi','=',$div[0]->id)->get();
      }
      $divisi=array();
      foreach ($div as $k => $v) {
        $divisi[$v->id]=$v;
      }
      $data['div']=$divisi;
      return view('backend.pages.cat_berita.data',$data);
    }

    public function form($id=-1)
    {
      $data['id']=$id;
      $idlevel=Auth::user()->level;
      if($idlevel==1)
      {
        $data['div']=Bagian::all();
      }
      else {
        # code...
        $data['div']=Bagian::where('id_level',$idlevel)->get();
      }
      if($id!=-1)
      {
        $d=CatBerita::find($id);
        $data['det']=$d;
      }
      return view('backend.pages.cat_berita.form',$data);
    }
    public function store(Request $request) {
      $create = CatBerita::create($request->all());
      return response()->json($create);
    }

    public function update(Request $request, $id)
    {
        $edit = CatBerita::find($id)->update($request->all());
        return response()->json($edit);
    }

    public function destroy($id) {
      CatBerita::find($id)->delete();
      return response()->json(['done']);
    }
}
