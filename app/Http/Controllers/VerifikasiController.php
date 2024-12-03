<?php

namespace App\Http\Controllers;

use App\Models\BergabungPerusahaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index(){
        $detailVerif = BergabungPerusahaan::where('user_id',Auth::id())->get();
        // dd($detailVerif);
        return view('verifikasiLowongan', compact('detailVerif'));
    }


    public function store (Request $request ,$id) {
        $idUser = User::find(Auth::id(),'id');
        $request->validate([
            'modal_usaha' => 'required|numeric'
        ]);

        BergabungPerusahaan::create([
            'user_id' => $idUser->id,
            'lowongan_id' => $id,
            'modal_usaha' => $request->modal_usaha, 
            'status_permintaaan' => 'pendding'
        ]);

        return redirect('/detailLowonganBisnis/'.$id);
    }





}
