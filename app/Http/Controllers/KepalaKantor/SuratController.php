<?php

namespace App\Http\Controllers\KepalaKantor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Instansi;
use App\Models\Layanan;
use App\Models\Pendukung;
use App\Models\Pengajuan;
use App\Models\Persyaratan;
use App\Models\Tracking;


class SuratController extends Controller
{
    function index(){

        $data['list'] = Pengajuan::with('tracking','instansi','layanan.persyaratan')
                        ->whereHas('tracking', function ($query) {
                            $query->where('id_penerima', Auth::guard('admin')->user()->id);
                        })
                        ->get();

        $user = Auth::guard('admin')->user();
        $data['user'] = Admin::where('id','!=' ,$user->id)->get();
        return view('kepala_kantor.surat.index', $data);
    }
    function create(){
        $data['instansi'] = Instansi::all();
        $data['layanan'] = Layanan::all();
        return view('kepala_kantor.surat.create', $data);
    }
    function store(Request $request){
        $request->validate(Pengajuan::$field, Pengajuan::$pesan);
        $request->validate(Pendukung::$field, Pendukung::$pesan);

        if ($request->has('file_pendukung') && $request->has('file_pendukung')) {

            $kode_surat = $request->kode_surat;
            $id_instansi = $request->id_instansi;
            $id_layanan = $request->id_layanan;
            $file = $request->file('file');
            $keteranganPengajuan = $request->keterangan;

            $id_validasi = Auth::guard('admin')->user()->id;
            $stts_surat = 'Baru';
            $file_pendukung = $request->file('file_pendukung');
            $keteranganStory = 'Surat ini diinput oleh '.Auth::guard('admin')->user()->role;

            // Ambil instansi
            $instansi = Instansi::findOrFail($id_instansi);

            // Simpan Pengajuan

            $dd = $file->storePublicly('Pengajuan' , 'local');
            $simpanPengajuan = Pengajuan::create([
                'kode_surat' => $kode_surat,
                'id_instansi' => $id_instansi,
                'id_layanan' => $id_layanan,
                'file' => 'app/'.$dd,
                'keterangan' => $keteranganPengajuan,
            ]);

            // SImpan Histori Pengajuan
            foreach ($file_pendukung as $filePendukung) {
                $ss = $filePendukung->storePublicly('Histori' , 'local');
                $histori = new Pendukung;
                $histori->kode_surat = $kode_surat;
                $histori->id_validasi = $id_validasi;
                $histori->stts_surat = $stts_surat;
                $histori->file_pendukung =  'app/'.$ss;
                $histori->keterangan = $keteranganStory;
                $simpanHistory = $histori->save();
            }


            // Simpan Tracking
            $simpanTracking = Tracking::create([
                'kode_surat' => $kode_surat,
                'id_pengirim' => $id_instansi,
                'id_penerima' => $id_validasi,
                'file_lampiran' => '',
                'ket_tracking' => '',
                'status_tracking' => 'Baru dikirim dari '.$instansi->nama_instansi,
            ]);

            if ($simpanPengajuan && $simpanHistory && $simpanTracking) {
                return redirect('staf_kantor/surat')->with('success','Pengajuan berhasil dibuat');
            }else{
                return back()->with('danger','Pengajuan gagal dibuat');
            }
        }else{
            $request->validate(Pengajuan::$field, Pengajuan::$pesan);
            $request->validate(Pendukung::$field, Pendukung::$pesan);
        }


    }
    function ambilPersayaraan($id){ // Ambil data persayaraan
        $data['data_persayaratan'] = Persyaratan::where('id_layanan',$id)->get();
        return response()->json($data);
    }

    function kirim(Request $request, $id){
        $id_pengirim = Auth::guard('admin')->user()->id;
        $id_penerima = $request->id_penerima;
        $file = $request->file('file_lampiran');
        $ket_tracking = $request->ket_tracking;
        $pengajuan = Pengajuan::findOrFail($id);

        $tracking = Tracking::where('kode_surat',$pengajuan->kode_surat)->first();

        if($file != null){
            $ds = $file->storePublicly('Lampiran' , 'local');
            $tracking->id_pengirim = $id_pengirim;
            $tracking->id_penerima = $id_penerima;
            $tracking->file_lampiran = $ds;
            $tracking->ket_tracking = $ket_tracking;
            $tracking->status_tracking = 'Baru dikirim dari '.Auth::guard('admin')->user()->role;
            $tracking->update();

            return redirect('staf_kantor/surat')->with('success','Surat berhasil dikirim');
        }else{

            $tracking->id_pengirim = $id_pengirim;
            $tracking->id_penerima = $id_penerima;
            $tracking->ket_tracking = $ket_tracking;
            $tracking->status_tracking = 'Baru dikirim dari '.Auth::guard('admin')->user()->role;
            $tracking->update();
            return redirect('staf_kantor/surat')->with('success','Surat berhasil dikirim');
        }
    }

    function terima($id){
        $pengajuan = Pengajuan::findOrFail($id);
        $tracking = Tracking::where('kode_surat',$pengajuan->kode_surat)->first();
        $tracking->status_tracking = 'Diterima oleh'.Auth::guard('admin')->user()->role;
        $tracking->update();
        return back()->with('success','Surat berhasil diterima');

    }
    function tangguhkan($id){
        $pengajuan = Pengajuan::findOrFail($id);
        $tracking = Tracking::where('kode_surat',$pengajuan->kode_surat)->first();
        $tracking->status_tracking = 'Ditangguhkan oleh'.Auth::guard('admin')->user()->role;
        $tracking->update();
        return back()->with('success','Surat berhasil ditangguhkan');

    }
    function verifikasi($id){
        $pengajuan = Pengajuan::findOrFail($id);
        $tracking = Tracking::where('kode_surat',$pengajuan->kode_surat)->first();
        $tracking->status_tracking = 'Sudah Diverifikasi oleh'.Auth::guard('admin')->user()->role;
        $tracking->update();
        return back()->with('success','Surat berhasil diverifikasi');

    }

    function lihat($surat){

        $data['list'] = Pengajuan::with(
                            'tracking.instansipengirim',
                            'tracking.userpengirim',
                            'tracking.userpenerima',
                            'instansi',
                            'pendukung'
                        )
                        ->where('id',$surat)
                        ->whereHas('tracking', function ($query) {
                            $query->where('id_penerima', Auth::guard('admin')->user()->id)
                            ->orWhere('id_pengirim', Auth::guard('admin')->user()->id);
                        })
                        ->first();
        // return $data;
        return view('kepala_kantor.surat.show',$data);
    }
}
