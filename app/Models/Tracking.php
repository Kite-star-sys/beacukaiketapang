<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table = 'tracking_surat';

    protected $fillable = [
        'kode_surat',
        'id_pengirim',
        'id_penerima',
        'file_lampiran',
        'ket_tracking',
        'status_tracking',
    ];

    static $field = [
        'kode_surat' => 'required',
        'id_pengirim' => 'required',
        'id_penerima' => 'required',

    ];

    static $pesan = [
        'kode_surat.required' => 'Kode Surat tidak boleh kosong !',
        'id_pengirim.required' => 'ID Pengirim tidak boleh kosong !',
        'id_penerima.required' => 'ID Penerima tidak boleh kosong !',
    ];

    function pengajuan(){
        return $this->hasMany(Layanan::class, 'kode_surat', 'kode_surat');
    }

    function instansipengirim(){
        return $this->belongsTo(Instansi::class, 'id_pengirim', 'id');
    }

    function userpengirim(){
        return $this->belongsTo(Admin::class, 'id_pengirim', 'id');
    }
    function userpenerima(){
        return $this->belongsTo(Admin::class, 'id_penerima', 'id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
