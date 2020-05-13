<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistik;
class StatistikController extends Controller
{
    public function index()
    {
        $statistik=Statistik::all();
        $stk=array();
        foreach($statistik as $k=>$v)
        {
            $stk[$v->tahun]['jlh_muzzaki']=$v->jlh_muzzaki;
            $stk[$v->tahun]['jlh_mustahik']=$v->jlh_mustahik;
            $stk[$v->tahun]['jlh_penghimpunan']=$v->jlh_penghimpunan;
            $stk[$v->tahun]['jlh_penyaluran']=$v->jlh_penyaluran;
            $stk[$v->tahun]['id']=$v->id;
        }

        return view('backend.pages.statistik.index')->with('stk',$stk);
    }

    public function create()
    {
        return view('backend.pages.statistik.create');
    }

    public function store(Request $request)
    {
        $ins=new Statistik;
        $ins->jlh_muzzaki = $request->jlh_muzzaki;
        $ins->jlh_mustahik = $request->jlh_mustahik;
        $ins->jlh_penghimpunan = $request->jlh_penghimpunan;
        $ins->jlh_penyaluran = $request->jlh_penyaluran;
        $ins->tahun = $request->tahun;
        $ins->save();
        return redirect()->route('statistik.index')->with('message','Data Statistik Berhasil Disimpan');
    }

    public function edit(Statistik $statistik)
    {
        // return $statistik;
        return view('backend.pages.statistik.edit')->with('statistik',$statistik);
    }
    public function update(Request $request,Statistik $statistik)
    {
        $statistik->jlh_muzzaki = $request->jlh_muzzaki;
        $statistik->jlh_mustahik = $request->jlh_mustahik;
        $statistik->jlh_penghimpunan = $request->jlh_penghimpunan;
        $statistik->jlh_penyaluran = $request->jlh_penyaluran;
        $statistik->tahun = $request->tahun;
        $statistik->save();
        return redirect()->route('statistik.index')->with('message','Data Statistik Berhasil Diedit');
    }
    public function destroy(Statistik $statistik)
    {
        $statistik->delete();
        return redirect()->route('statistik.index')->with('message','Data Statistik Berhasil Dihapus');
    }
}
