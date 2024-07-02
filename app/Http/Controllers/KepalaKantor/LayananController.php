<?php

namespace App\Http\Controllers\KepalaKantor;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    function index(){
        $data['list'] = Layanan::with('persyaratan')->get();
        return view('kepala_kantor.layanan.index', $data);
    }

    function store(Request $request){

        $request->validate(Layanan::$field,Layanan::$pesan);
        $layanan = new Layanan;
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->ket_layanan = $request->ket_layanan;
        $layanan->save();
        return back()->with('success', 'Data Layanan berhasil disimpan !');
    }

    function update(Request $request, Layanan $layanan){
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->ket_layanan = $request->ket_layanan;
        $layanan->update();
        return back()->with('success', 'Data Layanan berhasil diupdate !');
    }

    function show($layanan){
        $data['list'] = Layanan::with('persyaratan')->where('id',$layanan)->first();

        return view('kepala_kantor.layanan.show', $data);
    }

    function storePersayaratan($layanan, Request $request){
        $request->validate(Persyaratan::$field,Persyaratan::$pesan);
        $persyaratan = new Persyaratan;
        $persyaratan->id_layanan = $layanan;
        $persyaratan->ket_persyaratan = $request->ket_persyaratan;
        $persyaratan->save();
        return back()->with('success', 'Data Persyaratan Layanan berhasil disimpan !');
    }

    function updatePersayaratan(Persyaratan $persayaratan, Request $request){
        $persayaratan->ket_persyaratan = $request->ket_persyaratan;
        $persayaratan->update();
        return back()->with('success', 'Data Persyaratan Layanan berhasil diupdate !');
    }
}
