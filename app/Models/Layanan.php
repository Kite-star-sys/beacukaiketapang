<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'tbl_layanan';

    protected $fillable = [
        'nama_layanan',
        'ket_layanan'
    ];

    static $field = [
        'nama_layanan' => 'required|unique:tbl_layanan',
        'ket_layanan' => 'required'
    ];

    static $pesan = [
        'nama_layanan.required' => 'Layanan tidak boleh kosong !',
        'nama_layanan.unique' => 'Layanan sudah ada di database !',
        'ket_layanan.required' => 'Data tidak boleh kosong !',
    ];

    function persyaratan(){
        return $this->hasMany(Persyaratan::class,'id_layanan', 'id');
    }

    function pendukung(){
        return $this->hasMany(Persyaratan::class,'id_layanan', 'id');
    }



    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
