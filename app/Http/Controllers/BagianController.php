<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Requests;
use App\Models\Bagian;

class BagianController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.bagian.index');
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $lv=Config::get('services.leveluser');
    $lvl=array();
    foreach ($lv as $k => $v)
    {
      $lvl[$k]=$v;
    }
    $data['level']=$lvl;
    $data['div']=Bagian::orderBy('nama_bagian')->get();
    return view('backend.pages.bagian.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    $data['level']=Config::get('services.leveluser');
    if($id!=-1)
    {
      $d=Bagian::find($id);
      $data['det']=$d;
    }
    return view('backend.pages.bagian.form',$data);
  }
  public function store(Request $request) {
    $create = Bagian::create($request->all());
    return response()->json($create);
  }

  public function update(Request $request, $id)
  {
      // echo '<pre>';
      // print_r($request->all());
      // echo '</pre>';
      $edit = Bagian::find($id)->update($request->all());
      return response()->json($edit);
  }

  public function destroy($id) {
    Bagian::find($id)->delete();
    return response()->json(['done']);
  }
}
