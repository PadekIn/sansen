<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standar_peforma;
use App\Models\performa_actual;
use App\Models\Populasi;
use App\Models\Pakan;
use App\Models\Perkembangan;

class LaporanController extends Controller
{
    public function index() {
        try {
            $standars = Standar_peforma::all();
            return view('pages.laporan.laporan', compact('standars'));
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }
}
