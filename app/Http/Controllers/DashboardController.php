<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Berita;
use App\Models\JemputZakat;
use App\Models\Konsultasi;
use App\Models\Konfirmasi;
use App\Models\Program;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $program=Program::all();
        $berita=Berita::where('flag',1)->count();
        $jemput=JemputZakat::where('validasi',0)->count();
        $konsultasi=Konsultasi::where('validasi',0)->count();
        $konfirmasi=Konfirmasi::where('validasi',0)->count();
        return view('backend.pages.dashboard.index')
        ->with('program', $program)
        ->with('berita', $berita)
        ->with('jemput', $jemput)
        ->with('konsultasi', $konsultasi)
        ->with('konfirmasi', $konfirmasi);
    }
}
