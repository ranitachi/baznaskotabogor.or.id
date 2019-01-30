<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\JemputZakat;
use Auth;
class JemputZakatController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.jemputzakat.index');
  }
  public function jemputzakatstatus(Request $request,$id)
  {
    $dt=$request->all();
    $edit = JemputZakat::find($id)->update($dt);
    return response()->json($edit);
    // dd($dt);
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $data['data']=JemputZakat::orderBy('created_at','desc')->orderBy('validasi','asc')->get();
    return view('backend.pages.jemputzakat.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    $det=array();
    if($id!=-1)
    {
      $det=JemputZakat::find($id);
    }
    $data['det']=$det;
    return view('backend.pages.jemputzakat.form',$data);
  }

  public function store(Request $request) {
    $create = JemputZakat::create($request->all());
    // return response()->json($create);
    return redirect('jemputzakat')->with('pesan', 'Data Jemput Zakat Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
      $edit = JemputZakat::find($id)->update($request->all());
      // return response()->json($edit);
      return redirect('jemputzakat')->with('pesan', 'Data Jemput Zakat Berhasil Di Edit');
  }

  public function destroy($id) {
    JemputZakat::find($id)->delete();
    return response()->json(['done']);
  }
}
