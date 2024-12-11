<?php

namespace App\Http\Controllers;

use App\Models\BergabungPerusahaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\User;
use App\Models\Lowongan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PerusahaanController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->input('query');

        if ($query) {
            $perusahaan = Perusahaan::where('perusahaan.nama_perusahaan', 'LIKE', "%{$query}%") // Menambahkan alias 'perusahaan.'
                ->orWhere('perusahaan.provinsi', 'LIKE', "%{$query}%") // Menambahkan alias 'perusahaan.'
                ->leftJoin('lowongan', 'perusahaan.id', '=', 'lowongan.perusahaan_id')
                ->select('perusahaan.id', 'perusahaan.nama_perusahaan', 'perusahaan.provinsi', DB::raw('SUM(lowongan.jumlah_lowongan) as total_lowongan'))
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
            }])->paginate(10);

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
            'deskripsi' => ['string'],
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

        return view('manageProfilPerusahaanBusinesman');
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
        // dd($dataPerusahaan);
        return view('manageProfilPerusahaanBusinesman', compact('dataPerusahaan'));
    }

    public function listPermintaan()
    {
        $listBergabung = BergabungPerusahaan::whereHas('lowongan.perusahaan', function ($query) {
            $query->where('user_id', Auth::id());
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
}
