<?php

namespace App\Http\Controllers;

use App\Models\BergabungPerusahaan;
use App\Models\RequestBerhenti;
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
            'modal_usaha' => 'required|string'
        ]);

        $number = (int) str_replace(['Rp.', '.', ','], '', $request->modal_usaha);

        BergabungPerusahaan::create([
            'user_id' => $idUser->id,
            'lowongan_id' => $id,
            'modal_usaha' => $number, 
            'status_permintaaan' => 'pendding'
        ]);

        return redirect('/detailLowonganBisnis/'.$id);
    }

    public function delete($id){
        BergabungPerusahaan::where([['user_id',Auth::id()],['lowongan_id',$id]])->delete();
        // dd($a);
        return redirect()->back();
    }


    public function terima($id){
        BergabungPerusahaan::where('id',$id)->update(['status_permintaan' => 'diterima']);
        return redirect()->route('listPermintaan');
    }

    public function tolak(Request $request, $id){
        $request->validate([
            'alasan' => 'string'
        ]);
        // dd($request->alasan);
        BergabungPerusahaan::where('id',$id)->update(['status_permintaan' => 'ditolak','alasan' => $request->alasan]);
        return redirect()->route('listPermintaan');
    }

    public function BisnisBerjalan(){
        // $dataBerhenti = RequestBerhenti::where('partner_id',Auth::id());

        // if ($dataBerhenti->exists()) {
        //     $dataBerhenti->get();
        // }
        $data = BergabungPerusahaan::where([['status_permintaan','diterima'],['user_id',Auth::id()]])->with('lowongan.perusahaan')->get();
        return view('listBisnisPartner',compact('data',));
    }

    public function PermintaanBerhenti(){
        $dataBerhenti = RequestBerhenti::where('partner_id',Auth::id())->with('lowongan.perusahaan')->get();

        // if ($dataBerhenti->exists()) {
        //     $dataBerhenti->get();
        // }

        return view('permintaanBerhenti' ,compact('dataBerhenti'));
    }


}
