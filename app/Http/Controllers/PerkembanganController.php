<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\Perkembangan;
use App\Models\Populasi;
use Illuminate\Http\Request;

class PerkembanganController extends Controller
{
    public function index() {
        try {
            $perkembangans = Perkembangan::with('populasi', 'pakanAtas', 'pakanBawah')->get();
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }

    public function create() {
        try{
            $populasis = Populasi::all();
            $pakans = Pakan::all();
            return view('pages.perkembangan.create', compact('populasis', 'pakans'));
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }
}
