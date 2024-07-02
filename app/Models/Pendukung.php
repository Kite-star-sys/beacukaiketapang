<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendukung extends Model
{
    use HasFactory;

    protected $table = 'tbl_pendukung';

    protected $fillable = [
        'id_layanan',
        'file_pendukung',
    ];

    static $field = [
        'id_layanan' => 'required',
        'file_pendukung' => 'required',
    ];

    static $pesan = [
        'file_pendukung.required' => 'Data tidak boleh kosong !',
        'keterangan.required' => 'Data tidak boleh kosong !',
    ];

    function layanan(){
        return $this->belongsTo(Layanan::class, 'id', 'id_layanan');
    }


    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
