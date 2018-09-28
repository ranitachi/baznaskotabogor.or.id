<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ProfileCCIT;
use Illuminate\Support\Facades\Route;
class ProfileCCITController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $cat=Route::getFacadeRoot()->current()->uri();
      $data['category']=$cat;
      return view('backend.pages.profil.'.$cat,$data);
    }

    public function data($category)
    {
      $cat=$category;
      $profil=ProfileCCIT::where('category','=',$cat)->get();
      $data['profil']=$profil;
      $data['category']=$cat;
      return view('backend.pages.profil.data',$data);
    }

    public function form($id=-1,$cat='')
    {
      $data['id']=$id;
      $data['cat']=$cat;
      $profil=ProfileCCIT::where('category','=',$cat)->get();
      if($id!=-1)
        $data['det']=$profil[0];
      return view('backend.pages.profil.form',$data);
    }
    public function store(Request $request) {
      $create = ProfileCCIT::create($request->all());
      $cat = $request->input('category');
      // return response()->json($create);
      return redirect(''.$cat.'')->with('pesan', 'Data '.ucwords($cat).' Berhasil Di Tambah');
    }
    public function update(Request $request, $id)
    {
        $edit = ProfileCCIT::find($id)->update($request->all());
        $cat = $request->input('category');
        // return response()->json($edit);
        return redirect(''.$cat.'')->with('pesan', 'Data '.ucwords($cat).' Berhasil Di Edit');
    }

    public function destroy($id) {
      ProfileCCIT::find($id)->delete();
      return response()->json(['done']);
    }
}
