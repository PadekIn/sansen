<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perkembangan;

class DashboardController extends Controller
{
    public function index() {
        // Fetch data for the chart
        $perkembangans = Perkembangan::all();
        $labels = $perkembangans->pluck('umur')->toArray(); // Convert to array
        $kematianAtasData = $perkembangans->pluck('kematian_atas')->toArray(); // Convert to array
        $kematianBawahData = $perkembangans->pluck('kematian_bawah')->toArray(); // Convert to array

        return view('dashboard', compact('labels', 'kematianAtasData', 'kematianBawahData'));
    }
}
