<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index(){
        return view('login');
    }
    function aksiLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 5 karakter',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $cekAdmin = Auth::guard('admin')->user();

            if($cekAdmin->role === 'Kepala Kantor'){
                $request->session()->regenerate();
                return redirect()->intended('kepala_kantor')->with('success','Anda telah login dengan akun kepala kantor anda');
            }else{
                $request->session()->regenerate();
                return redirect()->intended('staf_kantor')->with('success','Anda telah login dengan akun staf kantor anda');
            }
        }
        if (Auth::guard('instansi')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('instansi')->with('success','Anda telah login dengan akun instansi anda');
        }
        return back()->with('error','Autentikasi login gagal, silahkan coba lagi');

    }

    function registrasi(){
        return view('registrasi');
    }

    function aksiRegistrasi(Request $request){
        $request->validate(Instansi::$field,Instansi::$pesan);

        $instansi = new Instansi();
        $instansi->nama_instansi = $request->input('nama_instansi');
        $instansi->alamat_lengkap = $request->input('alamat_lengkap');
        $instansi->tlp = $request->input('tlp');
        $instansi->jabatan = $request->input('jabatan');
        $instansi->email = $request->input('email');
        $instansi->password = bcrypt($request->input('password'));

        $instansi->save();

        return redirect('/')->with('success','Akun anda berhasil dibuat, silahkan login menggunakan email dan password anda');
    }
}
