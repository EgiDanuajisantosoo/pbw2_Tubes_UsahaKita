<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;
use \App\Mail\EmailVerification;

class EmailController extends Controller
{
    public function codeVerif(){
        return view('form.codeVerif');
    }

    public function setting(){
        $dataUser = User::find(Auth::id())->first();
        return view('settingAkun',compact('dataUser'));
    }

    public function showChangeEmailForm()
    {
        $emailBaru = Auth::user()->new_email;
        // dd($emailBaru);
        return view('form.emailVerifikasi',compact('emailBaru'));
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email', // Pastikan email baru belum digunakan
        ]);

        // Ambil user yang sedang login
        $user = User::find(Auth::id());

        // Generate kode verifikasi unik
        $verificationCode = Str::random(6);

        // dd($verificationCode);
        // Simpan kode verifikasi untuk email baru
        $user->new_email = $request->email;
        $user->verification_code = $verificationCode;
        $user->save();

        // Kirimkan kode verifikasi ke email baru
        // Mail::to($request->email)->send(new \App\Mail\EmailVerification($verificationCode));
        Mail::to($request->email)->send(new EmailVerification($verificationCode));


        return redirect(route('form.verif'))->with('status', 'Kode verifikasi telah dikirim ke email baru Anda.');
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'code' => 'required|size:6', // Pastikan kode valid
        ]);

        // Ambil user yang sedang login
        $user = User::find(Auth::id());

        // Verifikasi kode yang dimasukkan oleh pengguna
        if ($user->verification_code == $request->code) {
            // Update email pengguna
            $user->email = $user->new_email;
            $user->new_email = null; // Reset email baru
            $user->verification_code = null; // Reset kode verifikasi
            $user->save();

            return redirect()->route('setting')->with('status', value: 'Email Anda telah berhasil diperbarui.');
        }

        return back()->withErrors(['code' => 'Kode verifikasi salah.']);
    }
}
