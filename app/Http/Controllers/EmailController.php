<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \App\Mail\EmailVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class EmailController extends Controller
{
    public function codeVerif(){
        return view('form.codeVerif');
    }

    public function setting(){
        $dataUser = User::find(Auth::id());
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
            'code' => 'required|size:6',
        ]);

        $user = User::find(Auth::id());

        if ($user->verification_code == $request->code) {
            $user->email = $user->new_email;
            $user->new_email = null;
            $user->verification_code = null; 
            $user->save();

            return redirect()->route('setting')->with('status', value: 'Email Anda telah berhasil diperbarui.');
        }

        return back()->withErrors(['code' => 'Kode verifikasi salah.']);
    }

    public function gantiSandi(Request $request){
        $user = User::find(Auth::id());
        $request->validate([
            'password_sekarang' => 'required',
            'password_baru' => 'required|min:8',
            'konfirmasi_password'=> 'required|min:8'
        ]);

        // dd($request->all());

        if (!Hash::check($request->password_sekarang, $user->password)) {
            return back()->withErrors(['password_sekarang' => 'Password saat ini tidak sesuai.']);
        }
        $user->password = Hash::make($request->password_baru);
        $user->save();


        return redirect('/setting');
    }
}
