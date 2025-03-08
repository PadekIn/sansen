<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standar_peforma;
use App\Models\performa_actual;
use App\Models\Populasi;
use App\Models\Pakan;
use App\Models\Perkembangan;
use Vinkla\Hashids\Facades\Hashids;


class LaporanController extends Controller
{
    public function laporanPage() {
        try {
            $populasis = Populasi::all();
            return view('pages.laporan.laporan', compact('populasis'));
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }

    public function laporan(Request $request) {
        $populasii = $request->input('populasii');
        $id_populasii = Hashids::decode($populasii)[0];

        $populasiis = Populasi::where('id', $id_populasii)->get();

        $laporans = [];

        if ($populasiis) {
            foreach ($populasiis as $populasi) {
                // $laporans[$populasi->id][''] = $populasi->id;

                $pop= Populasi::where('id', $populasi->id)->get();
                $standar = Standar_peforma::where('populasi_id', $populasi->id)->get();
                $actual = Performa_actual::where('populasi_id', $populasi->id)->get();
                $pakan = Pakan::all();
                $perkembangan = Perkembangan::where('populasi_id', $populasi->id)->get();

                $laporans[] = [
                    'populasi' => $pop,
                    'standar' => $standar,
                    'actual' => $actual,
                    'pakan' => $pakan,
                    'perkembangan' => $perkembangan
                ];
            }


        }

        $populasis = Populasi::all();

        return view('pages.laporan.laporan', compact('laporans', 'populasis', 'populasii'));
    }

}
