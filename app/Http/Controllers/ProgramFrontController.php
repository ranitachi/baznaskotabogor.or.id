<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Requests;
use App\Models\Bagian;
use App\Models\Testimony;
use App\Models\Program;
use App\Models\Contact;
// use App\Services\InstagramImage;

class ProgramFrontController extends Controller
{
    public function index($id=-1)
    {
        //$data['id']=$id;
        $kontak = Contact::all();
        $program = Program::all();
        $testi=Testimony::orderByRaw('Rand()')->limit(2)->get();
        // $getinstagram = InstagramImage::getImage();
        // return view('pages.program.index')
        return view('depan.pages.program')
            ->with('testi',$testi)
            ->with('id',$id)
            ->with('kontak',$kontak)
            ->with('program', $program);
    }

    public function detail($slug)
    {
        $prog=Program::all();
        $program=array();
        $testi=Testimony::orderByRaw('Rand()')->limit(2)->get();
        // dd($testi);
        foreach($prog as $k=>$v)
        {
            $program[str_slug($v->nama_program)]=$v;
        }
        // return view('pages.program.detail')
        return view('depan.pages.program')
            ->with('program',$program[$slug])
            ->with('testi',$testi)
            ->with('slug',$slug);
    }
}
