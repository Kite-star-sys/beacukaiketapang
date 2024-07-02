<?php

namespace App\Http\Controllers\Instansi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function index(){
        $data['list'] = Auth::guard('instansi')->user();
        return view('instansi.profile', $data);
    }
}
