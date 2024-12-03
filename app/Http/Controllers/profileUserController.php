<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class profileUserController extends Controller
{
    public function index($id){
        $profilUser = ProfileUser::where('user_id',Auth::id())->with('user')->first();
        // $checkProfile = ProfileUser::where('user_id',$id)->count();
        // dd($profilUser);
        return view('profile',compact('profilUser'));
    }

    public function create(){
        return view('editProfileUser');
    }

    public function edit(Request $request,$id){
        $idUser = Auth::user()->id;
        $request->validate([
            'profile' => 'required|image|max:2048',
            'banner' => 'required|image|max:2048',
            'slogan' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'keahlian' => 'required',
            'pengalaman' => 'required',
            'pendidikan' => 'required',
            'sertifikasi' => 'required',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
        ]);

        $fotoProfilePath = $request->file('profile')->store('public/foto_profile');
        $fotoBannerPath = $request->file('banner')->store('public/banner_profile');

        $keahlian = $request->input('keahlian');
        $keahlianArray = explode(",", $keahlian);
        $keahlianArray = array_map('trim', $keahlianArray);
        $keahlianArray = array_filter($keahlianArray, fn($value) => !empty($value));

        $pengalaman = $request->input('pengalaman');
        $pengalamanArray = explode(",", $pengalaman);
        $pengalamanArray = array_map('trim', $pengalamanArray);
        $pengalamanArray = array_filter($pengalamanArray, fn($value) => !empty($value));

        $pendidikan = $request->input('pendidikan');
        $pendidikanArray = explode(",", $pendidikan);
        $pendidikanArray = array_map('trim', $pendidikanArray);
        $pendidikanArray = array_filter($pendidikanArray, fn($value) => !empty($value));

        $sertifikasi = $request->input('sertifikasi');
        $sertifikasiArray = explode(",", $sertifikasi);
        $sertifikasiArray = array_map('trim', $sertifikasiArray);
        $sertifikasiArray = array_filter($sertifikasiArray, fn($value) => !empty($value));

        // dd($idUser);

        ProfileUser::create([
            'user_id' => $idUser,
            'foto_profile' => $fotoProfilePath,
            'banner' => $fotoBannerPath,
            'slogan' => $request->slogan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'keahlian' => json_encode($keahlianArray),
            'pengalaman' => json_encode($pengalamanArray),
            'pendidikan' => json_encode($pendidikanArray),
            'sertifikasi' => json_encode($sertifikasiArray),
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
        ]);

        return redirect('/profile/'.$idUser);

    }
}
