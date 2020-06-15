<?php

namespace App\Http\Controllers\V2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Statistik;
class MainController extends Controller
{
    public function index()
    {
        $getprogam=$this->getprogram();
        $getkitabisa=$this->getkitabisa();
        // return $getprogam;

        $statistik=Statistik::all();
        $jlh_muzzaki=$jlh_mustahik=$jlh_penghimpunan=$jlh_penyaluran=array();
        foreach($statistik as $k=>$v)
        {
            $jlh_muzzaki[$v->tahun]=$v->jlh_muzzaki;
            $jlh_mustahik[$v->tahun]=$v->jlh_mustahik;
            $jlh_penghimpunan[$v->tahun]=$v->jlh_penghimpunan;
            $jlh_penyaluran[$v->tahun]=$v->jlh_penyaluran;
        }

        // return $stk;
        return view('depan.pages.index')
            ->with('jlh_muzzaki',$jlh_muzzaki)
            ->with('jlh_mustahik',$jlh_mustahik)
            ->with('jlh_penghimpunan',$jlh_penghimpunan)
            ->with('jlh_penyaluran',$jlh_penyaluran)
            ->with('getprogram',$getprogam)
            ->with('getkitabisa',$getkitabisa);
    }
}
