<?php

namespace App\Http\Controllers;

use App\Models\BergabungPerusahaan;
use App\Models\KategoriBisnis;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\User;
use App\Models\Lowongan;
use App\Models\ProfileUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PerusahaanController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->input('query');

        if ($query) {
            $perusahaan = Perusahaan::where('perusahaan.nama_perusahaan', 'LIKE', "%{$query}%")->where('perusahaan.status','terverifikasi')
                ->orWhere('perusahaan.provinsi', 'LIKE', "%{$query}%")
                ->leftJoin('lowongan', 'perusahaan.id', '=', 'lowongan.perusahaan_id')
                ->select('perusahaan.id', 'perusahaan.nama_perusahaan', 'perusahaan.provinsi', DB::raw('SUM(lowongan.jumlah_lowongan) as total_lowongan'))
                ->where('perusahaan.status','terverifikasi')
                ->groupBy('perusahaan.id', 'perusahaan.nama_perusahaan', 'perusahaan.provinsi')
                ->paginate(10);

            $count = Perusahaan::leftJoin('lowongan', 'perusahaan.id', '=', 'lowongan.perusahaan_id')
                ->select(
                    'perusahaan.foto_perusahaan',
                    DB::raw('SUM(lowongan.jumlah_lowongan) as total_lowongan')
                )
                ->where('perusahaan.nama_perusahaan', 'LIKE', "%{$query}%")
                ->orWhere('perusahaan.provinsi', 'LIKE', "%{$query}%")
                ->groupBy('perusahaan.foto_perusahaan') // Tambahkan GROUP BY untuk kolom non-agregat
                ->first();

            // dd($count->foto_perusahaan);
        } else {
            $perusahaan = Perusahaan::with(['lowongan' => function ($query) {
                $query->select('perusahaan_id', DB::raw('SUM(jumlah_lowongan) as total_lowongan'))
                    ->groupBy('perusahaan_id');
            }])->where('status','terverifikasi')->paginate(10);

            $count = 0;
        }

        return view('perusahaan', compact('perusahaan', 'count', 'query'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pemilik_perusahaan' => ['required', 'string', 'max:255'],
            'email_perusahaan' => ['required', 'string', 'max:255'],
            'nama_perusahaan' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:255'],
            'website_perusahaan' => ['nullable', 'url'],
            'provinsi' => ['required', 'string'],
            'kota' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'kelurahan' => ['required', 'string'],
            'alamat_lengkap' => ['string'],
            'kategori' => ['required', 'int', 'max:2'],
            'foto_ktp' => ['required', 'image', 'max:10240'],
            'logo_perusahaan' => ['required', 'image', 'max:10240'],
            'deskripsi' => ['string','nullable'],
        ]);

        $fotoKtpPath = $request->file('foto_ktp')->store('public/foto_ktp');
        $fotoPerusahaanPath = $request->file('logo_perusahaan')->store('public/logo_perusahaan');
        $userId = Auth::id();
        
        Perusahaan::create([
            'user_id' => $userId,
            'pemilik_perusahaan' => $request->pemilik_perusahaan,
            'email_perusahaan' => $request->email_perusahaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'website_perusahaan' => $request->website_perusahaan ?? "-",
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat_lengkap' => strtoupper($request->alamat_lengkap),
            'kategori' => $request->kategori,
            'foto_ktp' => $fotoKtpPath,
            'foto_perusahaan' => $fotoPerusahaanPath,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect(route('perusahaan', absolute: false));
    }

    public function editProfil(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'pemilik_perusahaan' => 'required|string|max:255',
            'kategori' => 'required|integer',
            'email_perusahaan' => 'required|email',
            'no_telp' => 'required|string|max:15',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'deskripsi' => 'nullable|string',
            'alamat_lengkap' => 'nullable|string',
            'website' => 'nullable|string',
        ]);


        $perusahaan = Perusahaan::findOrFail($id);

        $perusahaan->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'pemilik_perusahaan' => $request->pemilik_perusahaan,
            'kategori' => $request->kategori,
            'email_perusahaan' => $request->email_perusahaan,
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'deskripsi' => $request->deskripsi,
            'alamat_lengkap' => $request->alamat_lengkap,
            'website_perusahaan' => $request->website,
        ]);

        return redirect()->route('manageProfile');
    }

    public function profilPerusahaan($id)
    {
        $lowongan = Lowongan::where('perusahaan_id', $id)->get();
        $data = Perusahaan::find($id);
        return view('profilePerusahaanPartner', compact('data', 'lowongan'));
    }

    public function manageProfil()
    {
        $idUser = Auth::id();
        // $dataPerusahaan = Perusahaan::with('kategori_bisnis', 'lowongan')->find($idUser);
        $dataPerusahaan = Perusahaan::where('user_id', $idUser)->with('kategori_bisnis', 'lowongan')->first();
        $kategoris = KategoriBisnis::All();
        // dd($dataPerusahaan);
        return view('manageProfilPerusahaanBusinesman', compact('dataPerusahaan','kategoris'));
    }

    public function listPermintaan()
    {
        $listBergabung = BergabungPerusahaan::whereHas('lowongan.perusahaan', function ($query) {
            $query->where('user_id', Auth::id())
            ->where('status_permintaan','pendding');
        })->with('lowongan.user')->get();

        return view('listPermintaanBergabung', compact('listBergabung'));
    }

    public function listUserBergabung()
    {
        $userBergabung = BergabungPerusahaan::whereHas('lowongan.perusahaan', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('status_permintaan', 'diterima');
        })->with('user')->get();

        return view('listUserBergabung', compact('userBergabung'));
    }

    
    public function BatalBergabung(){
        $Perusahaan = Perusahaan::where('user_id',Auth::id())->first();
        $ProfilUser = ProfileUser::where('user_id',Auth::id())->first();
        $User = User::find(Auth::id());

        if (isset($ProfilUser)) {
            $ProfilUser->delete();
        }
        $Perusahaan->delete();
        $User->delete();
        return redirect()->route('lowongan.index');
    }

    public function DaftarUlang(){
    $Perusahaan = Perusahaan::where('user_id',Auth::id())->first();
    $Perusahaan->delete();
    return redirect()->route('checkUser');
    }

}
