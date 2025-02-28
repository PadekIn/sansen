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

    public function create() {
            return view('pages.performa.standar.create');
    }

    public function store(request $request) {
        try {
            $request->validate([
                'fcr' => 'required',
                'fi' => 'required',
                'fe' => 'required',
                'dep' => 'required',
                'abw' => 'required',
                'adg' => 'required',
                'ip' => 'required'
            ]);
            Standar_peforma::create($request->all());
            return redirect()->route('pages.performa.standar.list')->with('success', 'Standar Performa created successfully');
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }
}
