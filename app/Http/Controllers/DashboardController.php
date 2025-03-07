<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perkembangan;

class DashboardController extends Controller
{
    public function dataKematian() {
        try {
            $perkembangans = Perkembangan::select('created_at', 'kematian_atas', 'kematian_bawah')->get();
            return response()->json($perkembangans);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}

