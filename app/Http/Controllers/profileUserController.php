<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class profileUserController extends Controller
{
    public function index($id)
    {
        $profilUser = ProfileUser::where('user_id', $id)->with('user')->first();
        $namaUser = User::where('id', $id)->first();

        if ($profilUser == null) {
            $PengalamanArray = [];
            $KeahlianArray = [];
            $PendidikanArray = [];
            $SertifikasiArray = [];
        } else {
            $PengalamanArray = json_decode($profilUser->pengalaman, true) ?? [];
            $KeahlianArray = json_decode($profilUser->keahlian, true) ?? [];
            $PendidikanArray = json_decode($profilUser->pendidikan, true) ?? [];
            $SertifikasiArray = json_decode($profilUser->sertifikasi, true) ?? [];
        }
        // $checkProfile = ProfileUser::where('user_id',$id)->count();
        // dd($profilUser);
        return view('profile', compact('profilUser', 'PengalamanArray', 'KeahlianArray', 'PendidikanArray', 'SertifikasiArray', 'namaUser'));
    }

    public function create()
    {
        return view('form.editProfileUser');
    }

    public function edit(Request $request)
    {
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

        return redirect('/profile/' . $idUser);
    }


    public function formupdate($id)
    {
        $dataProfile = ProfileUser::find($id);
        $PengalamanArray = json_decode($dataProfile->pengalaman, true) ?? [];
        $KeahlianArray = json_decode($dataProfile->keahlian, true) ?? [];
        $PendidikanArray = json_decode($dataProfile->pendidikan, true) ?? [];
        $SertifikasiArray = json_decode($dataProfile->sertifikasi, true) ?? [];
        return view('form.updateProfileUser', compact('dataProfile','PengalamanArray', 'KeahlianArray', 'PendidikanArray', 'SertifikasiArray'));
    }

    public function update(Request $request, $id)
    {
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

        $profileUser = ProfileUser::findOrFail($id);

        $profileUser->foto_profile = $fotoProfilePath;
        $profileUser->banner = $fotoBannerPath;
        $profileUser->slogan = $request->input('slogan');
        $profileUser->jenis_kelamin = $request->input('jenis_kelamin');
        $profileUser->no_telp = $request->input('no_telp');
        $profileUser->keahlian = $keahlianArray;
        $profileUser->pengalaman = $pengalamanArray;
        $profileUser->pendidikan = $pendidikanArray;
        $profileUser->sertifikasi = $sertifikasiArray;
        $profileUser->provinsi = $request->input('provinsi');
        $profileUser->kota = $request->input('kota');
        $profileUser->kecamatan = $request->input('kecamatan');
        $profileUser->kelurahan = $request->input('kelurahan');
        $profileUser->save();

        return redirect()->route('profileUser.index',['id'=>$id]);
    }
}
