<?php

namespace App\Http\Controllers\KepalaKantor;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class StafController extends Controller
{
    function index(){
        $data['list'] = Admin::where('role', '!=',  'Kepala Kantor')->get();
        return view('kepala_kantor.staf.index', $data);
    }
    function create(){
        return view('kepala_kantor.staf.create');
    }
    function store(Request $request){

        $request->validate(Admin::$field,Admin::$pesan);
        $admin = new Admin;
        $admin->nip = $request->nip;
        $admin->nama = $request->nama;
        $admin->jk = $request->jk;
        $admin->tlp = $request->tlp;
        $admin->alamat = $request->alamat;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect('kepala_kantor/staf/')->with('success', 'Data Staf berhasil disimpan !');
    }
    function edit(Admin $staf){
        $data['staf'] = $staf;
        return view('kepala_kantor.staf.edit', $data);
    }
    function update(Request $request, Admin $staf){

        if ($request->password != null) {
            $staf->nip = $request->nip;
            $staf->nama = $request->nama;
            $staf->jk = $request->jk;
            $staf->tlp = $request->tlp;
            $staf->alamat = $request->alamat;
            $staf->email = $request->email;
            $staf->role = $request->role;
            $staf->password = bcrypt($request->password);
            $staf->update();
            return redirect('kepala_kantor/staf')->with('success', 'Data Staf berhasil diupdate !');
        } else {
            $staf->nip = $request->nip;
            $staf->nama = $request->nama;
            $staf->jk = $request->jk;
            $staf->tlp = $request->tlp;
            $staf->alamat = $request->alamat;
            $staf->email = $request->email;
            $staf->role = $request->role;
            $staf->update();
            return redirect('kepala_kantor/staf')->with('success', 'Data Staf berhasil diupdate !');
        }
    }
}
