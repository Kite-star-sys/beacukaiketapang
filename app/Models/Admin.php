<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = 'tbl_admin';

    protected $fillable = [
        'nip',
        'nama',
        'jk',
        'tlp',
        'alamat',
        'email',
        'password',
        'created_at',
        'updated_at',
    ];

    static $field = [
        'nip' => 'required|unique:tbl_admin',
        'nama' => 'required',
        'jk' => 'required',
        'tlp' => 'required',
        'alamat' => 'required',
        'email' => 'required|email|unique:tbl_admin',
        'password' => 'required',
    ];

    static $pesan = [
        'nip.required' => 'Data tidak boleh kosong !',
        'nip.unique' => 'NIP sudah ada di database !',
        'nama.required' => 'Data tidak boleh kosong !',
        'jk.required' => 'Data tidak boleh kosong !',
        'tlp.required' => 'Data tidak boleh kosong !',
        'alamat.required' => 'Data tidak boleh kosong !',
        'email.required' => 'Data tidak boleh kosong !',
        'email.email' => 'Format email salah !',
        'email.unique' => 'Email sudah ada di database !',
        'password.required' => 'Data tidak boleh kosong !',
    ];

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];


}
