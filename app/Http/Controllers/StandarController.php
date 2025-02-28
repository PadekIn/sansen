<?php

namespace App\Http\Controllers;

use App\Models\Standar_peforma;
use Illuminate\Http\Request;

class StandarController extends Controller
{
    public function index() {
        try{
            $standars = Standar_peforma::all();
            return view('pages.performa.standar.list', compact('standars'));
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }
}
