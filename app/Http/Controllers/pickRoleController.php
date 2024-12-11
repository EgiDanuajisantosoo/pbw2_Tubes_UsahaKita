<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class pickRoleController extends Controller
{
    public function index(): View
    {
        return view('form.pemilihanRole');
    }

    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'role' => ['required', 'int', 'max:3'],
        ]);

        $user = User::create([
            'nama_depan' => session('nama_depan'),
            'nama_belakang' => session('nama_belakang'),
            'email' => session('email'),
            'role_id' => $request->role,
            'password' => Hash::make(session('password')),
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        return redirect(route('checkUser', absolute: false));
    }


}
