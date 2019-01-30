<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZakatOnline;
use Auth;
class ZakatOnlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.pages.zakatonline.index');
    }
    public function donasionlinestatus(Request $request,$id)
    {
        $dt=$request->all();
        $edit = ZakatOnline::find($id)->update($dt);
        return response()->json($edit);
        // dd($dt);
    }
    public function data($id=-1)
    {
        $data['id']=$id;
        $data['data']=ZakatOnline::orderBy('tanggal_donasi','desc')->orderBy('nama_lengkap','asc')->get();
        return view('backend.pages.zakatonline.data',$data);
    }

    public function form($id=-1)
    {
        $data['id']=$id;
        $det=array();
        if($id!=-1)
        {
        $det=ZakatOnline::find($id);
        }
        $data['det']=$det;
        return view('backend.pages.zakatonline.form',$data);
    }

    public function store(Request $request) {
        $create = ZakatOnline::create($request->all());
        // return response()->json($create);
        return redirect('jemputzakat')->with('pesan', 'Data DOnasi Zakat Berhasil Di Simpan');
    }

    public function update(Request $request, $id)
    {
        $edit = ZakatOnline::find($id)->update($request->all());
        // return response()->json($edit);
        return redirect('jemputzakat')->with('pesan', 'Data DOnasi Zakat Berhasil Di Edit');
    }

    public function destroy($id) {
        ZakatOnline::find($id)->delete();
        return response()->json(['done']);
    }

    public function grafik($thun=null)
    {
        if($thun==null)
            $thn=date('Y');
        else
            $thn=$thun;

        return view('backend.pages.dashboard.grafik')->with('tahun',$thn);
    }
}
