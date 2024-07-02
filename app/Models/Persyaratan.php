<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;

    protected $table = 'tbl_persyaratan';

    protected $fillable = [
        'id_layanan',
        'ket_persyaratan'
    ];

    static $field = [
        'ket_persyaratan' => 'required'
    ];

    static $pesan = [

        'ket_persyaratan.required' => 'Data tidak boleh kosong !',
    ];

    function layanan(){
        return $this->belongsTo(Layanan::class, 'id', 'id_layanan');
    }


    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
