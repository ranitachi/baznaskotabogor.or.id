<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Jabatan;
use App\Models\Bagian;
class JabatanController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.jabatan.index');
  }

  public function data($id=-1)
  {
    $data['id']=$id;
    $div=Bagian::all();
    $divisi=array();
    foreach ($div as $k => $v) {
      $divisi[$v->id]=$v;
    }
    $data['div']=$divisi;
    $data['data']=Jabatan::all();
    return view('backend.pages.jabatan.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    $data['div']=Bagian::all();
    if($id!=-1)
    {
      $d=Jabatan::find($id);
      $data['det']=$d;
    }
    return view('backend.pages.jabatan.form',$data);
  }
  public function store(Request $request) {
    $create = Jabatan::create($request->all());
    return response()->json($create);
  }

  public function update(Request $request, $id)
  {
      $edit = Jabatan::find($id)->update($request->all());
      return response()->json($edit);
  }
  public function destroy($id) {
    Jabatan::find($id)->delete();
    return response()->json(['done']);
  }
}
