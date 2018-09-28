<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Requests;
use App\Models\Bank;

class BankController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.bank.index');
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $lv=Bank::orderBy('kategori','nama_bank')->get();
    $lvl=array();
    foreach ($lv as $k => $v)
    {
      $lvl[$v->kategori][]=$v;
    }
    $data['div']=$lv;
    return view('backend.pages.bank.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    $data['kategori']=['Infak','Zakat','Kemanusiaan'];
    if($id!=-1)
    {
      $d=Bank::find($id);
      $data['det']=$d;
    }
    return view('backend.pages.bank.form',$data);
  }
  public function store(Request $request) {
    $create = Bank::create($request->all());
    return response()->json($create);
  }

  public function update(Request $request, $id)
  {
      // echo '<pre>';
      // print_r($request->all());
      // echo '</pre>';
      $edit = Bank::find($id)->update($request->all());
      return response()->json($edit);
  }

  public function destroy($id) {
    Bank::find($id)->delete();
    return response()->json(['done']);
  }
}
