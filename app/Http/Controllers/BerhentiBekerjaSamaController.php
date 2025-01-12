<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestBerhenti;
use Illuminate\Support\Facades\Auth;

class BerhentiBekerjaSamaController extends Controller
{
    function BisnismanBerhenti(Request $request)
    {
        $request->validate([
            'id_lowongan' => 'string|required',
            'id_partner' => 'string|required'
        ]);

        // $cariRequest = RequestBerhenti::where([['partner_id', $request->id_partner], ['bisnisman_id']])->first();

        // dd($cariRequest->exists());
        // if (isset($cariRequest)) {
        //     $cariRequest->update([
        //         'bisnisman_id' => Auth::id(),
        //         'lowongan_id' => $request->id_lowongan,
        //         'Persetujuan_Bisnisman' => 'Setuju'
        //     ]);
        // } else {
            // dd($request->id_partner);
            RequestBerhenti::create([
                'partner_id' => $request->id_partner,
                'bisnisman_id' => Auth::id(),
                'lowongan_id' => $request->id_lowongan,
                'Persetujuan_Bisnisman' => 'Setuju',
                // 'Persetujuan_Partner' => 'Setuju'
            ]);
        // }



        // dd($request->id_lowongan);
        return redirect()->back();
    }

    function PartnerBerhenti(Request $request){

        $request->validate([
            'id_lowongan' => 'string|required',
        ]);

        // dd($request->all());

        $findReq =RequestBerhenti::where([['lowongan_id',$request->id_lowongan],['partner_id',Auth::id()]])->first();

        $findReq->update([
            'Persetujuan_Partner' => 'Setuju'
        ]);

        return redirect()->back();

    }
}
