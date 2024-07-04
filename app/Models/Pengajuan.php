<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'tbl_surat_masuk';

    protected $fillable = [
        'kode_surat',
        'id_instansi',
        'id_layanan',
        'file',
        'keterangan'
    ];

    static $field = [
        'kode_surat' => 'required|unique:tbl_surat_masuk',
        'id_instansi' => 'required',
        'id_layanan' => 'required',
        'file' => 'required',
        'keterangan' => 'required',
    ];

    static $pesan = [
        'kode_surat.required' => 'Kode Surat tidak boleh kosong !',
        'kode_surat.unique' => 'Kode Surat sudah ada di database !',
        'id_instansi.required' => 'Data tidak boleh kosong !',
        'id_layanan.required' => 'Data tidak boleh kosong !',
        'file.required' => 'Data tidak boleh kosong !',
        'keterangan.required' => 'Data tidak boleh kosong !',
    ];
    function pendukung(){
        return $this->hasMany(Pendukung::class, 'kode_surat', 'kode_surat');
    }
    function instansi(){
        return $this->belongsTo(Instansi::class, 'id_instansi', 'id');
    }
    function layanan(){
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }
    function tracking(){
        return $this->belongsTo(Tracking::class, 'kode_surat', 'kode_surat');
    }

    function waktu(){
        $now = $this->created_at;
        $tgl = $now->isoFormat('D MMMM YYYY');
        $jam = $now->isoFormat('HH:mm:ss');
        return $tgl.','.$jam;
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
