<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Instansi extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = 'tbl_instansi';

    protected $fillable = [
        'nama_instansi',
        'alamat_lengkap',
        'tlp',
        'jabatan',
        'email',
        'password',
    ];

    static $field = [
        'nama_instansi' => 'required|unique:tbl_instansi',
        'alamat_lengkap' => 'required',
        'tlp' => 'required',
        'jabatan' => 'required',
        'email' => 'required|email|unique:tbl_instansi',
        'password' => 'required',
    ];

    static $pesan = [
        'nama_instansi.required' => 'Data tidak boleh kosong !',
        'nama_instansi.unique' => 'Instansi sudah ada di database !',
        'alamat_lengkap.required' => 'Data tidak boleh kosong !',
        'tlp.required' => 'Data tidak boleh kosong !',
        'jabatan.required' => 'Data tidak boleh kosong !',
        'email.required' => 'Data tidak boleh kosong !',
        'email.email' => 'Format email salah !',
        'email.unique' => 'Email sudah ada di database !',
        'password.required' => 'Data tidak boleh kosong !',
    ];

    function suratmasuk(){
        return $this->hasMany(Pengajuan::class, 'id_instansi', 'id');
    }

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];


}
