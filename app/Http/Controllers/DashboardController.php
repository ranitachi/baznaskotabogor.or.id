<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Berita;
use App\Models\JemputZakat;
use App\Models\Konsultasi;
use App\Models\Konfirmasi;
use App\Models\Program;
use App\Models\ZakatOnline;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($thn=null,$bln=null)
    {
        if($thn==null)
            $thn=date('Y');
        else
            $thn=$thn;
        
        if($bln==null)
            $bln=date('n');
        else
            $bln=$bln;

        if($bln<10)
            $bln='0'.$bln;

        $program=Program::all();
        $berita=Berita::where('flag',1)->count();
        $jemput=JemputZakat::where('validasi',0)->count();
        $konsultasi=Konsultasi::where('validasi',0)->count();
        $konfirmasi=Konfirmasi::where('validasi',0)->count();
        $date=$thn.'-'.$bln;
        $donasi=ZakatOnline::where('status_donasi','00')->where('tanggal_donasi','like',"%$date%")->get();
        $don=array();
        $don_zakat=$don_infak=0;
        foreach($donasi as $k=>$v)
        {
            if($v->jenis_donasi=='Zakat')
                $don_zakat+=$v->jlh_donasi;
            else
                $don_infak+=$v->jlh_donasi;
        }

        $quota=file_get_contents('http://baznaskotabogor.zenziva.co.id/api/balance/?userkey=ipo6j7la3q9ya9i3s6k7&passkey=6h7c33rlid30zjxt5vg4');
        $d_quota=json_decode($quota);

        return view('backend.pages.dashboard.index')
        ->with('program', $program)
        ->with('berita', $berita)
        ->with('jemput', $jemput)
        ->with('konsultasi', $konsultasi)
        ->with('thn', $thn)
        ->with('d_quota', $d_quota)
        ->with('bln', $bln)
        ->with('don_zakat', $don_zakat)
        ->with('don_infak', $don_infak)
        ->with('konfirmasi', $konfirmasi);
    }
}
