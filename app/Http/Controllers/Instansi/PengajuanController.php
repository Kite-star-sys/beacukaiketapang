<?php

namespace App\Http\Controllers\Instansi;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Layanan;
use App\Models\Pendukung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;
use App\Models\Persyaratan;
use App\Models\Tracking;

class PengajuanController extends Controller
{
    function index(){
        $id = Auth::guard('instansi')->user()->id;
        $data['list'] = Pengajuan::with('layanan','tracking')
                        ->where('id_instansi', $id)
                        ->get();
        // return $data;
        return view('instansi.pengajuan.index', $data);
    }

    function create(){
        // return bcrypt('stafpelayanan');
        $data['user'] = Auth::guard('instansi')->user();
        $data['layanan'] = Layanan::all();
        return view('instansi.pengajuan.create', $data);
    }



    function store(Request $request){


        if ($request->has('file_pendukung') && $request->has('file_pendukung')) {

            $admin  = Admin::where('role', 'Kepala Kantor')->first();
            $instansi  = Auth::guard('instansi')->user();

            $kode_surat = $request->kode_surat;
            $id_instansi = $instansi->id;
            $id_layanan = $request->id_layanan;
            $file = $request->file('file');
            $keteranganPengajuan = $request->keterangan;

            $id_validasi = $admin->id;

            $file_pendukung = $request->file('file_pendukung');
            $keteranganTracking = 'Surat ini diinput oleh '.Auth::guard('instansi')->user()->nama_instansi;

            // Simpan ke tabel pendukung Pengajuan
            foreach ($file_pendukung as $filePendukung) {
                $ss = $filePendukung->storePublicly('Pendukung' , 'local');
                $simpanPendukung = Pendukung::create([
                    'kode_surat' => $kode_surat,
                    'id_layanan' => $id_layanan,
                    'file_pendukung' => 'app/'.$ss
                ]);
            }

            // Simpan Pengajuan
            $dd = $file->storePublicly('Pengajuan' , 'local');
            $simpanPengajuan = Pengajuan::create([
                'kode_surat' => $kode_surat,
                'id_instansi' => $id_instansi,
                'id_layanan' => $id_layanan,
                'file' => 'app/'.$dd,
                'keterangan' => $keteranganPengajuan,
            ]);




            // Simpan Tracking
            $simpanTracking = Tracking::create([
                'kode_surat' => $kode_surat,
                'id_pengirim' => $id_instansi,
                'id_penerima' => $id_validasi,
                'file_lampiran' => '',
                'ket_tracking' => $keteranganTracking,
                'status_tracking' => 'Baru dikirim dari '.$instansi->nama_instansi,
            ]);

            if ($simpanPengajuan && $simpanPendukung && $simpanTracking) {
                return redirect('instansi/pengajuan')->with('success','Pengajuan surat anda berhasil dikirim');
            }else{
                return back()->with('danger','Pengajuan surat anda gagal dikirim');
            }
        }else{
            $request->validate(Pengajuan::$field, Pengajuan::$pesan);
            $request->validate(Pendukung::$field, Pendukung::$pesan);
        }


    }

    function ambilPersyaratan($id){
        $data['data_persayaratan'] = Persyaratan::where('id_layanan',$id)->get();
        return response()->json($data);
    }
}
