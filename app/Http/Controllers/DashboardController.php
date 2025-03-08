<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perkembangan;
use App\Models\Pakan;
use App\Models\Populasi;

class DashboardController extends Controller
{
    public function dataKematian() {
        try {
            $latestPopulasi = Populasi::orderBy('id', 'desc')->first();
            $perkembangans = Perkembangan::select('created_at', 'kematian_atas', 'kematian_bawah')
                ->where('populasi_id', $latestPopulasi->id)
                ->get();
            return response()->json($perkembangans);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function dataPakan() {
        try {
            $pakans = Pakan::select('created_at', 'jenis', 'jumlah')->get();
            return response()->json($pakans);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }


    public function dataAbw() {
        try {
            $latestPopulasi = Populasi::orderBy('id', 'desc')->first();
            $perkembangans = Perkembangan::select('abw_normal_atas', 'abw_normal_bawah')
                ->where('populasi_id', $latestPopulasi->id)
                ->get();

            $totalAbwNormalAtas = $perkembangans->avg('abw_normal_atas');
            $totalAbwNormalBawah = $perkembangans->avg('abw_normal_bawah');

            return response()->json([
                'abw_normal_atas' => $totalAbwNormalAtas,
                'abw_normal_bawah' => $totalAbwNormalBawah
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}

