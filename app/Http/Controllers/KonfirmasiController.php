<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Konfirmasi;
use Auth;
class KonfirmasiController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.konfirmasi.index');
  }
  public function konfirmasistatus(Request $request,$id)
  {
    $dt=$request->all();
    $edit = Konfirmasi::find($id)->update($dt);
    return response()->json($edit);
    // dd($dt);
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $data['data']=Konfirmasi::with('bank')->orderBy('created_at','desc')->orderBy('validasi','asc')->get();
    return view('backend.pages.konfirmasi.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    $det=array();
    if($id!=-1)
    {
      $det=Konfirmasi::find($id);
    }
    $data['det']=$det;
    return view('backend.pages.konfirmasi.form',$data);
  }

  public function store(Request $request) {
    $create = Konfirmasi::create($request->all());
    // return response()->json($create);
    return redirect('konfirmasizakat')->with('pesan', 'Data Konfirmasi Zakat Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
      $edit = Konfirmasi::find($id)->update($request->all());
      // return response()->json($edit);
      return redirect('konfirmasizakat')->with('pesan', 'Data Konfirmasi Zakat Berhasil Di Edit');
  }

  public function destroy($id) {
    Konfirmasi::find($id)->delete();
    return response()->json(['done']);
  }
}
