<?php

namespace App\Http\Controllers;

use App\Models\KategoriBisnis;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class checkUserController extends Controller
{
    public function index()
    {   
        $email = session('email');
        $userId = Auth::id();

        $user = User::where('email', $email)->first();
        $role = $user->role_id;
        $kategori = KategoriBisnis::all();

        if (Perusahaan::where('user_id', $userId)->exists() && $role == 2 || $role == 3) {
            return redirect('/lowonganBisnis');
        }else if($role == 1){
            return redirect('/admin');
        }
        else {
            return view('form.register-perusahaan', compact('kategori'));
        }
        
    }
}
