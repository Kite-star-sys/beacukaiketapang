<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instansi;

class InstansiController extends Controller
{
    function index(){
        $data['list'] = Instansi::all();
        return view('staf.instansi.index', $data);
    }

    function store(Request $request){
        $request->validate(Instansi::$field,Instansi::$pesan);
        $instansi = new Instansi();
        $instansi->nama_instansi = $request->nama_instansi;
        $instansi->alamat_lengkap = $request->alamat_lengkap;
        $instansi->tlp = $request->tlp;
        $instansi->jabatan = $request->jabatan;
        $instansi->email = $request->email;
        $instansi->password = bcrypt($request->password);
        $instansi->save();
        return back()->with('success', 'Data instansiberhasil disimpan');
    }

    function update(Request $request, Instansi $instansi){
        if($request->password != null){
            $instansi->nama_instansi = $request->nama_instansi;
            $instansi->alamat_lengkap = $request->alamat_lengkap;
            $instansi->tlp = $request->tlp;
            $instansi->jabatan = $request->jabatan;
            $instansi->email = $request->email;
            $instansi->password = bcrypt($request->password);
            $instansi->update();
            return back()->with('success', 'Data instansi berhasil diupdate');
        }else{
            $instansi->nama_instansi = $request->nama_instansi;
            $instansi->alamat_lengkap = $request->alamat_lengkap;
            $instansi->tlp = $request->tlp;
            $instansi->jabatan = $request->jabatan;
            $instansi->email = $request->email;
            $instansi->update();
            return back()->with('success', 'Data instansi berhasil diupdate');
        }
    }
}
