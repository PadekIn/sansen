<?php

namespace App\Http\Controllers;

use App\Models\Perkembangan;
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
}
