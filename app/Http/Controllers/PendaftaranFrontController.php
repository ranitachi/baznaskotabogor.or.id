<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\AccountDaftar;
use App\Models\FormPendaftaran;
use DB;
use Hash;
use Session;
use Validator;

class PendaftaranFrontController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:account_daftar,username',
            'telp' => 'required|numeric',
            'asal_sekolah' => 'required',
            'sumber_info' => 'required',
            'jurusan' => 'required|numeric',
            'password' => 'required',
            'kpassword' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('front.pendaftaran')
                ->withErrors($validator)
                ->withInput();
        }

        DB::transaction(function () use($request) {
            
            // form pendaftaran created
            $setpendaftaran = new FormPendaftaran;
            $setpendaftaran->nama = $request->nama;
            $setpendaftaran->email = $request->email;
            $setpendaftaran->asal_sekolah = $request->asal_sekolah;
            $setpendaftaran->sumber_info = $request->sumber_info;
            $setpendaftaran->minat_jurusan = $request->jurusan;
            $setpendaftaran->nomor_pendaftaran = strtoupper(uniqid());
            $setpendaftaran->save();

            // user account created
            $setuser = new AccountDaftar;
            $setuser->username = $request->email;
            $setuser->password = Hash::make($request->password);
            $setuser->id_daftar = $setpendaftaran->id;
            $setuser->save();

            // set session for users
            Session::set('freshmanName', $request->nama);
            Session::set('freshmanID', $setpendaftaran->id);
        });

        return redirect()->route('freshman.dashboard');
    }
}
